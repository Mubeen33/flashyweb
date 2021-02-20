<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $fillable = [
		    		'customer_id',
		    		'type',
		    		'recipient_name',
		    		'recipient_phone_no',
		    		'street_address',
		    		'business_name',
		    		'building_complex',
		    		'suburb',
		    		'city_town',
		    		'province',
		    		'postal_code',
		    	];
    public function getFullAddressAttribute(): string
    {
        return "{$this->street_address} , {$this->province}, {$this->city_town}, {$this->postal_code}";
    }
}
