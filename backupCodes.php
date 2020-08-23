<?php

namespace App\Http\Controllers\Customers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

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
        Customer
    }
}
