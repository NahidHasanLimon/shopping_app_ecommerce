<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CartItem;
class Cart extends Model
{
    //
    protected $fillable = [
        'user_id', 'session_id','number_of_items_in_cart','sub_total','coupon_code','coupon_value','total',
    ];
    public function items()
    {
    	// dd($this->items);
        return $this->hasMany('App\CartItem');
    }

}
