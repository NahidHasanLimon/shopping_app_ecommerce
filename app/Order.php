<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
     protected $fillable = [
        'user_id','status','coupon_code','coupon_value','discount','sub_total','total','is_different_shipping','is_guest_checkout','date','shipping_date',
    ];
    public function getCustomDateAttribute()
	{
		// dd($this->date);
		return Carbon::parse($this->date)->format('M d, Y');
	    // return Carbon::createFromFormat('m/d/Y', $this->date);
	}
}
