<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VendorProduct;

class Product extends Model
{
    public function get_vendor(){
    	return $this->belongsTo('App\Models\Vendor', 'vendor_id', 'id');
    }

    public function get_category(){
    	return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function get_images(){
    	return $this->hasMany('App\Models\ProductMedia', 'image_id', 'image_id');
    }
    public function get_inventory($prod_id){

        return $vendor_product = VendorProduct::where('prod_id',$prod_id)->where('active',1)->get();
    }
    public function get_variations(){
        return $this->hasMany('App\Models\ProductVariation', 'id', 'variation_id')->where('active', 1);
    }

    //visible
    //hidden
    //guards
    //fillable
    //casting
    //mutator
    //accessor
    //append(imaginary attribute)
    //timestapm
    //softdelete
    //route model binding
    //chunks
    //array or json conversion
    //aggrigate function and where cluse


}
