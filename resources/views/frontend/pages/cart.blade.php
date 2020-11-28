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
            <div class="container">
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
                                        @if(!empty($cart_details['items']))
                                        @foreach ($cart_details['items'] as $key=>$item)
                                        <tr id="cart_item_row{{$key}}" data-product_id="{{$key}}"> 
                                         <td class="plantmore-product-thumbnail"><a href="#"><img height="40px;" src="{{asset('assets/images/product/'.$item['photo'])}}" alt=""></a></td>
                                            <td class="plantmore-product-name"><a href="#">{{$item['name']}}</a></td>
                                            <td class="plantmore-product-price"><span class="amount">{{$item['price']}}</span></td>
                                            <td class="plantmore-product-quantity">
                                                <input name="item_quantity[{{$key}}]" value="{{$item['quantity']}}" type="number" min="1" max="" class="quantity_of_an_item">
                                            </td>
                                            <td class="product-subtotal"><span class="amount">{{$item['item_total']}}</span></td>
                                            <td class="plantmore-product-remove"><a href="#" class="item-remove-btn" data-id="{{$key}}"><i class="ion-close"></i></a></td>
                                        </tr>
                                          @endforeach
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
                                            <li>Subtotal <span id="cart_sub_total">{{$cart_details['sub_total']}}</span></li>
                                            <li>Total <span id="cart_total">{{$cart_details['sub_total']}}</span></li>
                                        </ul>
                                        <a href="#" class="proceed-checkout-btn">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                         @endif
                    </div>
                </div>
            </div>
        </div>
 @endsection

@section('page-level-javascript')
<script type="text/javascript">
    $(function(){

    function displayNumberofItemsInCart(cart){
        console.log(cart);
        // $('.mini-cart').html('');
        $('#cart-total').empty();
        $('#cart-total').text(cart.number_of_items_in_cart)
        $('#sub-total').empty();
        $('#sub-total').text(cart.sub_total)
        $('.mini-cart').find('.cart-item').remove();
        $.each( cart.items, function( key, value ) {
          console.log(value);
          $('.mini-cart').prepend(`<li class="cart-item">
                                            <div class="cart-image">
                                                <a href="product-details.html"><img alt="" src="/assets/images/product/`+value.photo+`"></a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="product-details.html">
                                                    <h4>`+value.name+`</h4>
                                                </a>
                                                <span class="quantity">`+value.quantity+` ×</span>
                                                <div class="price-box"><span class="new-price">`+value.price+`</span></div>
                                                <a class="remove_from_cart" href="#"><i class="icon-trash icons"></i></a>
                                            </div>
                                        </li>
                                           `)
        });
    }
 var prev_quantity = $(".quantity_of_an_item").val();
 $(".quantity_of_an_item").on('keyup change click', function () {
        current_quantity = $(this).val();
        console.log(current_quantity);
       
        // var current_sub_total = $(this).closest('tr').find('.product-subtotal span').text();
        var unit_price = $(this).closest('tr').find('.plantmore-product-price span').text();
        var updated_subtotal = parseFloat(unit_price) * parseFloat(current_quantity);
        // var sub_total = $(this).closest('.row').find('.col-lg-10').remove();
        // console.log('current_quantity'+current_quantity);
        // console.log('Unit Price'+unit_price);
        // console.log('Updated Sub'+updated_subtotal);
        $(this).closest('tr').find('.product-subtotal span').text(updated_subtotal.toFixed(2));


        $('#cart_sub_total').text(cart_total_calculation().toFixed(2));
        $('#cart_total').text(cart_total_calculation().toFixed(2));
       

           
});
  $('.item-remove-btn').click(function(e){
        e.preventDefault();
       var id=$(this).data('id');

         $.ajax({
               url: '{{ url('remove-from-cart') }}',
               method: "get",
                data: { id: id },
               success: function (response) {
                console.log(response);
                   displayNumberofItemsInCart(response.cart);
                   $(this).parents('tr').hide();
                   $(this).parents("tr").remove();
                   // $('#cart_item_row'+id'').remove(); 
                   // $('#cart_item_row'+id+'').remove(); 
               }
            });
    });

    // cart_total_calculation();
    function cart_total_calculation(){
          var cart_subtotal = 0;
     $('#cart_table_body  > tr > td.product-subtotal').each(function(){
        cart_subtotal += parseFloat($(this).text());
    });
     return cart_subtotal;
    }
   
}); 


</script>
@endsection