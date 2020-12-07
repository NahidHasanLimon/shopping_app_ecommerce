<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //
    protected $fillable = [
        'cart_id', 'product_id','quantity','atttributes','price','discount','item_total',
    ];
    public function item()
    {
        return $this->belongsTo('App\Product','product_id');
    }
	public function setTotalAttribute()
	{
	$this->total = $this->quantity * $this->new_price; 
	$this->total = 2 * 2; 
	}
	public function getTotalAttribute($value)
	{
	    return $value;
	}
}
