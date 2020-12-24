@extends('frontend.layouts.master')
 @section('content')
  <!-- breadcrumb-area start -->
        <div class="breadcrumb-area section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="breadcrumb-title">My account</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">My account</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb my-account-page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="account-dashboard">
                            <div class="dashboard-upper-info">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-lg-3 col-md-12">
                                        <div class="d-single-info">
                                            <p class="user-name">Hello <span>Yourmail@info</span></p>
                                            <p>(not yourmail@info? <a href="#">Log Out</a>)</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="d-single-info">
                                            <p>Need Assistance? Customer service at.</p>
                                            <p>admin@devitems.com.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="d-single-info">
                                            <p>E-mail them at </p>
                                            <p>support@yoursite.com</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
                                        <div class="d-single-info text-lg-center">
                                            <a href="{{ route('cart.view') }}" class="view-cart"><i class="fa fa-cart-plus"></i>view cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-2">
                                    <!-- Nav tabs -->
                                    <ul role="tablist" class="nav flex-column dashboard-list">
                                        <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                                        <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                        <li><a href="#downloads" data-toggle="tab" class="nav-link">Downloads</a></li>
                                        <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li>
                                        <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                                        <li><a href="login-register.html" class="nav-link">logout</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-12 col-lg-10">
                                    <!-- Tab panes -->
                                    <div class="tab-content dashboard-content">
                                        <div class="tab-pane active" id="dashboard">
                                            <h3>Dashboard </h3>
                                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                        </div>
                                        <div class="tab-pane fade" id="orders">
                                            <h3>Orders</h3>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>May 10, 2018</td>
                                                            <td>Processing</td>
                                                            <td>$25.00 for 1 item </td>
                                                            <td><a href="cart.html" class="view">view</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>May 10, 2018</td>
                                                            <td>Processing</td>
                                                            <td>$17.00 for 1 item </td>
                                                            <td><a href="cart.html" class="view">view</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="downloads">
                                            <h3>Downloads</h3>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Downloads</th>
                                                            <th>Expires</th>
                                                            <th>Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Haven - Free Real Estate PSD Template</td>
                                                            <td>May 10, 2018</td>
                                                            <td>never</td>
                                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nevara - ecommerce html template</td>
                                                            <td>Sep 11, 2018</td>
                                                            <td>never</td>
                                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="address">
                                            <p>The following addresses will be used on the checkout page by default.</p>
                                            <h4 class="billing-address">Billing address</h4>
                                            <a href="#" class="view">edit</a>
                                            <p class="biller-name">Johan Don</p>
                                            <p>Bangladesh</p>
                                        </div>
                                        <div class="tab-pane fade" id="account-details">
                                            <h3>Account details </h3>
                                            <div class="login">
                                                <div class="login-form-container">
                                                    <div class="account-login-form">
                                                        <form action="#">
                                                            <p>Already have an account? <a href="#">Log in instead!</a></p>
                                                            <label>Social title</label>
                                                            <div class="input-radio">
                                                                <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                                <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                                            </div>
                                                            <div class="account-input-box">
                                                                <label>First Name</label>
                                                                <input type="text" name="first-name">
                                                                <label>Last Name</label>
                                                                <input type="text" name="last-name">
                                                                <label>Email</label>
                                                                <input type="text" name="email-name">
                                                                <label>Password</label>
                                                                <input type="password" name="user-password">
                                                                <label>Birthdate</label>
                                                                <input type="text" placeholder="MM/DD/YYYY" value="" name="birthday">
                                                            </div>
                                                            <div class="example">
                                                                (E.g.: 05/31/1970)
                                                            </div>
                                                            <div class="custom-checkbox">
                                                                <input type="checkbox" value="1" name="optin">
                                                                <label>Receive offers from our partners</label>
                                                            </div>
                                                            <div class="custom-checkbox">
                                                                <input type="checkbox" value="1" name="newsletter">
                                                                <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                                            </div>
                                                            <div class="button-box">
                                                                <button class="btn default-btn" type="submit">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->
 @endsection
 @section('page-level-javascript')
 @endsection