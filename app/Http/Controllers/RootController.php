<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class RootController extends Controller
{
    public function index(){
    	$sliders = Slider::orderBy('order_no', 'ASC')->get();
    	return view('index', compact('sliders'));
    }
}
