<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
	{
	    return $this->belongsTo('App\Models\Category', 'parent_id');
	}
	  //Get Sub Menu
	public function childs() {
        return $this->hasMany('App\Models\Category','parent_id','id')
        	->where([
                ['show_image_nav', '=', 1],//'show_image_nav' for is category on navigation or not
                ['deleted', '=', 0]
        	]);
    }
}
