<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Cart;
use App\CartItem;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Cart::session_to_database());
        // dd(Cart::is_logged_user_cart_exist());
        // $cart_items = new CartItem();
        // $cart_items->price = 200;
        // $cart_items->quantity = 3;
        // $cart_items = $cart_items->find(3);
        // dd($cart_items->Total);
        // dd(Cart::sum_of_item_total_db(19));
         // dd(Cart::session_to_database());
        //factory(App\Product::class,20)->create();
        $products = Product::all();
        $featured_products = Product::where('is_featured','=',1)->take(8)->get();
        $cart_details= Cart::details();
        // foreach ($cart_details['items'] as $item) {
        //     // dd($item['item']['name']);
        // }
        // dd($cart_details);
        // if (empty(Cart::details())) {
        //    dd(Cart::details());
        // }
        // dd(Cart::details()['items']);
        // dd($cart_details['items']);
       
       
        // $cart_items= 2;
        // dd($cart_items);
        // dd($products);
        // dd($featured_products);
        return view('Frontend.pages.home',compact('products','featured_products','cart_details'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
