<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 'description','thumbnail',
    ];
    public function sub_categories()
    {
    return $this->hasMany('App\SubCategory');
    }
     public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\SubCategory');
    }
}
