<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\VendorProduct;
use App\Models\ProductVariation;
use App\Models\Vendor;
use App\Models\ProductMedia;
use DB;


class CartController extends Controller
{
    public function addToCart(Request $request){

    	if (isset($_POST['action']) && $_POST['action']=='add'){
	
				$product_id        =  $_POST['product_id'];
				$vendor_id         =  $_POST['vendor_id'];
				$quantity          =  $_POST['quantity'];
				$price             =  $_POST['price'];
				// $variation_id      =  $_POST['variation_id'];
				$v_p_id            =  $_POST['v_p_id'];

				
				$vendor     = Vendor::where('id',$vendor_id)->value('company_name');
				$name       = Product::where('id',$product_id)->value('title');
				$image_id   = Product::where('id',$product_id)->value('image_id');
				$image      = ProductMedia::where('image_id',$image_id)->value('image');

				$product = Array(

								'v_p_id'       => $v_p_id,
								'product_id'   => $product_id,
								'vendor_id'    => $vendor_id,
								'name'         => $name,
								'price'        => $price,
								'quantity'     => $quantity,
								'image'	       => $image,
								'vendor'       => $vendor

							);	
				print_r($product);								

		}		
    }
}
