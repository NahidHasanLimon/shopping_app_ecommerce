<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart as CartDB;
use Auth;
use Cart;
use Session;
class CartController extends Controller
{
    //
     public function index()
    {
     $cart_details= Cart::details();
       return view('Frontend.pages.cart');
    }
    public function add_to_cart(Request $request)
    {
      $input = $request->all();
      if (isset($input['id'])) {
          Cart::add($input);
           return response()->json([
                'cart' => Cart::details()
         ]);
         }
    }
    // end of add to cart
    public function update(Request $request)
    { 
       if (isset($request->items_quantity)) {
         $items = $request->items_quantity;
         if (Cart::update($items)){
          Session::flash('success', 'You have successfully updated cart!');
         }else{
          Session::flash('error', 'Failed to update cart!');
         }
       }
      if (isset($request->apply_coupon)){
          $coupon_code = $request->coupon_code;
          if (!is_null($coupon_code)) {
            $apply_coupon = Cart::apply_coupon($coupon_code);
            // dd($apply_coupon);
             if ($apply_coupon=='success') {
             Session::flash('success',$coupon_code.'Coupon Appllied Successfully!');
           }elseif ($apply_coupon=='invalid') {
             Session::flash('error','Invalid Coupon Code');  
           }elseif ($apply_coupon=='expired') {
             Session::flash('error','Coupon Unavailable right now!Please stay with us!');
           }
           else{
            Session::flash('info', $apply_coupon);
           }
          }
        else{
          Session::flash('error', 'Please enter a coupon code');
        }
        
      
       }
        // $request->session()->flash('success','Coupon Appllied Successfully!');
       // session()->save();
       // Session::save();
       // Session::flash('success','Coupon Appllied Successfully!');
       // session()->put('success','Coupon Appllied Successfully!');
       // session()->put('success', 'Coupon Appllied Successfully');
       if ($message = Session::get('success')) {
         // dd($message);
       }
       // dd(Session::get('success') );
       // dd(session()->get('success'));
      // return redirect('cart');
       // return back();
       // Session()::save();
       // session()->save();

       return redirect()->back();
       // return redirect()->route('cart.view');


    }
    // end of update
    public function apply_coupon(Request $request){
      $coupon_code = $request->coupon_code;
      if (isset($coupon_code) && !empty($coupon_code)) {
           $apply_coupon = Cart::apply_coupon($coupon_code);
           if ($apply_coupon=='success') {
             Session::flash('success','"'.$coupon_code.'"  Coupon Appllied Successfully!');
           }elseif ($apply_coupon=='invalid') {
             Session::flash('error','"'.$coupon_code.'" Invalid Coupon Code');  
           }elseif ($apply_coupon=='expired') {
             Session::flash('error','"'.$coupon_code.'" Coupon Unavailable right now!Please stay with us!');
           }
           else{
            Session::flash('info','"'.$coupon_code.'"'.$apply_coupon);
           }
            
      }
      return back();

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
      
    } public function remove_coupon($coupon_code)
    { 
      if (isset($coupon_code) &&!is_null($coupon_code)) {
         $coupon_remove = Cart::remove_coupon($coupon_code);
         if ($coupon_remove) {
             Session::flash('success','"'.$coupon_code.'" Coupon removed successfully');
         }else{
           Session::flash('error','"'.$coupon_code.'" Coupon failed to remove');
         }
      }
      return back();
      
    }
}
