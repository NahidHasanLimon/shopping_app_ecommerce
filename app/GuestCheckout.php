<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestCheckout extends Model
{
    //
    protected $fillable = [
        'order_id','name','email','street_address','town_or_city','district','post_code','phone','additional_details',
    ];
}
