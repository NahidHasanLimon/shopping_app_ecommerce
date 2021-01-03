 @extends('frontend.layouts.master')
 @section('content')
 <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb checkout-page">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="coupon-area">
                            <!-- coupon-accordion start -->
                            {{-- <div class="coupon-accordion">
                                <h3>Returning customer? <span class="coupon" id="showlogin">Click here to login</span></h3>
                                <div class="coupon-content" id="checkout-login">
                                    <div class="coupon-info">
                                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                        <form action="#">
                                            <p class="coupon-input form-row-first">
                                                <label>Username or email <span class="required">*</span></label>
                                                <input type="text" name="email">
                                            </p>
                                            <p class="coupon-input form-row-last">
                                                <label>password <span class="required">*</span></label>
                                                <input type="password" name="password">
                                            </p>
                                            <div class="clear"></div>
                                            <p>
                                                <button type="submit" class="button-login btn" name="login" value="Login">Login</button>
                                                <label class="remember"><input type="checkbox" value="1"><span>Remember</span></label>
                                            </p>
                                            <p class="lost-password">
                                                <a href="#">Lost your password?</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- coupon-accordion end -->
                            <!-- coupon-accordion start -->
                            <div class="coupon-accordion">
                                @if(empty(Cart::details()['coupon_code']))
                                <h3>Have a coupon? <span class="coupon" id="showcoupon">Click here to enter your code</span></h3>
                                <div class="coupon-content" id="checkout-coupon">
                                    <div class="coupon-info">
                                        <form method = "POST" action="{{route('coupon.apply')}}">
                                            @csrf
                                            <p class="checkout-coupon">
                                                <input type="text" name="coupon_code" placeholder="Coupon code">
                                                <button type="submit" class="btn button-apply-coupon" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                @else
                                {{-- <input id="remove_coupon_code" class="input-text" name="remove_coupon_code" value="{{Cart::details()['coupon_code']}}" placeholder="Coupon code" type="text" disabled="">
                                            <input class="button btn-danger" name="remove_coupon" value="Remove coupon" type="submit"> --}}
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
                            <!-- coupon-accordion end -->
                        </div>
                    </div>
                </div>
                <!-- checkout-details-wrapper start -->
                <div class="checkout-details-wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- billing-details-wrap start -->
                            <div class="billing-details-wrap">
                                @if (Auth::check())
                                <form action="#">
                                    <h3 class="shoping-checkboxt-title">Billing Details</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>First name <span class="required">*</span></label>
                                                <input type="text" name="name" value="{{Auth::user()->name}}" disabled="">
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>email <span class="required">*</span></label>
                                                <input type="text" name="email" value="{{Auth::user()->email}}" disabled="">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Company name</label>
                                                <input type="text" name="email">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Street address <span class="required">*</span></label>
                                                <input type="text" placeholder="House number and street name" name="street_address">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <input type="text" placeholder="Apartment, suite, unit etc. (optional)" name="address">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Town / City <span class="required">*</span></label>
                                                <input type="text" name="address">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Postcode / ZIP <span class="required">*</span></label>
                                                <input type="text" name="address">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Phone</label>
                                                <input type="text" name="address">
                                            </p>
                                        </div>
                                        {{-- <div class="col-lg-12">
                                            <div class="checkout-box-wrap">
                                                <label><input type="checkbox" id="chekout-box"> Create an account?</label>
                                                <div class="account-create single-form-row">
                                                    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                                    <label class="creat-pass">Create account password <span>*</span></label>
                                                    <input type="password" class="input-text">
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-12">
                                            <div class="checkout-box-wrap">
                                                <label id="chekout-box-2"><input type="checkbox"> Ship to a different address?</label>
                                                <div class="ship-box-info">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <p class="single-form-row">
                                                                <label>First name <span class="required">*</span></label>
                                                                <input type="text" name="First name">
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <p class="single-form-row">
                                                                <label>Username or email <span class="required">*</span></label>
                                                                <input type="text" name="Last name ">
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <p class="single-form-row">
                                                                <label>Company name</label>
                                                                <input type="text" name="email">
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <p class="single-form-row">
                                                                <label>Street address <span class="required">*</span></label>
                                                                <input type="text" placeholder="House number and street name" name="address">
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <p class="single-form-row">
                                                                <input type="text" placeholder="Apartment, suite, unit etc. (optional)" name="address">
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <p class="single-form-row">
                                                                <label>Town / City <span class="required">*</span></label>
                                                                <input type="text" name="address">
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <p class="single-form-row">
                                                                <label>Postcode / ZIP <span class="required">*</span></label>
                                                                <input type="text" name="address">
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row m-0">
                                                <label>Order notes</label>
                                                <textarea placeholder="Notes about your order, e.g. special notes for delivery." class="checkout-mess" rows="2" cols="5"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                            <!-- billing-details-wrap end -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- your-order-wrapper start -->
                            <div class="your-order-wrapper">
                                <h3 class="shoping-checkboxt-title">Your Order</h3>
                                <!-- your-order-wrap start-->
                                @if (!empty(Cart::details()['items']))
                                <div class="your-order-wrap">
                                    <!-- your-order-table start -->
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    @foreach (Cart::details()['items'] as $key=>$item)
                                                 <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{$item['item']['name']}} <strong class="product-quantity"> × {{$item['quantity']}}</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{$item['item_total']}}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal</th>
                                                    <td><span class="amount">{{Cart::details()['sub_total']}}</span></td>
                                                </tr>
                                                @endif
                                                 @if (!empty(Cart::details()['coupon_code']))
                                                 <tr class="order-total">
                                                    <th>Coupon- <b>{{Cart::details()['coupon_code']}}</b></th>
                                                    <td><strong><span class="amount">{{Cart::details()['coupon_value']}}</span></strong>
                                                    </td>
                                                </tr>
                                                 
                                                <tr class="shipping">
                                                    <th>Shipping</th>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <input type="radio">
                                                                <label>
                                                                    Flat Rate: <span class="amount">£7.00</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <input type="radio">
                                                                <label>Free Shipping:</label>
                                                            </li>
                                                            <li></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="amount">{{Cart::details()['total']}}</span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- your-order-table end -->

                                    <!-- your-order-wrap end -->
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                            <!-- ACCORDION START -->
                                            <h5>Cash on delivery</h5>
                                            <div class="payment-content">
                                                <p>Cash on Delivery is a type of payment method where the recipient (the customer) make payment for the order at the time of delivery rather than in advance.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                        </div>
                                        <div class="order-button-payment">
                                            <input type="submit" value="Place order" />
                                        </div>
                                    </div>
                                    <!-- your-order-wrapper start -->
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- checkout-details-wrapper end -->
            </div>
        </div>
        <!-- main-content-wrap end -->
        @endsection

@section('page-level-javascript')
@endsection