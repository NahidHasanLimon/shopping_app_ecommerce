<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CartItem;
class Cart extends Model
{
    //
    protected $fillable = [
        'user_id', 'session_id',
    ];
    public function items()
    {
    	// dd($this->items);
        return $this->hasMany('App\CartItem');
    }

}
