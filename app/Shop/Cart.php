<?php
namespace App\Shop;
use Session;
use App\User;
use Auth;
class Cart
{
	private $user;
	
	function __construct()
	{
		// $this->user = new User();
	}
	
	public function add(){
		// echo "Hello from cart method";
		// dd($this->user->all());
	}
	public function session_cart_details(){
      $cart_details =  array(); 
      $number_of_items_in_cart=0;
      $sub_total = 0;
      $sub_total_temp = 0;
      $items = [];
      if (session()->has('cart')) {
        $items = session()->get('cart');
        $number_of_items_in_cart = count($items);
          foreach ($items as $item) {
            $sub_total_temp +=  (double)$item['item_total'];
            $sub_total = round( $sub_total_temp , 2);
          }
      }
      $cart_details['number_of_items_in_cart'] = $number_of_items_in_cart;
      $cart_details['sub_total'] = $sub_total;
      $cart_details['items'] = $items;
       return $cart_details;
    }
	public function details(){
		 return $this->session_cart_details();
		// dd( $this->session_cart_details());
		// return 3;
	}
}

