 @extends('frontend.layouts.master')
 @section('content')
{{-- herosection --}}
    {{-- @include('frontend.partials.herosection') --}}
{{-- herosection --}}

        <!-- Start Product Area -->
        <div class="porduct-area section-pt section-pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="section-title text-center">
                            <h2><span>Feature</span> Product</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                        </div>
                    </div>
                </div>

                <div class="row product-active-lg-4">
                 @foreach ($featured_products as $featured_product)
                    <div class="col-lg-3">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="{{asset('assets/images/product/'.$featured_product->thumbnail)}}" alt="Produce Images"></a>
                                <span class="label">15% Off</span>
                                <div class="product-action">
                                    <a href="" data-id="{{$featured_product->id}}" class="add-to-cart"><i class="ion-bag"></i></a>
                                    <a href="#" class="wishlist"><i class="ion-android-favorite-outline"></i></a>
                                    <a href="#" class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"><i class="ion-ios-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">{{$featured_product->name}}</a></h3>
                                <div class="price-box">
                                    <span class="old-price">{{$featured_product->old_price}}&nbsp; bdt</span>
                                    <span class="new-price">{{$featured_product->new_price}}&nbsp; bdt</span>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                @endforeach
                   

                </div>
            </div>
        </div>
        <!-- Start Product End -->

        <!-- Banner Area Start -->
        <div class="banner-area section-pb">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <!-- Single Banner Start -->
                        <div class="single-banner mt-30">
                            <img src="frontend/assets/images/banner/banner-01.jpg" alt="">
                            <div class="banner-content text-center">
                                <div class="banner-content-box">
                                    <h4>Wedding Surprise</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the have suffered lebmid alteration in some ledmid form</p>
                                    <a href="shop.html">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Banner End -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <!-- Single Banner Start -->
                        <div class="single-banner mt-30">
                            <img src="frontend/assets/images/banner/banner-02.jpg" alt="">
                            <div class="banner-content text-center">
                                <div class="banner-content-box">
                                    <h4>Wedding Surprise</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the have suffered lebmid alteration in some ledmid form</p>
                                    <a href="shop.html">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Banner End -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <!-- Single Banner Start -->
                        <div class="single-banner mt-30">
                            <img src="frontend/assets/images/banner/banner-03.jpg" alt="">
                            <div class="banner-content text-center">
                                <div class="banner-content-box">
                                    <h4>Wedding Surprise</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the have suffered lebmid alteration in some ledmid form</p>
                                    <a href="shop.html">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Banner End -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Banner Area End -->

        <!-- Start Product Area -->
        <div class="porduct-area section-pb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="section-title text-center">
                            <h2><span>All</span> Product</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                        </div>
                    </div>
                </div>

                <div class="row product-two-row-4">
                @foreach ($products as $product)
                   
                    <div class="col-lg-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-details.html"><img src="{{asset('assets/images/product/'.$product->thumbnail)}}" alt="Produce Images"></a>
                                {{-- <span class="label">30% Off</span> --}}
                                <div class="product-action">
                                    <a href="#" data-id="{{$product->id}}" class="add-to-cart"><i class="ion-bag"></i></a>
                                    <a href="#" class="wishlist"><i class="ion-android-favorite-outline"></i></a>
                                    <a href="#" class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"><i class="ion-ios-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">{{$product->name}}</a></h3>
                                <div class="price-box">
                                    <span class="old-price">{{$product->old_price}}&nbsp; bdt</span>
                                    <span class="new-price">{{$product->new_price}}&nbsp; bdt</span>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                @endforeach
                    

                </div>
            </div>
        </div>
        <!-- Start Product End -->


        <!-- testimonial-area start -->
        <div class="testimonial-area testimonial-bg bg-gray overly-image section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-md-2 col-md-8 col-sm-12">
                        <div class="testimonial-slider">
                            <div class="testimonial-inner text-center">
                                <div class="test-cont">
                                    <img src="frontend/assets/images/icon/quite.png" alt="">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of passages.</p>
                                </div>
                                <div class="test-author">
                                    <h5>JONATHON JORDAN</h5>
                                </div>
                            </div>
                            <div class="testimonial-inner text-center">
                                <div class="test-cont">
                                    <img src="frontend/assets/images/icon/quite.png" alt="">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of passages.</p>
                                </div>
                                <div class="test-author">
                                    <h5>Michelle Mitchell</h5>
                                </div>
                            </div>
                            <div class="testimonial-inner text-center">
                                <div class="test-cont">
                                    <img src="frontend/assets/images/icon/quite.png" alt="">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of passages.</p>
                                </div>
                                <div class="test-author">
                                    <h5>Max Mitchell</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial-area end -->


        <!-- Blog Area Start -->
        <div class="blog-area section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="section-title text-center">
                            <h2><span>Latest</span> Blog</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <!-- single-blog Start -->
                        <div class="single-blog mt-30">
                            <div class="blog-image">
                                <a href="#"><img src="frontend/assets/images/blog/blog-03.jpg" alt=""></a>
                                <div class="meta-tag">
                                    <p><span>21</span> / Nov</p>
                                </div>
                            </div>

                            <div class="blog-content">
                                <h4><a href="#">Lorem Ipsum available but majority</a></h4>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered in some ledmid form There are many majority have suffered </p>
                                <div class="read-more">
                                    <a href="#">READ MORE</a>
                                </div>
                            </div>
                        </div>
                        <!-- single-blog End -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- single-blog Start -->
                        <div class="single-blog mt-30">
                            <div class="blog-image">
                                <a href="#"><img src="frontend/assets/images/blog/blog-04.jpg" alt=""></a>
                                <div class="meta-tag">
                                    <p><span>26</span> / Nov</p>
                                </div>
                            </div>

                            <div class="blog-content">
                                <h4><a href="#">Available but majority lorem Ipsum </a></h4>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered in some ledmid form There are many majority have suffered </p>
                                <div class="read-more">
                                    <a href="#">READ MORE</a>
                                </div>
                            </div>
                        </div>
                        <!-- single-blog End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->
 @endsection

@section('page-level-javascript')
<script type="text/javascript">
    $(function(){

     function displayNumberofItemsInMiniCart(cart){
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
        id=$(this).data('id');
         $.ajax({
               url: '{{ url('add-to-cart') }}',
               method: "get",
                data: { id: id },
               success: function (response) {
                   displayNumberofItemsInMiniCart(response.cart);
               }
            });
    });
});
</script>
@endsection