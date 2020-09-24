<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application;

class SiteMaintenanceController extends Controller
{
    public function under_maintainace(){
        return "The application is under maintainance";
    }
}
