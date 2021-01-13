<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class SubCategory extends Model
{
    //
    public function category()
    {
    return $this->belongsTo('App\Category');
    }
    public function numberOfProductSubCategories() {
    	return DB::table('categories')->count();
    	// return 18;
	}
	public function products() {
    	return $this->hasMany('App\Product');
	}
}
