@extends('frontend.layouts.master')
@section('content')
<!-- main-content-wrap start -->
        <div class="main-content-wrap shop-page section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-lg-2 order-2">
                        <!-- shop-sidebar-wrap start -->
                        <div class="shop-sidebar-wrap">

                            <!-- shop-sidebar start -->
                            <div class="shop-sidebar mb-30">
                                <h4 class="title">FILTER BY PRICE</h4>
                                <!-- filter-price-content start -->
                                <div class="filter-price-content">
                                    <form action="#" method="post">
                                        <div id="price-slider" class="price-slider"></div>
                                        <div class="filter-price-wapper">
                                            <div class="filter-price-cont">
                                                <span>Price:</span>
                                                <div class="input-type">
                                                    <input type="text" id="min-price" readonly="" />
                                                </div>
                                                <span>—</span>
                                                <div class="input-type">
                                                    <input type="text" id="max-price" readonly="" />
                                                </div>
                                                <a class="add-to-cart-button" href="#">
                                                    <span>FILTER</span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- filter-price-content end -->
                            </div>
                            <!-- shop-sidebar end -->

                            <!-- shop-sidebar start -->
                            <div class="shop-sidebar mb-30">
                                <h4 class="title">CATEGORIES</h4>
                                <ul>
                                    @foreach ($categories as $category)
                                    <li><a href="">{{$category->name}} <span>(16)</span></a></li>
                                     @endforeach
                                </ul>
                            </div>
                            <!-- shop-sidebar end -->


                            <!-- shop-sidebar start -->
                            <div class="sidbar-product shop-sidebar mb-30">
                                <h4 class="title">best product</h4>
                                <!-- sidbar-product-inner start -->
                                <div class="sidbar-product-inner">
                                    <div class="product-image">
                                        <a href="product-details.html"><img src="assets/images/product/product-01.jpg" alt=""></a>
                                    </div>
                                    <div class="product-content text-left">
                                        <h3><a href="product-details.html">Products Name 003</a></h3>
                                        <div class="price-box">
                                            <span class="old-price">11.00</span>
                                            <span class="new-price">10.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- sidbar-product-inner end -->
                                <!-- sidbar-product-inner start -->
                                <div class="sidbar-product-inner">
                                    <div class="product-image">
                                        <a href="product-details.html"><img src="assets/images/product/product-10.jpg" alt=""></a>
                                    </div>
                                    <div class="product-content text-left">
                                        <h3><a href="product-details.html">Products Name 011</a></h3>
                                        <div class="price-box">
                                            <span class="old-price">18.00</span>
                                            <span class="new-price">14.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- sidbar-product-inner end -->
                                <!-- sidbar-product-inner start -->
                                <div class="sidbar-product-inner">
                                    <div class="product-image">
                                        <a href="product-details.html"><img src="assets/images/product/product-04.jpg" alt=""></a>
                                    </div>
                                    <div class="product-content text-left">
                                        <h3><a href="product-details.html">Products Name 008</a></h3>
                                        <div class="price-box">

                                            <span class="old-price">19.00</span>
                                            <span class="new-price">16.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- sidbar-product-inner end -->
                            </div>
                            <!-- shop-sidebar end -->

                            <!-- shop-sidebar start -->
                            <div class="shop-sidebar mb-30">
                                <h4 class="title">Color</h4>
                                <ul>
                                    <li><a href="shop.html">Red <span>(18)</span></a></li>
                                    <li><a href="shop.html">Green <span>(16)</span></a></li>
                                    <li><a href="shop.html">Blue <span>(6)</span></a></li>
                                    <li><a href="shop.html">Yellow <span>(11)</span></a></li>
                                    <li><a href="shop.html">White <span>(11)</span></a></li>
                                </ul>
                            </div>
                            <!-- shop-sidebar end -->

                            <!-- shop-sidebar start -->
                            <div class="shop-sidebar mb-30">
                                <h4 class="title">SIZE</h4>
                                <ul>
                                    <li><a href="shop.html">S <span>(11)</span></a></li>
                                    <li><a href="shop.html">M <span>(13)</span></a></li>
                                    <li><a href="shop.html">L <span>(6)</span></a></li>
                                    <li><a href="shop.html">XLL <span>(51)</span></a></li>
                                    <li><a href="shop.html">XXL <span>(3)</span></a></li>
                                </ul>
                            </div>
                            <!-- shop-sidebar end -->

                            <!-- shop-sidebar start -->
                            <div class="shop-sidebar">
                                <h4 class="title">Hot Tags</h4>
                                <div class="sidebar-tag">
                                    <a href="#">Red</a>
                                    <a href="#">Blue</a>
                                    <a href="#">Man</a>
                                    <a href="#">White</a>
                                    <a href="#">Yellow</a>
                                    <a href="#">Digital</a>
                                    <a href="#">Women</a>
                                    <a href="#">Evergreen</a>
                                </div>
                            </div>
                            <!-- shop-sidebar end -->
                        </div>
                        <!-- shop-sidebar-wrap end -->
                    </div>
                    <div class="col-lg-9 order-lg-1 order-1">
                        <!-- shop-product-wrapper start -->
                        <div class="shop-product-wrapper">
                            <div class="row">
                                <div class="col">
                                    <!-- shop-top-bar start -->
                                    <div class="shop-top-bar">
                                        <!-- product-view-mode start -->

                                        <div class="product-mode">
                                            <!--shop-item-filter-list-->
                                            <ul class="nav shop-item-filter-list" role="tablist">
                                                <li class="active"><a class="active" data-toggle="tab" href="#grid"><i class="ion-ios-keypad-outline"></i></a></li>
                                                <li><a data-toggle="tab" href="#list"><i class="ion-ios-list-outline"></i></a></li>
                                            </ul>
                                            <!-- shop-item-filter-list end -->
                                        </div>
                                        <!-- product-view-mode end -->
                                        <!-- product-short start -->
                                        <div class="product-short">
                                            <select class="nice-select" name="sortby">
                                                <option value="trending">Relevance</option>
                                                <option value="sales">Name(A - Z)</option>
                                                <option value="sales">Name(Z - A)</option>
                                                <option value="rating">Price(Low > High)</option>
                                                <option value="date">Rating(Lowest)</option>
                                            </select>
                                        </div>
                                        <!-- product-short end -->
                                    </div>
                                    <!-- shop-top-bar end -->
                                </div>
                            </div>

                            <!-- shop-products-wrap start -->
                            <div class="shop-products-wrap">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="grid">
                                        <div class="shop-product-wrap">
                                            <div class="row">
                                            	@foreach ($products as $product)
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="{{route('product.details',$product->id) }}"><img src="{{asset('assets/images/product/'.$product->thumbnail)}}" alt="{{$product->name}}"></a>
                                                            <span class="label">30% Off</span>
                                                            <div class="product-action">
                                                                <a href="#"data-id="{{$product->id}}" class="add-to-cart"><i class="ion-bag"></i></a>
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
                                    <div class="tab-pane" id="list">
                                        <div class="shop-product-list-wrap">
                                        	@foreach ($products as $product)
                                            <div class="row product-layout-list">
                                                <div class="col-lg-4 col-md-5">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="product-details.html"><img src="{{asset('assets/images/product/'.$product->thumbnail)}}" alt="{{$product->name}}"></a>
                                                            <span class="label">30% Off</span>
                                                            <div class="product-action">
                                                                <a href="#" class="add-to-cart"><i class="ion-bag"></i></a>
                                                                <a href="#" class="wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                                <a href="#" class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"><i class="ion-ios-search"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                                <div class="col-lg-8 col-md-7">
                                                    <div class="product-content text-left">
                                                        <h3><a href="product-details.html">{{$product->name}}</a></h3>
                                                        <div class="price-box">
                                                            <span class="old-price">{{$product->old_price}}&nbsp; bdt</span>
                                                            <span class="new-price">{{$product->new_price}}&nbsp; bdt</span>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis pariatur ipsa sint consectetur velit maiores sit voluptates aut tempora totam, consequatur iste quod suscipit natus. Explicabo facere neque adipisci odio.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrap end -->

                            <!-- paginatoin-area start -->
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <ul class="pagination-box">
                                            <li><a class="Previous" href="#"><i class="ion-chevron-left"></i></a>
                                            </li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li>
                                                <a class="Next" href="#"><i class="ion-chevron-right"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area end -->
                        </div>
                        <!-- shop-product-wrapper end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->
@endsection
@section('page-level-javascript')
<script src="{{ asset('frontend/assets/custom/js/cart.js') }}" type="text/javascript"></script>
<script type="text/javascript">
   
</script>
@endsection