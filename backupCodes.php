<?php

namespace App\Http\Controllers\address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use Auth;
use Carbon\Carbon;

class AddressController extends Controller
{
    
    public function add_address(Request $request){
        $this->validate($request, [
            'address'=>'required|string|max:200',
            'city'=>'required|string|max:40',
            'state'=>'required|string|max:40',
            'zip_code'=>'required|string|max:40',
            'country'=>'required|string|max:40',
        ]);

        $inserted = CustomerAddress::insert([
            'customer_id'=>Auth::guard('vendor')->user()->id,
            'type'=>'Shipping',
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip_code'=>$request->zip_code,
            'country'=>$request->country,
            'created_at'=>Carbon::now(),
        ]);

        if ($inserted) {
            # code...
        }
    }
}
