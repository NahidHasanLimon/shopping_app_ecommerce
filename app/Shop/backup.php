<?php 
$product_id=$request->id;
      $product = Product::find($product_id);
        if(!$product) {
            abort(404);
        }
      //   // Cart::
      //   // dd(CartDB::all());
      //   Cart::add_to_cart($product);
      //   dd(Cart::session_cart_details());
      // session()->flush();
      // dd(session());
     
         // $product_id = $product->id;
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
                'cart' =>  Cart::details()
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
                'cart' =>Cart::details()

         ]);

          
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
     ?>



      <div class="shopping-cart-wrap">
                                   @if(!empty(Cart::details()))
                                    <a href="#"><i class="ion-ios-cart-outline"></i> <span id="cart-total">{{$cart_details['number_of_items_in_cart']}}</span></a>
                                    <ul class="mini-cart">
                                        
                                        @foreach (Cart::details()['items'] as $item)
                                          <li class="cart-item">
                                            <div class="cart-image">
                                                <a href="product-details.html"><img alt="" src="{{asset('assets/images/product/'.$item['item']['thumbnail'])}}"></a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="product-details.html">
                                                    <h4>{{$item['name']}}</h4>
                                                </a>
                                                <span class="quantity">{{$item['quantity']}} ×</span>
                                                <div class="price-box"><span class="new-price">{{$item['item']['new_price']}}</span></div>
                                                <a class="remove_from_cart" href="#"><i class="icon-trash icons"></i></a>
                                            </div>
                                        </li>
                                          @endforeach
                                           
                                        <li class="subtotal-titles">
                                            <div class="subtotal-titles">
                                                <h3>Sub-Total :</h3><span id="sub-total">{{Cart::details()['total']}}</span>
                                            </div>
                                        </li>
                                       @endif
                                        <li class="mini-cart-btns @if(empty(Cart::details()['items'])) d-none @endif " id="mini_cart_btn_div">
                                            <div class="cart-btns">
                                                <a href="{{ route('cart.view') }}">View cart</a>
                                                <a href="{{ route('checkout') }}">Checkout</a>
                                            </div>
                                        </li>
                                        
                                        <div class="text-center @if (!empty(Cart::details()['items'])) d-none @endif" id="empty_cart_div">
                                            <h1>No items in the cart</h1>
                                             <a href="shop.html" class="btn continue-btn">Continue Shopping</a>
                                         </div>
                                        
                                    </ul>
                                </div>
