<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingPrice extends Model
{
   protected $fillable=['min_weight','max_weight','default_price','per_kg_price'];
}
