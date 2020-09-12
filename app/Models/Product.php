<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    public function get_inventory(){
    	return $this->belongsTo('App\Models\VendorProduct', 'id', 'prod_id');
    }

}
