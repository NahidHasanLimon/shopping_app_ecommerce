<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
     protected $fillable = [
        'user_id','status','coupon_code','coupon_value','discount','sub_total','total','is_different_shipping','is_guest_checkout','date','shipping_date',
    ];
}
