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
class RegistrationController extends Controller
{
    public function register(Request $request){
    	$this->validate($request, [
    		'first_name'=>'required|string|max:50',
    		'last_name'=>'required|string|max:50',
    		'email'=>'required|string|max:100|email|unique:customers',
    		'password'=>'required|string|min:8|max:33|confirmed'
    	]);

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
                Mail::to([$request->email, 'testadmin@gmail.com'])->send(new SendDynamicEmail(
                    $firstName, $lastName, $template
                 ));
            }

    		return redirect()->back()->with('success', 'Account registered successfully, please login.');
    	}else{
    		return redirect()->back()->with('error', 'SORRY - something wrong, please try again.');
    	}
    }
}
