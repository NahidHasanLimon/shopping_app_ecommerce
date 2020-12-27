<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\Cart as CartModel;
use App\ShippingAddress;
use App\GuestCheckout;
use App\User;
use App\UserAddress;
use Cart;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd($request->all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // dd('ok');
        // dd($cart_details= Cart::details());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order_item = new OrderItem;
        $guest_checkout = new GuestCheckout;
        $shipping_address = new ShippingAddress;;
        $user = new User;;
        $user_address = new UserAddress;;
        //
        // dd($request->all());
        $is_different_shipping = false;
        $is_guest_checkout = false;
        $is_new_account = false;
        // dd($order_item);
        if (Auth::check()){
            $user_id = Auth::user()->id;
        }
        if (!Auth::check() && !isset($request->is_new_account)) {
             $is_guest_checkout = true;
        }
        if (!Auth::check() && isset($request->is_new_account)) {
             $is_new_account = true;
        }
        if (isset($request->is_different_shipping)) {
             $is_different_shipping = true;
        }
        
        // end of assignment
        // dd($user_id);
        // dd($is_guest_checkout);
        if (Auth::check()) {
                $order->user_id = $user_id;
            }
        // dd($cart_details= Cart::details());
     if ($is_different_shipping==true){
        // validation logic
           $shipping_address->name = $request->s_a_name;
           $shipping_address->street_address = $request->s_a_street_address;
           $shipping_address->additional_details = $request->s_a_additional_details;
           $shipping_address->town_or_city = $request->s_a_town_or_city;
           $shipping_address->district = $request->s_a_district;
           $shipping_address->post_code = $request->s_a_post_code;
           $shipping_address->phone = $request->s_a_phone;
        }
        if ($is_guest_checkout==true){
        // validation logic
            // dd('is_guest_checkout equal true');
           $guest_checkout->name = $request->name;
           $guest_checkout->email = $request->email;
           $guest_checkout->street_address = $request->street_address;
           $guest_checkout->additional_details = $request->additional_details;
           $guest_checkout->town_or_city = $request->town_or_city;
           $guest_checkout->district = $request->district;
           $guest_checkout->post_code = $request->post_code;
           $guest_checkout->phone = $request->phone;
        }
        if ($is_new_account) {
            // validation logic
            // dd('is_new_account equal true');
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            if ($user->save()) {
                // assign user id for this user
              $order->user_id = $user->id;
              // user address validation logic
              $user_address->user_id = $user->id;
              $user_address->street_address = $request->street_address;
              $user_address->additional_details = $request->additional_details;
              $user_address->town_or_city = $request->town_or_city;
              $user_address->district = $request->district;
              $user_address->post_code = $request->post_code;
              $user_address->phone = $request->phone;
              $user_address->save();


            }
        }
        // end of is new is_new_account
        if ($cart_details= Cart::details()){
            $order->is_different_shipping = $is_different_shipping;
            $order->is_guest_checkout = $is_guest_checkout;
            $order->sub_total = $cart_details['sub_total'];
            if (isset($cart_details['coupon_code'])) {
                $order->coupon_code = $cart_details['coupon_code'];
                $order->coupon_value = $cart_details['coupon_value'];
            }
            $order->total = $cart_details['total'];
            $order->save();
            // dd($order);
           
            if ($is_guest_checkout==true) {
                $guest_checkout->order_id = $order->id;
                $guest_checkout->save();
                // dd($guest_checkout);
            }
            if ($is_different_shipping==true) {
                $shipping_address->order_id = $order->id;
                $shipping_address->save();
            } 
            
            // dd($order_item);

            $cart_items = $cart_details['items'];
            // dd($cart_items);
            foreach ($cart_items as $cart_item) {
                // dd($cart_item);
                $items[] = [
                    'product_id' => $cart_item['product_id'],
                    'quantity' => $cart_item['quantity'],
                    'price' => $cart_item['price'],
                    'item_total' => $cart_item['item_total'],
                    'order_id' => $order->id
                ];

            }
            // dd($items);
            $order_item->insert($items);
            dd($order_item);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
