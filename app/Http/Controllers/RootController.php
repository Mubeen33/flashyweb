<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\VendorProduct;
use Carbon\Carbon;

class RootController extends Controller
{
    public function index(){
    	$current = Carbon::now();
    	$today =$current->format('Y-m-d');
        $current__time =$current->format('Y-m-d H:i');

    	$sliders = Slider::whereDate('start_time', '<=', $today)
    					->whereDate('end_time', '>=', $today)
    					->orderBy('order_no', 'ASC')
    					->get();  	

        $products = VendorProduct::where("active", 1)
                    ->select("*")
                    ->selectRaw("MIN(price) AS min_price")
                    ->groupBy("prod_id")
                    ->orderBy('created_at', 'DESC')
                    ->with(['get_product', 'get_vendor'])
                    ->get();

        //get home page banners
        $get_home_banners = Banner::get();  


    	return view('index', compact('sliders', 'get_home_banners', 'products', 'current__time'));
    }
}
