@extends('frontend.layouts.master')
@section('content')
 <!-- breadcrumb-area start -->
        <div class="breadcrumb-area section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="breadcrumb-title">Signle Product</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Signle Product</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
  <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb product-details-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-6">
                        <div class="product-details-images">
                            <div class="product_details_container">
                                <!-- product_big_images start -->
                                <div class="product_big_images-right">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane active product-image-position" id="img-tab-5">
                                            <a href="assets/images/product/details/large-01.jpg" class="img-poppu">
                                                <img src="{{asset('assets/images/product/'.$product->thumbnail)}}" alt="{{$product->name}}">
                                            </a>
                                        </div>
                                        <div role="tabpanel" class="tab-pane product-image-position" id="img-tab-6">
                                            <a href="assets/images/product/details/large-02.jpg" class="img-poppu">
                                                <img src="assets/images/product/details/large-02.jpg" alt="#">
                                            </a>
                                        </div>
                                        <div role="tabpanel" class="tab-pane product-image-position" id="img-tab-7">
                                            <a href="assets/images/product/details/large-03.jpg" class="img-poppu">
                                                <img src="assets/images/product/details/large-03.jpg" alt="#">
                                            </a>
                                        </div>
                                        <div role="tabpanel" class="tab-pane product-image-position" id="img-tab-8">
                                            <a href="assets/images/product/details/large-04.jpg" class="img-poppu">
                                                <img src="assets/images/product/details/large-04.jpg" alt="#">
                                            </a>
                                        </div>
                                        <div role="tabpanel" class="tab-pane product-image-position" id="img-tab-9">
                                            <a href="assets/images/product/details/large-03.jpg" class="img-poppu">
                                                <img src="assets/images/product/details/large-03.jpg" alt="#">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- product_big_images end -->

                                <!-- Start Small images -->
                                <ul class="product_small_images-left vartical-product-active nav" role="tablist">
                                    {{-- <li role="presentation" class="pot-small-img active">
                                        <a href="#img-tab-5" role="tab" data-toggle="tab">
                                            <img src="assets/images/product/details/small-01.jpg" alt="#">
                                        </a>
                                    </li> --}}
                                    @if (!empty($product->images))
                                    	@foreach ($product->images as $product_image)	
                                    <li role="presentation" class="pot-small-img active">
                                        <a href="#img-tab-5" role="tab" data-toggle="tab">
                                            <img src="{{asset('assets/images/product/'.$product_image->image)}}" alt="{{$product->name}}">
                                        </a>
                                    </li>
                                    	@endforeach
                                    @endif
                                    
                                </ul>
                                <!-- End Small images -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-6">
                        <!-- product_details_info start -->
                        <div class="product_details_info">
                            <h2>{{$product->name}}</h2>
                            <!-- pro_rating start -->
                            <div class="pro_rating d-flex">
                                <ul class="product-rating d-flex">
                                    <li><span class="ion-android-star-outline"></span></li>
                                    <li><span class="ion-android-star-outline"></span></li>
                                    <li><span class="ion-android-star-outline"></span></li>
                                    <li><span class="ion-android-star-outline"></span></li>
                                    <li><span class="ion-android-star-outline"></span></li>
                                </ul>
                                <span class="rat_qun"> (Based on 0 Ratings) </span>
                            </div>
                            <!-- pro_rating end -->
                            <!-- pro_details start -->
                            <div class="pro_details">
                                <p>{{$product->description}}</p>
                            </div>
                            <!-- pro_details end -->
                            <!-- pro_dtl_prize start -->
                            <ul class="pro_dtl_prize">
                            	@if ($product->old_price==$product->new_price)
                                <li class="old_prize">$15.21</li>
                            	@endif
                                <li>{{$product->new_price}} &nbsp; BDT</li>
                            </ul>
                            <!-- pro_dtl_prize end -->
                            <!-- pro_dtl_color start-->
                            <div class="pro_dtl_color">
                                <h2 class="title_2">Choose Colour</h2>
                                <ul class="pro_choose_color">
                                    <li class="red"><a href="#"><i class="ion-record"></i></a></li>
                                    <li class="blue"><a href="#"><i class="ion-record"></i></a></li>
                                    <li class="perpal"><a href="#"><i class="ion-record"></i></a></li>
                                    <li class="yellow"><a href="#"><i class="ion-record"></i></a></li>
                                </ul>
                            </div>
                            <!-- pro_dtl_color end-->
                            <!-- product-quantity-action start -->
                            <div class="product-quantity-action">
                                <div class="prodict-statas"><span>Quantity :</span></div>
                                <div class="product-quantity">
                                    <form action="#">
                                        <div class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input value="1" type="number">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- product-quantity-action end -->
                            <!-- pro_dtl_btn start -->
                            <ul class="pro_dtl_btn">
                                <li><a href="#" class="buy_now_btn">buy now</a></li>
                                <li><a href="#"><i class="ion-heart"></i></a></li>
                            </ul>
                            <!-- pro_dtl_btn end -->
                            <!-- pro_social_share start -->
                            <div class="pro_social_share d-flex">
                                <h2 class="title_2">Share :</h2>
                                <ul class="pro_social_link">
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                            <!-- pro_social_share end -->
                        </div>
                        <!-- product_details_info end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-details-tab mt-60">
                            <ul role="tablist" class="mb-50 nav">
                                <li class="active" role="presentation">
                                    <a data-toggle="tab" role="tab" href="#description" class="active">Description</a>
                                </li>
                                <li role="presentation">
                                    <a data-toggle="tab" role="tab" href="#sheet">Data sheet</a>
                                </li>
                                <li role="presentation">
                                    <a data-toggle="tab" role="tab" href="#reviews">Reviews</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="product_details_tab_content tab-content">
                            <!-- Start Single Content -->
                            <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                                <div class="product_description_wrap">
                                    <div class="product_desc mb--30">
                                        <h2 class="title_3">Details</h2>
                                        <p>{{$product->description}}}</p>
                                    </div>
                                    <div class="pro_feature">
                                        <h2 class="title_3">Features</h2>
                                        <ul class="feature_list">
                                            <li><a href="#"><i class="ion-ios-play-outline"></i>Duis aute irure dolor in reprehenderit in voluptate velit esse</a></li>
                                            <li><a href="#"><i class="ion-ios-play-outline"></i>Irure dolor in reprehenderit in voluptate velit esse</a></li>
                                            <li><a href="#"><i class="ion-ios-play-outline"></i>Sed do eiusmod tempor incididunt ut labore et </a></li>
                                            <li><a href="#"><i class="ion-ios-play-outline"></i>Nisi ut aliquip ex ea commodo consequat.</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div class="product_tab_content tab-pane" id="sheet" role="tabpanel">
                                <div class="pro_feature">
                                    <h2 class="title_3">Data sheet</h2>
                                    <ul class="feature_list">
                                        <li><a href="#"><i class="ion-ios-play-outline"></i>Duis aute irure dolor in reprehenderit in voluptate velit esse</a></li>
                                        <li><a href="#"><i class="ion-ios-play-outline"></i>Irure dolor in reprehenderit in voluptate velit esse</a></li>
                                        <li><a href="#"><i class="ion-ios-play-outline"></i>Irure dolor in reprehenderit in voluptate velit esse</a></li>
                                        <li><a href="#"><i class="ion-ios-play-outline"></i>Sed do eiusmod tempor incididunt ut labore et </a></li>
                                        <li><a href="#"><i class="ion-ios-play-outline"></i>Sed do eiusmod tempor incididunt ut labore et </a></li>
                                        <li><a href="#"><i class="ion-ios-play-outline"></i>Nisi ut aliquip ex ea commodo consequat.</a></li>
                                        <li><a href="#"><i class="ion-ios-play-outline"></i>Nisi ut aliquip ex ea commodo consequat.</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-7">

                                        <!-- blog-details-wrapper -->
                                        <div class="col-lg-12 review_address_inner">
                                            <h5>Review</h5>
                                            @foreach ($product->review as $review)
                                            <!-- Single Review -->
                                            <div class="pro_review">
                                                <div class="review_thumb">
                                                    {{-- <img alt="review images" src="assets/images/other/review-03.jpg"> --}}
                                                </div>
                                                <div class="review_details">
                                                    <div class="review_info">
                                                        <h5><a href="#">{{Auth::user()->name}}</a></h5>
                                                       {{--  <div class="rating_send">
                                                            <a href="#">Reply</a>
                                                        </div> --}}
                                                    </div>
                                                    <div class="review_date">
                                                        <span>{{$review->review}}</span>
                                                    </div>
                                                    <p>{{$review->custom_created_at}}</p>
                                                </div>
                                            </div>
                                            <!--// Single Review -->
                                              @endforeach
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="comments-reply-area">
                                                <h5 class="comment-reply-title mb-30">Leave a Review</h5>
                                                <form  class="comment-form-area" method = "POST"
                        action="{{route('product.review.store')}}">
                        @csrf
                                                    <div class="comment-input">
                                                        <div class="row">
                                                        	<input type="hidden" name="product_id" value="{{$product->id}}">
                                                            <div class="col-lg-12">
                                                                <p class="comment-form-comment">
                                                                    <textarea name="review" class="comment-notes" required="required" placeholder="Comment *"></textarea>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="comment-form-submit">
                                                                    @if (Auth::check())
                                                                    	<button class="comment-submit">SUBMIT</button>
                                                                    	@else 
                                                                    	<a class="" href="{{ route('login') }}">Please Login For Leave a Review</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--// blog-details-wrapper -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->
@endsection
@section('page-level-javascript')
@endsection