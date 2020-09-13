<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    public function get_vendor(){
    	return $this->belongsTo('App\Models\Vendor', 'ven_id', 'id');
    }

    public function get_product(){
    	return $this->belongsTo('App\Models\Product', 'prod_id', 'id');
    }
}
