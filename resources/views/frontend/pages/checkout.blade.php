 @extends('frontend.layouts.master')
 @section('content')
 <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb checkout-page">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="coupon-area">
                            <!-- coupon-accordion start -->
                            <div class="coupon-accordion">
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
                            </div>
                            <!-- coupon-accordion end -->
                            <!-- coupon-accordion start -->
                            <div class="coupon-accordion">
                                <h3>Have a coupon? <span class="coupon" id="showcoupon">Click here to enter your code</span></h3>
                                <div class="coupon-content" id="checkout-coupon">
                                    <div class="coupon-info">
                                        <form action="#">
                                            <p class="checkout-coupon">
                                                <input type="text" placeholder="Coupon code">
                                                <button type="submit" class="btn button-apply-coupon" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
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
                                <form action="#">
                                    <h3 class="shoping-checkboxt-title">Billing Details</h3>
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
                                                <input type="text" name="Last name">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Company name</label>
                                                <input type="text" name="email">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single-form-row">
                                                <label>Country <span class="required">*</span></label>
                                                <div class="nice-select wide">
                                                    <select>
                                                        <option>Select Country...</option>
                                                        <option>Albania</option>
                                                        <option>Angola</option>
                                                        <option>Argentina</option>
                                                        <option>Austria</option>
                                                        <option>Azerbaijan</option>
                                                        <option>Bangladesh</option>
                                                    </select>
                                                </div>
                                            </div>
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
                                                <label>State / County</label>
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
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Email address <span class="required">*</span></label>
                                                <input type="text" name="Email address ">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="checkout-box-wrap">
                                                <label><input type="checkbox" id="chekout-box"> Create an account?</label>
                                                <div class="account-create single-form-row">
                                                    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                                    <label class="creat-pass">Create account password <span>*</span></label>
                                                    <input type="password" class="input-text">
                                                </div>
                                            </div>
                                        </div>
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
                                                            <div class="single-form-row">
                                                                <label>Country <span class="required">*</span></label>
                                                                <div class="nice-select wide">
                                                                    <select>
                                                                        <option>Select Country...</option>
                                                                        <option>Albania</option>
                                                                        <option>Angola</option>
                                                                        <option>Argentina</option>
                                                                        <option>Austria</option>
                                                                        <option>Azerbaijan</option>
                                                                        <option>Bangladesh</option>
                                                                    </select>
                                                                </div>
                                                            </div>
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
                                                                <label>State / County</label>
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
                            </div>
                            <!-- billing-details-wrap end -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- your-order-wrapper start -->
                            <div class="your-order-wrapper">
                                <h3 class="shoping-checkboxt-title">Your Order</h3>
                                <!-- your-order-wrap start-->
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
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Vestibulum suscipit <strong class="product-quantity"> × 1</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">£165.00</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Vestibulum magna <strong class="product-quantity"> × 1</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">£50.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal</th>
                                                    <td><span class="amount">£215.00</span></td>
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
                                                    <td><strong><span class="amount">£215.00</span></strong>
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
                                            <h5>Direct Bank Transfer</h5>
                                            <div class="payment-content">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                            <!-- ACCORDION START -->
                                            <h5>Cheque Payment</h5>
                                            <div class="payment-content">
                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                            <!-- ACCORDION START -->
                                            <h5>PayPal</h5>
                                            <div class="payment-content">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                        </div>
                                        <div class="order-button-payment">
                                            <input type="submit" value="Place order" />
                                        </div>
                                    </div>
                                    <!-- your-order-wrapper start -->

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