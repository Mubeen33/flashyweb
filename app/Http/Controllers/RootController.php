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
    	$today =$current->format('Y-m-d');
    	$sliders = Slider::whereDate('start_time', '<=', $today)
    					->whereDate('end_time', '>=', $today)
    					->orderBy('order_no', 'ASC')
    					->get();
    	$banners = Banner::where('type', 'Banner')
    					->whereDate('start_time', '<=', $today)
    					->whereDate('end_time', '>=', $today)
    					->orderBy('order_no', 'ASC')
                        ->take(2)
    					->get();
    	$ads_bannerGroups = Banner::where([
    						'type'=>'Ads-Banner',
    						'ads_banner_position'=>'Banner-Groups',
    					])
    					->whereDate('start_time', '<=', $today)
    					->whereDate('end_time', '>=', $today)
    					->orderBy('order_no', 'ASC')
    					->take(3)
                        ->get();
    	$ads_bannerLong = Banner::where([
    						'type'=>'Ads-Banner',
    						'ads_banner_position'=>'Banner-Long',
    					])
    					->whereDate('start_time', '<=', $today)
    					->whereDate('end_time', '>=', $today)
    					->orderBy('order_no', 'ASC')
    					->first();
    	$ads_bannerShort = Banner::where([
    						'type'=>'Ads-Banner',
    						'ads_banner_position'=>'Banner-Short',
    					])
    					->whereDate('start_time', '<=', $today)
    					->whereDate('end_time', '>=', $today)
    					->orderBy('order_no', 'ASC')
    					->first();
    	$ads_bannerBox = Banner::where([
    						'type'=>'Ads-Banner',
    						'ads_banner_position'=>'Banner-Box',
    					])
    					->whereDate('start_time', '<=', $today)
    					->whereDate('end_time', '>=', $today)
    					->orderBy('order_no', 'ASC')
    					->first();

        print_r($sliders);
        return;
    	return view('index', compact('sliders', 'banners', 'ads_bannerGroups',
    		'ads_bannerLong', 'ads_bannerShort', 'ads_bannerBox'
    	));
    }
}
