<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Banner;
use Carbon\Carbon;

class RootController extends Controller
{
    public function index(){
    	$current = Carbon::now();
    	$today =$current->format('Y-m-d') ;
    	$sliders = Slider::whereDate('start_time', '<=', $today)
    					->whereDate('end_time', '>=', $today)
    					->orderBy('order_no', 'ASC')
    					->get();
    	$banners = Banner::where('type', 'Banner')
    					->whereDate('start_time', '<=', $today)
    					->whereDate('end_time', '>=', $today)
    					->orderBy('order_no', 'ASC')
    					->get();
    	$ads_banners = Banner::where('type', 'Ads-Banner')
    					->whereDate('start_time', '<=', $today)
    					->whereDate('end_time', '>=', $today)
    					->orderBy('order_no', 'ASC')
    					->get();
    	return view('index', compact('sliders', 'banners', 'ads_banners'));
    }
}
