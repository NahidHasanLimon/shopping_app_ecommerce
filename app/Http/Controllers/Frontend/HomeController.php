<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //factory(App\Product::class,20)->create();
        $products = Product::all();
        $featured_products = Product::where('is_featured','=',1)->take(8)->get();

        $cart_details= $this->session_cart_details();
       
       
        // $cart_items= 2;
        // dd($cart_items);
        // dd($products);
        // dd($featured_products);
        return view('Frontend.pages.home',compact('products','featured_products','cart_details'));
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
