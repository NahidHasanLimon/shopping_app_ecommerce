<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use Cart;
class CartController extends Controller
{
    //
     public function index()
    {
      // dd(Cart::details());
      $cart_details= Cart::details();
      if (Auth::check()) {

    }else{

    $cart_details= Cart::details();

    }
       
       // dd($cart_details);
    	// return view('frontend.pages.cart',compact($cart_details));
       return view('Frontend.pages.cart',compact('cart_details'));
    }

    // public function session_cart_details(){
    //   $cart_details =  array(); 
    //   $number_of_items_in_cart=0;
    //   $sub_total = 0;
    //   $sub_total_temp = 0;
    //   $items = [];
    //   if (session()->has('cart')) {
    //     $items = session()->get('cart');
    //     $number_of_items_in_cart = count($items);
    //       foreach ($items as $item) {
    //         $sub_total_temp +=  (double)$item['item_total'];
    //         $sub_total = round( $sub_total_temp , 2);
    //       }
    //   }
    //   $cart_details['number_of_items_in_cart'] = $number_of_items_in_cart;
    //   $cart_details['sub_total'] = $sub_total;
    //   $cart_details['items'] = $items;
    //    return $cart_details;
    // }
    public function add_to_cart(Request $request)
    {
    	 // session()->flush();
    	// dd(session());
    	$product_id=$request->id;
      $product = Product::find($product_id);
        if(!$product) {
            abort(404);
        }
        // dd($product);
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $product_id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->new_price,
                        "photo" => $product->thumbnail,
                        "item_total" => (double)$product->new_price,
                        "ip_address" => $request->ip()
                    ]
            ];
            session()->put('cart', $cart);
            // return redirect()->back()->with('success', 'Product added to cart successfully!');
             return response()->json([
             		'cart' => Cart::details()
         ]);
        }
        // if cart not empty then check if this product exist then increment quantity
        // dd( count(session()->get('cart') ));
        if(isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
            $cart[$product_id]['item_total'] = $cart[$product_id]['quantity'] * (double)$cart[$product_id]['price'];
            session()->put('cart', $cart);
              return response()->json([
             		'cart' => Cart::details()
         ]);
            // return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$product_id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->new_price,
            "photo" => $product->thumbnail,
            "item_total" => (double)$product->new_price * 1
        ];
        session()->put('cart', $cart);
          return response()->json([
             		'cart' => Cart::details()

         ]);
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
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
      // return0;
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response()->json([
                'cart' => Cart::details()

         ]);
        }
    }

}
