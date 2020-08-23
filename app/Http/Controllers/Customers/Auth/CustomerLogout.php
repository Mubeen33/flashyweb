<?php

namespace App\Http\Controllers\Customers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class CustomerLogout extends Controller
{
    //logout
    public function logout(Request $request){
    	// $activeSessions = VendorActivity::where([
    	// 	'vendor_id'=>Auth::guard('vendor')->user()->id,
    	// 	'activityName'=>'Login',
    	// 	'is_loogedIn'=>'Active',
    	// ])->get('id');

    	Auth::logout();
	    $request->session()->invalidate();

	    //update vendor activities
	    //$this->updateVendorActivity($activeSessions);
	    return redirect()->route('login');
    }

    private function updateVendorActivity($activeSessions){

    	if (!$activeSessions->isEmpty()) {
    		foreach ($activeSessions as $key => $value) {
    			VendorActivity::where([
    				'id'=>$value->id,
		            'activityName'=>'Login',
    			])->update([
		            'is_loogedIn'=>'Sign out',
		            'updated_at'=>Carbon::now()
		        ]);
    		}
    	}
    	
    }
}
