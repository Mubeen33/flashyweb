<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\VendorProduct;
use App\Models\ProductVariation;
use DB;

class ProductController extends Controller
{
    public function get_single_product($slug){
    	$data = Product::where('slug', $slug)->first();
        $Id = Product::where('slug', $slug)->value('id');
    	if (!$data) {
    		return abort(404);
    	}
        // product join
        $getProductData = DB::table('products')
                              ->leftjoin('product_variations','product_variations.product_id','=','products.id')
                              ->leftjoin('vendor_products','vendor_products.prod_id','=','products.id')
                              ->where('products.id','=',$Id)
                              ->where('vendor_products.active','=',1)
                              ->where('vendor_products.price','=',DB::table('vendor_products')->where('prod_id',$Id)->where('active',1)->min('price'))
                              ->select('products.id as product_id','product_variations.first_variation_value as first_variation_value','product_variations.first_variation_name as first_variation_name','product_variations.second_variation_value as second_variation_value','product_variations.second_variation_name as second_variation_name','vendor_products.price as price','vendor_products.id as v_p_id','vendor_products.ven_id as vendorid','product_variations.id as variation_id')->get();
        

    	//then
    	$vendor_product = VendorProduct::where('prod_id', $data->id)->where('active',1)
        				->select("*")
                        ->selectRaw("MAX(price) AS max_price, MIN(price) AS min_price")
                        ->first();

        if (!$vendor_product) {
    		return abort(404);
    	}
    	$product = VendorProduct::where([
    					'prod_id'=>$data->id,
    					'price'=>$vendor_product->min_price
    				])
    				->with(['get_product', 'get_vendor', 'get_variations'])
                    ->first();
        if (!$product) {
    		return abort(404);
    	}

    	//get cat's
    	$category = Category::where('id', $product->get_product->category_id)
                    ->first();
    	if (!$category) {
    		return abort(404);
    	}
    	$categoryFlow = [];

    	do {
    		$category = Category::where('id', $category->parent_id)->first();
			if ($category) {
				$categoryFlow[] = [
					'cat_name'=>$category->name,
					'cat_id'=>$category->id
				];
			}
			
    	} while (!empty($category) && $category->parent_id != 0);
    	$currentCategory = Category::where('id', $product->get_product->category_id)
                            ->first();

    	//get related products
    	$related_products_data = Product::where([
    		['category_id', '=', $data->category_id],
    		['id', '!=', $data->id]
    	])->get('id');

    	$related_products_id_list = [];
    	foreach ($related_products_data as $key => $value) {
    		$related_products_id_list[] = $value->id;
    	}
    	$related_products_id_list = array_unique($related_products_id_list);
    	$related_products = VendorProduct::whereIn('prod_id', $related_products_id_list)
    				->where("active", 1)
                    ->select("*")
                    ->selectRaw("MIN(price) AS min_price")
                    ->groupBy("prod_id")
                    ->orderBy('created_at', 'DESC')
                    ->with(['get_product', 'get_vendor'])
                    ->get();

    	return view("product.show", compact('data','getProductData', 'vendor_product', 'categoryFlow', 'currentCategory', 'related_products'));
    }				
}
