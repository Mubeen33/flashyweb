<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class SiteMaintenanceController extends Controller
{
    public function application(){
    	$data = Application::where('type', 'site')->first();
        if ($data && intval($data->active_mood) === 0) {
            //under maintainance
            return view('application.coming-soon');
        }
        return redirect()->route('frontend.rootPage');
        
    }
}
