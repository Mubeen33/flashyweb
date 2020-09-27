<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function get_vendor(){
        return $this->belongsTo('App\Models\Vendor', 'vendor_id', 'id');
    }
    public function get_vendor_product(){
        return $this->belongsTo('App\Models\VendorProduct', 'vendor_product_id', 'id');
    }
}
