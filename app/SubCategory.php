<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Product;
class SubCategory extends Model
{
    //
    protected $fillable = [
        'name', 'category_id',
    ];
    public function category()
    {
    return $this->belongsTo('App\Category');
    }
    public function numberOfProductSubCategories() {
    	// return DB::table('categories')->count();
    	// return 18;
        $sub_category_id =1;
        // return Product::where('sub_category_id' == $sub_category_id)->count();
        return 18;
	}
	public function products() {
    	return $this->hasMany('App\Product');
	}

}
