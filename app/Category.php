<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function sub_categories()
    {
    return $this->hasMany('App\SubCategory');
    }
}
