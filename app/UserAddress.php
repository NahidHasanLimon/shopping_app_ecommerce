<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id','street_address','town_or_city','district','post_code','phone','additional_details',
    ];
}
