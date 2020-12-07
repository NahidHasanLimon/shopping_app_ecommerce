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
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    // end of update
       public function remove(Request $request)
    { 
      if (isset($request->id)) {
        $product_id = $request->id;
        Cart::remove($product_id);
      }
      
    }

}
