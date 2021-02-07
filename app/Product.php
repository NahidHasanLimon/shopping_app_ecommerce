<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'sub_category_id', 'description','old_price','new_price','is_featured','thumbnail','slug',
    ];
    public function review()
    {
        return $this->hasMany('App\ProductReview');
    }
	public function images()
    {
        return $this->hasMany('App\ProductImage');
    }
    public function sub_category()
    {
        return $this->belongsTo('App\SubCategory');
    }
    
}
