$(function(){
  "use strict";

       window.displayNumberofItemsInMiniCart = function (cart){
        console.log("cart_js");
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
        // end of loop
       if(cart.number_of_items_in_cart<=0){
         $('#empty_cart_div').removeClass('d-none');
         $('#mini_cart_btn_div').addClass('d-none');
       }else{
         $('#mini_cart_btn_div').removeClass('d-none');
          $('#empty_cart_div').addClass('d-none');
       }
    }
      $('.add-to-cart').click(function(e){
        e.preventDefault();
       var id=$(this).data('id');
         $.ajax({
               url: 'http://127.0.0.1:8000/add-to-cart',
               method: "get",
                data: { id: id },
               success: function (response) {
                   // displayNumberofItemsInMiniCart(response.cart);
                   window.displayNumberofItemsInMiniCart(response.cart);
               }
            });
    });
  });