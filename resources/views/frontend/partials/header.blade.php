 <header class="fl-header">

            <!-- Header Top Start -->
            <div class="header-top-area d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header-top-inner">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3">
                                        <div class="social-top">
                                            <ul>
                                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                                <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
                                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-9">
                                        <div class="top-info-wrap text-right">
                                            <ul class="top-info">
                                                <li>Mon - Fri : 9am to 5pm </li>
                                                <li><a href="#">+88012345678</a></li>
                                                <li><a href="#">fultalashop@gmail.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Top End -->

            <!-- haeader bottom Start -->
            <div class="haeader-bottom-area header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-4 col-5">
                            <div class="logo-area">
                                <a href="{{route('home')}}"><img src="frontend/assets/images/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-8 d-none d-lg-block">
                            <div class="main-menu-area text-center">
                                <!--  Start Mainmenu Nav-->
                                <nav class="main-navigation">
                                    <ul>
                                        <li class="active"><a href="{{ route('home') }}">Home</a>
                                          {{--   <ul class="sub-menu">
                                                <li><a href="{{route('home')}}">Home Page One</a></li>
                                                <li><a href="index-2.html">Home Page Two</a></li>
                                                <li><a href="index-box.html">Home Boxed Layout 1</a></li>
                                                <li><a href="index-2-box.html">Home Boxed Layout 2</a></li>
                                            </ul> --}}
                                        </li>
                                        <li><a href="shop.html">Pages</a>
                                            <ul class="mega-menu">
                                                <li><a href="#">Column One</a>
                                                    <ul>
                                                        <li><a href="compare.html">Compare Page</a></li>
                                                        <li><a href="login-register.html">Login &amp; Register</a></li>
                                                        <li><a href="my-account.html">My Account Page</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog.html">Column two</a>
                                                    <ul>
                                                        <li><a href="product-details.html">Product Details 1</a></li>
                                                        <li><a href="product-details-2.html">Product Details 2</a></li>
                                                        <li><a href="checkout.html">Checkout Page</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Column Three</a>
                                                    <ul>
                                                        <li><a href="error404.html">Error 404</a></li>
                                                        <li><a href="cart.html">Cart Page</a></li>
                                                        <li><a href="wishlist.html">Wish List Page</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">shop</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html">Shop Left Sidebar</a></li>
                                                <li><a href="shop-right.html">Shop Right Sidebar</a></li>
                                                <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">Blog</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog.html">Blog Left Sidebar</a></li>
                                                <li><a href="blog-right.html">Blog Right Sidebar</a></li>
                                                <li><a href="blog-details.html">Blog Details Page</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">About</a></li>
                                        <li><a href="contact-us.html">Contact</a></li>
                                    </ul>
                                </nav>

                            </div>
                        </div>

                        <div class="col-lg-2 col-md-8 col-7">
                            <div class="right-blok-box d-flex">
                                <div class="search-wrap">
                                    <a href="#" class="trigger-search"><i class="ion-ios-search-strong"></i></a>
                                </div>

                                <div class="user-wrap">
                                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                                </div>


                                <div class="shopping-cart-wrap">
                                    <a href="#"><i class="ion-ios-cart-outline"></i> <span id="cart-total">{{$cart_details['number_of_items_in_cart']}}</span></a>
                                    <ul class="mini-cart">
                                        @if(!empty($cart_details['items']))
                                        @foreach ($cart_details['items'] as $item)
                                          <li class="cart-item">
                                            <div class="cart-image">
                                                <a href="product-details.html"><img alt="" src="{{asset('assets/images/product/'.$item['photo'])}}"></a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="product-details.html">
                                                    <h4>{{$item['name']}}</h4>
                                                </a>
                                                <span class="quantity">{{$item['quantity']}} ×</span>
                                                <div class="price-box"><span class="new-price">{{$item['price']}}</span></div>
                                                <a class="remove_from_cart" href="#"><i class="icon-trash icons"></i></a>
                                            </div>
                                        </li>
                                          @endforeach
                                           @endif
                                        <li class="subtotal-titles">
                                            <div class="subtotal-titles">
                                                <h3>Sub-Total :</h3><span id="sub-total">{{$cart_details['sub_total']}}</span>
                                            </div>
                                        </li>
                                       
                                        <li class="mini-cart-btns @if(empty($cart_details['items'])) d-none @endif " id="mini_cart_btn_div">
                                            <div class="cart-btns">
                                                <a href="{{ route('cart.view') }}">View cart</a>
                                                <a href="{{ route('checkout') }}">Checkout</a>
                                            </div>
                                        </li>
                                        
                                        <div class="text-center @if (!empty($cart_details['items'])) d-none @endif" id="empty_cart_div">
                                            <h1>No items in the cart</h1>
                                             <a href="shop.html" class="btn continue-btn">Continue Shopping</a>
                                         </div>
                                        
                                    </ul>
                                </div>

                                <div class="mobile-menu-btn d-block d-lg-none">
                                    <div class="off-canvas-btn">
                                        <i class="ion-android-menu"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- haeader bottom End -->

            <!-- main-search start -->
            <div class="main-search-active">
                <div class="sidebar-search-icon">
                    <button class="search-close"><span class="ion-android-close"></span></button>
                </div>
                <div class="sidebar-search-input">
                    <form>
                        <div class="form-search">
                            <input id="search" class="input-text" value="" placeholder="Search entire store here ..." type="search">
                            <button class="search-btn" type="button">
                                <i class="ion-ios-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- main-search start -->


            <!-- off-canvas menu start -->
            <aside class="off-canvas-wrapper">
                <div class="off-canvas-overlay"></div>
                <div class="off-canvas-inner-content">
                    <div class="btn-close-off-canvas">
                        <i class="ion-android-close"></i>
                    </div>

                    <div class="off-canvas-inner">

                        <!-- mobile menu start -->
                        <div class="mobile-navigation">

                            <!-- mobile menu navigation start -->
                            <nav>
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children"><a href="#">Home</a>
                                        <ul class="dropdown">
                                            <li><a href="{{route('home')}}">Home version 01</a></li>
                                            <li><a href="index-2.html">Home version 02</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">pages</a>
                                        <ul class="megamenu dropdown">
                                            <li class="mega-title has-children"><a href="#">Column One</a>
                                                <ul class="dropdown">
                                                    <li><a href="compare.html">Compare Page</a></li>
                                                    <li><a href="login-register.html">Login &amp; Register</a></li>
                                                    <li><a href="my-account.html">My Account Page</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-title has-children"><a href="#">Column two</a>
                                                <ul class="dropdown">
                                                    <li><a href="product-details.html">Product Details 1</a></li>
                                                    <li><a href="product-details-2.html">Product Details 2</a></li>
                                                    <li><a href="checkout.html">Checkout Page</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-title has-children"><a href="#">Column Three</a>
                                                <ul class="dropdown">
                                                    <li><a href="error404.html">Error 404</a></li>
                                                    <li><a href="cart.html">Cart Page</a></li>
                                                    <li><a href="wishlist.html">Wish List Page</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">shop</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.html">Shop Left Sidebar</a></li>
                                            <li><a href="shop-right.html">Shop Right Sidebar</a></li>
                                            <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="blog.html">Blog Left Sidebar</a></li>
                                            <li><a href="blog-right.html">Blog Right Sidebar</a></li>
                                            <li><a href="blog-details.html">Blog Details Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.html">About</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->



                        <!-- offcanvas widget area start -->
                        <div class="offcanvas-widget-area">
                            <div class="off-canvas-contact-widget">
                                <ul>
                                    <li>
                                        Mon - Fri : 9am to 5pm
                                    </li>
                                    <li>
                                        <a href="#">0123456789</a>
                                    </li>
                                    <li>
                                        <a href="#">nhlimon.com</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="off-canvas-social-widget">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                                <a href="#"><i class="ion-social-tumblr"></i></a>
                                <a href="#"><i class="ion-social-googleplus"></i></a>
                            </div>

                        </div>
                        <!-- offcanvas widget area end -->
                    </div>
                </div>
            </aside>
            <!-- off-canvas menu end -->


        </header>