<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function dashboard(){
        return view('Customers.dashboard');
    }


    //profile update
    public function profile_update(Request $request){
        $this->validate($request, [
            'first_name'=>['required', 'string', 'max:50'],
            'last_name'=>['required', 'string', 'max:50'],
            'phone'=>['nullable', 'string', 'max:16'],
            'email'=>['required', 'string', 'max:100', 'unique:customers,email,'.Auth::guard('customer')->user()->email],
            'birthday'=>['nullable', 'date'],
            'gender'=>['nullable', 'string', 'in:Male,Female,Other'],
        ]);
        //if validity pass then
        $updated = Customer::where('id', Auth::guard('customer')->user()->id)->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'birthday'=>$request->birthday,
            'gender'=>$request->gender,
            'updated_at'=>Carbon::now()
        ]);

        if ($updated == true) {
            return redirect()->back()->with('success', 'Profile Updated');
        }else{
            return redirect()->back()->with('error', 'SORRY - Something wrong.');
        }
    }



    //address
    public function get_address(){
        $billingAddress = CustomerAddress::where([
            'customer_id'=>Auth::guard('customer')->user()->id,
            'type'=>'Billing'
        ])->first();
        $shippingAddress = CustomerAddress::where([
            'customer_id'=>Auth::guard('customer')->user()->id,
            'type'=>'Shipping'
        ])->first();
        return view('Customers.address', compact('billingAddress', 'shippingAddress'));
    }
    


    //update address
    public function update_address(Request $request){
        $validation = $this->validateAddress($request);
        if ($validation !== true) {
            return $validation;
        }

        //update address
        $data = CustomerAddress::where([
            'customer_id'=>Auth::guard('customer')->user()->id,
            'type'=>$request->type
        ])->first();

        $result = NULL;
        if ($data) {
            //update
            $result = $data->update([
                'address'=>$request->address,
                'city'=>$request->city,
                'state'=>$request->state,
                'zip_code'=>$request->zip_code,
                'country'=>$request->country,
                'updated_at'=>Carbon::now()
            ]);
        }else{
            //insert
            $result = CustomerAddress::insert([
                'customer_id'=>Auth::guard('customer')->user()->id,
                'type'=>$request->type,
                'address'=>$request->address,
                'city'=>$request->city,
                'state'=>$request->state,
                'zip_code'=>$request->zip_code,
                'country'=>$request->country,
                'created_at'=>Carbon::now()
            ]);
        }

        if ($result == true) {
            return response()->json([
                'success'=>true,
                'msg'=>'Address Updated'
            ], 200);
        }else{
            return response()->json("Someting went wrong, please try again.", 422);
        }
    }

    private function validateAddress($request){
        $validation = Validator::make($request->all(), [
            'type'=>'required|string|in:Billing,Shipping'
        ]);
        if ($validation->fails()) {
            return $this->withValidateMsg('SORRY - Invalid Request', 401);
        }

        $validation = Validator::make($request->all(), [
            'address'=>'required|string|max:250',
            'city'=>'required|string|max:100',
            'state'=>'required|string|max:100',
            'zip_code'=>'required|string|max:100',
            'country'=>'required|string|max:100',
        ]);
        if ($validation->fails()) {
            return $this->withValidateMsg('Please enter all fields data correctly.', 422);
        }

        return true;
    }
    private function withValidateMsg($msgTxt, $type){
        return response()->json($msgTxt, $type);
    }
    
}
