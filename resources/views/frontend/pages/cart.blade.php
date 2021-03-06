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
                        <form  class="cart-table"  method = "POST"
                        action="{{route('cart.update')}}"
                         {{-- action="/c/update" --}}
                        >
                            @csrf
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
                                                <input name="items_quantity[{{$item['product_id']}}]" value="{{$item['quantity']}}" type="number" min="1" max="" class="quantity_of_an_item">
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
                                            <input class="submit btn" name="update_cart" value="updateCart" type="submit">
                                            <a href="shop.html" class="btn continue-btn">Continue Shopping</a>
                                        </div>
                                        <div class="coupon">
                                            <h3>Coupon</h3>
                                       @if(empty(Cart::details()['coupon_code']))
                                            <p>Enter your coupon code if you have one.</p>
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        @else
                                            <div class="your-order-wrap border">      
                                              <div class="input-group">
                                                <div class="input-group-prepend bg-danger">
                                                    <div class="input-group-text">
                                                        <a href="{{route('coupon.remove',Cart::details()['coupon_code']) }}" class="button btn-danger">Remove</a>
                                                    </div>
                                                </div>
                                                <h5 class="text-center text-middle">Your Applied Coupon: <span class="bold"> {{Cart::details()['coupon_code']}}</span></h5>
                                              </div>
                                        </div>
                                        @endif
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-md-4 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul>
                                            <li>Subtotal <span id="cart_sub_total">{{Cart::details()['sub_total']}}</span></li> 
                                            @if (!empty(Cart::details()['coupon_code']))
                                                <li>Coupon - {{Cart::details()['coupon_code']}} <span id="coupon_value">{{Cart::details()['coupon_value']}}</span></li>
                                            @endif
                                            <li>Total <span id="cart_total">{{Cart::details()['total']}}</span></li>
                                        </ul>
                                        <a href="{{ route('checkout') }}" class="proceed-checkout-btn">Proceed to checkout</a>
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
        // $('#cart_total').text(cartTotalCalculation().toFixed(2));      
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