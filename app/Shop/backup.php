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

















 @extends('frontend.layouts.master')
 @section('content')
 {{-- <div class="breadcrumb-area section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="breadcrumb-title">Cart</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- breadcrumb-area end -->


        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb cart-page">
                @if(!empty(Cart::details()['items']))
            <div class="container" id="cart_container_div">
                <div class="row">
                    <div class="col-12">
                        <form action="#" class="cart-table">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="plantmore-product-thumbnail">Images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="plantmore-product-price">Unit Price</th>
                                            <th class="plantmore-product-quantity">Quantity</th>
                                            <th class="plantmore-product-subtotal">Total</th>
                                            <th class="plantmore-product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cart_table_body">
                                        @if(!empty(Cart::details()))
                                        @foreach (Cart::details()['items'] as $key=>$item)
                                        <tr id="cart_item_row{{$item['product_id']}}" data-product_id="{{$item['product_id']}}"> 
                                         <td class="plantmore-product-thumbnail"><a href="#"><img height="40px;" src="{{asset('assets/images/product/'.$item['item']['thumbnail'])}}" alt=""></a></td>
                                            <td class="plantmore-product-name"><a href="#">{{$item['item']['name']}}</a></td>
                                            <td class="plantmore-product-price"><span class="amount">{{$item['price']}}</span></td>
                                            <td class="plantmore-product-quantity">
                                                <input name="item_quantity[][{{$item['product_id']}}]" value="{{$item['quantity']}}" type="number" min="1" max="" class="quantity_of_an_item">
                                            </td>
                                            <td class="product-subtotal"><span class="amount">{{$item['item_total']}}</span></td>
                                            <td class="plantmore-product-remove"><a href="#" class="item-remove-btn" data-id="{{$item['product_id']}}"><i class="ion-close"></i></a></td>
                                        </tr>
                                          @endforeach
                                          @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="coupon-all">

                                        <div class="coupon2">
                                            <input class="submit btn" name="update_cart" value="Update cart" type="submit">
                                            <a href="shop.html" class="btn continue-btn">Continue Shopping</a>
                                        </div>

                                        <div class="coupon">
                                            <h3>Coupon</h3>
                                            <p>Enter your coupon code if you have one.</p>
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul>
                                            <li>Subtotal <span id="cart_sub_total">{{Cart::details()['total']}}</span></li>
                                            <li>Total <span id="cart_total">{{Cart::details()['total']}}</span></li>
                                        </ul>
                                        <a href="#" class="proceed-checkout-btn">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            @else
            <div class="text-center" id="empty_cart_div">
                <h1>No items in the cart</h1>
                <a href="shop.html" class="btn continue-btn">Continue Shopping</a>
            </div>
              @endif
        </div>
 @endsection

@section('page-level-javascript')
<script src="{{ asset('frontend/assets/custom/js/cart.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery( document ).ready(function( $ ) {

   //Use this inside your document ready jQuery 
   $(window).on('popstate', function() {
      location.reload(true);
   });

});
    $(function(){
 var prev_quantity = $(".quantity_of_an_item").val();
 $(".quantity_of_an_item").on('keyup change click', function () {
        var current_quantity = $(this).val();
        console.log(current_quantity);
        if(current_quantity ==0 || current_quantity <1 || current_quantity == ''){
            console.log('invalid input');
            $(this).val(1);
            $(this).focus();
            current_quantity = 1;
        }
        var unit_price = $(this).closest('tr').find('.plantmore-product-price span').text();
        var updated_subtotal = parseFloat(unit_price) * parseFloat(current_quantity);
        $(this).closest('tr').find('.product-subtotal span').text(updated_subtotal.toFixed(2));
        $('#cart_sub_total').text(cartTotalCalculation().toFixed(2));
        $('#cart_total').text(cartTotalCalculation().toFixed(2));      
});
  $('.item-remove-btn').click(function(e){
        e.preventDefault();
       var id=$(this).data('id');
         $.ajax({
               url: '{{ url('remove-from-cart') }}',
               method: "get",
                data: { id: id },
               success: function (response) {
                    $('#cart_item_row'+id+'').remove(); 
                    window.displayNumberofItemsInMiniCart(response.cart);
                    $('#cart_sub_total').text(cartTotalCalculation().toFixed(2));
                    $('#cart_total').text(cartTotalCalculation().toFixed(2));
                    if(response.cart.number_of_items_in_cart<=0){
                        $('#cart_container_div').empty();
                        $('#cart_container_div').append(`<div class="text-center" id="empty_cart_div">
                                                            <h1>No items in the cart</h1>
                                                             <a href="shop.html" class="btn continue-btn">Continue Shopping</a>
                                                         </div>`);
                    }
               }
            });
    });

    // cartTotalCalculation();
    function cartTotalCalculation(){
          var cart_subtotal = 0;
     $('#cart_table_body  > tr > td.product-subtotal').each(function(){
        cart_subtotal += parseFloat($(this).text());
    });
     return cart_subtotal;
    }
   
}); 


</script>

@endsection