<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use Cart;
use DB;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $sub_category = new SubCategory();
        // $sub_category = $sub_category->withCount('products');
        // dd($sub_category);
        // dd(SubCategory::withCount('category')->get());
        $sub_category = new SubCategory();
        $category = new Category();
        $sub_categories = $sub_category->all();
        // $categories = $category->all();
        $categories = Category::withCount('products','sub_categories')->with('sub_categories.products')->get(); 
        // dd($categories->products);
        // $categories = Category::withCount('products')::withCount('sub_categories')->get(); 
        // dd($categories);
        // dd($categories->sub_categories);
        foreach ($categories as $key => $value) {
            // dd($key);
            if ($key ==5) {
                # code...
            foreach($value->sub_categories as $key2 => $value2 ){
                // dd($value2->count());
                // dd($value2);
            }
            }
        }
        // dd($categories->sub_category);
        $products = Product::all();
        $cart_details= Cart::details();
        // dd($categories->sub_categories->name);
// dd($categories);
//         foreach ($categories as $c) {
//             // dd($sc->name);
//             // dd($c->sub_categories);
//             if (!empty($c->sub_categories) || !is_null($c->sub_categories)) {
//                   echo "<pre>";
// print_r($c->sub_categories->products_count);
// echo "</pre>";
//             }
//             // var_dump($c);
//         // var_dump($c->sub_categories);
          
//             // dd
        // }

        return view('frontend.pages.shop',compact('products','cart_details','categories'));
    }
    public function product_details($id)
    {
        //

        $product = Product::find($id);
        // dd($product->review);
        // dd($product);
        // return view('frontend.pages.product-details',compact('product'));
        return view('frontend.pages.product-details',compact('product'));
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
