<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\VendorProduct;
use App\Models\ProductVariation;
use App\Models\Vendor;
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

        foreach ($getProductData as $key => $productData) {

            $otherOffers = DB::table('vendor_products')
                                  ->where('prod_id',$productData->product_id)
                                  ->where('vendor_products.price','!=',DB::table('vendor_products')->where('prod_id',$productData->product_id)->where('active',1)->min('price'))
                                  ->get();
        }
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

    	dd($data,$otherOffers,$getProductData,$vendor_product,$categoryFlow,$related_products);
    	return view("product.show", compact('data','otherOffers','getProductData', 'vendor_product', 'categoryFlow', 'currentCategory', 'related_products'));
    }
    //


    //First Variation Data

    public function firstVariationData(Request $request){

        $first_variation_value  = $request->variation1;
        $product_id             = $request->product_id;

        $variationId = ProductVariation::where('product_id',$product_id)->where('first_variation_value',$first_variation_value)->value('id');

        $data = VendorProduct::where('variation_id',$variationId)->where('price','!=',0)->where('price','=',DB::table('vendor_products')->where('variation_id',$variationId)->where('active',1)->min('price'))->where('quantity','!=',0)->get();
        if (count($data)>0) {

            foreach ($data as $key => $vendorID) {

             $vendorName = Vendor::where('id',$vendorID->ven_id)->value('company_name');
            }
        }else{

            $vendorName = 'None';
        }

        $image = ProductVariation::where('product_id',$product_id)->where('id',$variationId)->value('variant_image');

        $data->put('variant_image',$image);
        $data->put('vendor_name',$vendorName);
        $data = json_encode($data,true);

        return $data;
    }

    public function SecondVariationData(Request $request){

        $first_variation_value  = $request->variation1;
        $second_variation_value = $request->variation2;
        $product_id             = $request->product_id;

        $variationId = ProductVariation::where('product_id',$product_id)->where('first_variation_value',$first_variation_value)->where('second_variation_value',$second_variation_value)->value('id');

        $data = VendorProduct::where('variation_id',$variationId)->where('price','!=',0)->where('price','=',DB::table('vendor_products')->where('variation_id',$variationId)->where('active',1)->min('price'))->where('quantity','!=',0)->get();
        if (count($data)>0) {

            foreach ($data as $key => $vendorID) {

             $vendorName = Vendor::where('id',$vendorID->ven_id)->value('company_name');
            }
        }else{

            $vendorName = 'None';
        }

        $image = ProductVariation::where('product_id',$product_id)->where('id',$variationId)->value('variant_image');

        $data->put('variant_image',$image);
        $data->put('vendor_name',$vendorName);
        $data = json_encode($data,true);

        return $data;
    }

//===================| OTHER OFFERS  | =======================//

    public function getSingleVariantOtherOffers(Request $request){

        $first_variation_value  = $request->variation1;
        $product_id             = $request->product_id;
        $variationId = ProductVariation::where('product_id',$product_id)->where('first_variation_value',$first_variation_value)->value('id');

        $otherOffers = DB::table('vendor_products')
                                  ->where('prod_id',$product_id)
                                  ->where('variation_id',$variationId)
                                  ->where('active',1)
                                  ->where('vendor_products.price','!=',DB::table('vendor_products')->where('prod_id',$product_id)->where('variation_id',$variationId)->where('active',1)->min('price'))
                                  ->get();
        return view('product.partials.variant-other-offers',compact('otherOffers'));
    }
    //
    public function getDoubleVariantOtherOffers(Request $request){

        $first_variation_value  = $request->variation1;
        $second_variation_value = $request->variation2;
        $product_id             = $request->product_id;
        $variationId = ProductVariation::where('product_id',$product_id)->where('first_variation_value',$first_variation_value)->where('second_variation_value',$second_variation_value)->value('id');

        $otherOffers = DB::table('vendor_products')
                                  ->where('prod_id',$product_id)
                                  ->where('variation_id',$variationId)
                                  ->where('active',1)
                                  ->where('vendor_products.price','!=',DB::table('vendor_products')->where('prod_id',$product_id)->where('variation_id',$variationId)->where('active',1)->min('price'))
                                  ->get();
        return view('product.partials.variant-other-offers',compact('otherOffers'));
    }
}
