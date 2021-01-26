<?php

namespace App\Http\Controllers\Customers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Customer;
use App\Models\SignupContent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CustomerLogin extends Controller
{
    public function __construct(){
		$this->middleware('guest:customer');
	}

    //login form
    public function login_form($check = 'login' , $intend=NULL){
        $signupContent = SignupContent::where('id', 1)->first();
    	return view('auth.login', compact('signupContent', 'intend' , 'check'));
    }

    //attemt to login
    public function login(Request $request){
    	//validate form data
    	$validation = Validator::make($request->all(), [
    		'email' => 'required|string|email|max:100',
    		'password' => 'required|min:8',
    	]);

        if ($validation->fails()) {
            foreach ($validation->messages()->get('*') as $key => $value) {
                $value = json_encode($value);
                $text = str_replace('["', "", $value);
                $text = str_replace('"]', "", $text);
                return response()->json([
                    'field'=>$key,
                    'targetHighlightIs'=>"",
                    'msg'=>$text,
                    'need_scroll'=>"no"
                ], 422);
            }
        }

    	//attempt to log user in
    	if (Auth::guard('customer')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)) {
             $request->session()->put('loggin',true);
            //record activity
            //$this->loggedInActivity();
            $redirect_path = "/flashy/flashyweb/public/customer/dashboard";
            if ($request->intend != '') {
                $redirect_path = "/".$request->intend;
            }


            return response()->json([
                    'success'=>true,
                    'msg'=>"Login Success",
                    'should_redirect'=>true,
                    'redirect_path'=>$redirect_path,
            ], 200);
            //return redirect()->intended(route('customer.dashboard.get'));
    	}

    	//if unsuccess to login then redirect
    	return response()->json([
            'field'=>"no__field",
            'targetHighlightIs'=>"",
            'msg'=>"Invalid Email or Password",
            'need_scroll'=>"no"
        ], 422);
    	
    }


    //activity tract
    private function loggedInActivity(){
        $ip = \Request::ip();
        $browser = "";

        $agent = $_SERVER["HTTP_USER_AGENT"];
        // Check to see if it contains the keyword `Chrome` followed by a version number
        if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
          $browser = "Chrome";
        }elseif (preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent)) {
            $browser = "Firefox";
        }elseif (preg_match('/Safary[\/\s](\d+\.\d+)/', $agent)) {
            $browser = "Safary";
        }else{
            $browser = "Unknown";
        }

        //IP to address
        $getIP_location = \Location::get(($ip == "127.0.0.1" ? "66.102.0.0" : $ip));
        $location = "Unknown";
        if ($getIP_location != NULL) {
            $location = $getIP_location->countryName.', '.$getIP_location->regionName.', '.$getIP_location->cityName;
        }

        $data = json_encode([
                    'Time'=>date('d/m/Y H:i', strtotime(Carbon::now())), 
                    'Access Via'=>$browser, 
                    'IP'=>$ip,
                    'Location'=>$location,
                ]);

        //insert record
        VendorActivity::insert([
            'vendor_id'=>Auth::guard('vendor')->user()->id,
            'activityName'=>'Login',
            'activities'=>$data,
            'is_loogedIn'=>'Active',
            'created_at'=>Carbon::now()
        ]);
    }
}
