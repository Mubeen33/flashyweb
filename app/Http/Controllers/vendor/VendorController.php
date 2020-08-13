<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    //vendor request view

    public function index(){

    	return view('vendor.vendor-request');
    }

    // save vendor request

    public function saveVendorRequest(Request $request){

    	$vendor = new Vendor();
    	$vendor->first_name            = $request->first_name;
    	$vendor->last_name             = $request->last_name;
    	$vendor->email                 = $request->email;
    	$vendor->phone                 = $request->phone;
    	$vendor->mobile                = $request->mobile;
    	$vendor->business_info         = $request->business_info;
    	$vendor->vat_register          = $request->vat_register;
    	$vendor->company_name          = $request->company_name;
    	$vendor->website_url           = $request->website_url;
    	$vendor->director_first_name   = $request->director_first_name;
    	$vendor->director_last_name    = $request->director_last_name;
    	$vendor->director_email        = $request->director_email;
    	$vendor->additional_info       = $request->additional_info;

    	if ($vendor->save()) {
    		
    		return redirect("vendor-request")->with('msg','<div class="alert alert-success" id="msg">Request submit Successfully!</div>');
    	}
    }
}
