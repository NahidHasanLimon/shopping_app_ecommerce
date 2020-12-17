<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart as CartDB;
use Auth;
use Cart;
// use Request;
class CartController extends Controller
{
    //
     public function index()
    {
      // dd(Cart::session_cart_details());
     $cart_details= Cart::details();
     // dd($cart_details);
       return view('Frontend.pages.cart');
    }
    public function add_to_cart(Request $request)
    {

    // dd()
      // dd(Request::all());
      $input = $request->all();
      // Cart::update();
      // Cart::session_cart_details();
      // dd($request::ajax());
      // Cart::update();

      if (isset($input['id'])) {
              // dd($input);
          // if (Cart::add($request->id)) {
          //   dd(Cart::details());
          // }
          Cart::add($input);
          // Cart::details();
           return response()->json([
                'cart' => Cart::details()
         ]);
            
          
      }

    	 
    }
    // end of add to cart
    public function update(Request $request)
    {
       // dd($request->all());
       if (isset($request->apply_coupon)){
        $this->apply_coupon($request->coupon_code);
       }
       // dd($request->items_quantity);
      $items = $request->items_quantity;
       Cart::update($items);
       // dd($request->coupon_code);
       dd($this->apply_coupon($request->coupon_code));
      return redirect('cart')->with('cart', 'Profile updated!');
      // dd($items_quantity);
      // // foreach ($items_quantity as $key => $value) {
      // //   dd($key);
      // //   // foreach ($value as $key => $value) {
      // //   //   dd($key);
      // //   // }
      // // }

    }
    // end of update
    public function apply_coupon($coupon_code){
      if (isset($coupon_code) && !empty($coupon_code)) {
         Cart::apply_coupon($coupon_code);
      }

    }
       public function remove(Request $request)
    { 
      if (isset($request->id)) {
        $product_id = $request->id;
        Cart::remove($product_id);
         return response()->json([
                'cart' => Cart::details()
         ]);
      }
      
    }

}
