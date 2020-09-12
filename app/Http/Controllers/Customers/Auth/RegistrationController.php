<?php

namespace App\Http\Controllers\Customers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use App\Models\EmailTemplate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendDynamicEmail;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function register(Request $request){
    	$validation = Validator::make($request->all(), [
    		'first_name'=>'required|string|max:50',
    		'last_name'=>'required|string|max:50',
    		'email'=>'required|string|max:100|email|unique:customers',
    		'password'=>'required|string|min:8|max:33|confirmed'
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

    	//if validity pass then
    	$inserted = Customer::insert([
    		'first_name'=>$request->first_name,
    		'last_name'=>$request->last_name,
    		'email'=>$request->email,
    		'password'=>Hash::make($request->password),
    		'created_at'=>Carbon::now()
    	]);

    	if ($inserted == true) {
            //send email
            $template = EmailTemplate::where('template', 'Customer-Signup')->first();
            if ($template) {
                $firstName = $request->first_name;
                $lastName = $request->last_name;
                Mail::to($request->email)->send(new SendDynamicEmail(
                    $firstName, $lastName, $template
                 ));
            }

            return response()->json([
                    'success'=>true,
                    'msg'=>"Account registered successfully, please login.",
            ], 200);

    	}else{
            return response()->json([
                'field'=>"no__field",
                'targetHighlightIs'=>"",
                'msg'=>"SORRY - something wrong, please try again.",
                'need_scroll'=>"no"
            ], 422);
    	}
    }
}
