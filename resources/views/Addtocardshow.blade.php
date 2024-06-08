<?php

use App\Http\Controllers\HomeController;
use App\Register;
use App\Models\Addproduct;
use App\Models\card;
use App\Models\wishlist;

$wishlistcount = 0;
$total = 0;
if (Session::has('userId')) {
    $user = Register::where('id', '=', Session::get('userId'))->first();
    $user_id = $user->id;
    $user_name = $user->name;
    $total = card::where('user_id', '=', $user_id)->count();
    $wishlistcount = wishlist::where('user_id', '=', $user_id)->count();
    // // $total=HomeController::cardItem();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Shop | Home</title>

    <!-- Font awesome -->
    <link href="{{url('css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{url('css/bootstrap.css')}}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{url('css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.simpleLens.css')}}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{url('css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{url('css/nouislider.css')}}">
    <!-- Theme color -->
    <link id="switcher" href="{{url('css/theme-color/default-theme.css')}}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{url('css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <link href="{{url('css/myStyle.css')}}" rel="stylesheet">

    <!-- Google Font -->

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    <style>
        #plusIcon {
            margin-top: 16px;
            display: inline;
            float: right;
            margin-right: -93px;
        }

        #buyItem {
            margin-top: 16px;
            margin-left: 46px;
        }

        #button-addon2 {
            margin-top: -61px;
        }

        aside {
            width: 350px;
            height: 367px;
        }

        #card-img {
            height: 93%;
            width: 93%;
            border-radius: .5rem;
            transition: .3s ease;
            margin: 15px;
        }

        .text-rate {
            line-height: normal;
            display: inline-block;
            color: #fff;
            padding: 2px 4px 2px 6px;
            border-radius: 3px;
            font-weight: 500;
            font-size: 14px;
            vertical-align: middle;
            background-color: #388e3c
        }

        /* #card-img {
            width: 300px;
            overflow: hidden;
        }

        #card-img img {
            width: 290px;
            transition: all .3s ease-in-out;
        }

        #card-img img:hover {
            transform: scale(1.1);
        } */
    </style>
</head>

<body>



    <!-- wpf loader Two -->

    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


    <!-- Start header section -->
    <header id="aa-header">
        <!-- start header top  -->
        <div class="aa-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-top-area">
                            <!-- start header top left -->
                            <div class="aa-header-top-left">
                                <!-- start language -->
                                <div class="aa-language">
                                </div>
                                <!-- start cellphone -->
                                <div class="cellphone hidden-xs">

                                </div>
                                <!-- / cellphone -->
                            </div>
                            <!-- / header top left -->
                            <div class="aa-header-top-right">
                                <ul class="aa-head-top-nav-right">
                                    <li class="hidden-xs"><a href="/wishlist">Wishlist <span class="badge badge-pill bg-primary">{{$wishlistcount}}</span></a></li>
                                    <li><a href="/register">My Account</a></li>
                                    <li class="hidden-xs"><a href="/myorder">My order</a></li>
                                    <!-- <li class="hidden-xs"><a href="cart.html">My Cart</a></li>
                                    <li class="hidden-xs"><a href="checkout.html">Checkout</a></li> -->
                                    <li class="dropdown">
                                        @if(Session::has('userId'))
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$user_name}}
                                            <!-- <span class="caret"></span> -->
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/logout">Logout</a></li>
                                        </ul>
                                    </li>
                                    @else
                                    <li><a href="/login">Login</a></li>
                                    @endif
                                    <!-- <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header top  -->

        <!-- start header bottom  -->
        <div class="aa-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-bottom-area">
                            <!-- logo  -->
                            <div class="aa-logo">
                                <!-- Text based logo -->
                                <a href="/">
                                    <span class="fa fa-shopping-cart"></span>
                                    <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                                </a>
                                <!-- img based logo -->
                                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                            </div>
                            <!-- / logo  -->
                            <!-- cart box -->
                            <div class="aa-cartbox">
                                <a class="aa-cart-link" href="/cardlist">
                                    <span class="fa fa-shopping-basket"></span>
                                    <span class="aa-cart-title">SHOPPING CART</span>
                                    <span class="aa-cart-notify">{{$total}}</span>
                                </a>

                            </div>
                            <!-- / cart box -->
                            <!-- search box -->
                            <div class="aa-search-box">
                                <form action="">
                                    <!-- <input type="text" name="" id="" placeholder="Search here ex. 'Electronics' ">
                                    <button type="submit"><span class="fa fa-search"></span></button> -->
                                </form>
                            </div>
                            <!-- / search box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header bottom  -->
    </header>
    <!-- / header section -->
    <!-- menu -->



    <!-- content -->
    <section class="py">
        <div class="container">

            <div class="row gx-5" style="margin-top: 200px;">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center" id="card-img">
                        <img style="max-width: 75%; max-height: 90%;" class="img_show" src="{{ asset('Addproduct/' . $data->profile) }}" />
                    </div>
                </aside>
                <main class="col-lg-6">
                    <?php
                    if ($data->rating_count != 0)
                        $rating_count = $data->rating / $data->rating_count;

                    else
                        $rating_count = 0;

                    ?>
                     @if($data->rating_count != Null)
                          <span class="text-rate">{{ number_format( $rating_count, 1, '.', ',') }}<i class="fa fa-star" aria-hidden="true"></i></span>
                            @else
                            <!-- <span class="text-ratess"><i class="fa fa-star-o" aria-hidden="true"></i></span> -->
                          @endif

                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{ $data->name }}
                        </h4>
                        <!-- <div class="d-flex flex-row my-3">
                        <div class="text-warning mb-1 me-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="ms-1">
                                4.5
                            </span>
                        </div>
                        <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                        <span class="text-success ms-2">In stock</span>
                    </div> -->

                        <div class="mb-3">

                        </div><span class="h5">₹{{ $data->price }}</span>
                        <span class="text-muted">/Per Item</span>

                        <p>
                            {{ $data->description }}
                        </p>
                        <hr />

                        <div class="row mb-4">

                            <div class="col-md-4 col-6 mb-3">
                                <label class="mb-2 d-block">Quantity</label>
                                <div class="input-group mb-3" style="width: 170px;">
                                    <form action="/addtocard" method="post">
                                        @csrf
                                        <div id="plusIcon">
                                            <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </div>

                                        <div>
                                            <input type="text" name="quantity" class="form-control text-center border border-secondary" value="1" aria-label="Example text with button addon" aria-describedby="button-addon1" id="buyItem" readonly />
                                        </div>
                                        <div id="minusIcon">
                                            <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="product_id" id="product_id" value="{{$data->id}}">
                    <a href="#" id="wishlist"><i class="fa fa-heart-o" id="wishIcon" data-productId="{{ $data->id}}" aria-hidden="true" style="font-size: 23px; margin-right: 10px;"></i></a>
                    <button type="submit" class="btn btn-warning shadow-0" value="submit" name="submit">Add to Card</button>
                    <button type="submit" class="btn btn-warning shadow-0">Buy Now</button>

                    </form>

                    <!-- <a href="/checkout" class="btn btn-warning shadow-0"> Buy now </a> -->
            </div>
            </main>

        </div>

        </div>
    </section>
    <!-- content -->

    <footer id="aa-footer">
        <!-- footer bottom -->
        <div class="aa-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-top-area">
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <h3>Main Menu</h3>
                                        <ul class="aa-footer-nav">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Our Services</a></li>
                                            <li><a href="#">Our Products</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Knowledge Base</h3>
                                            <ul class="aa-footer-nav">
                                                <li><a href="#">Delivery</a></li>
                                                <li><a href="#">Returns</a></li>
                                                <li><a href="#">Services</a></li>
                                                <li><a href="#">Discount</a></li>
                                                <li><a href="#">Special Offer</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Useful Links</h3>
                                            <ul class="aa-footer-nav">
                                                <li><a href="#">Site Map</a></li>
                                                <li><a href="#">Search</a></li>
                                                <li><a href="#">Advanced Search</a></li>
                                                <li><a href="#">Suppliers</a></li>
                                                <li><a href="#">FAQ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Contact Us</h3>
                                            <address>
                                                <p> 25 Astor Pl, NY 10003, USA</p>
                                                <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                                                <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                                            </address>
                                            <div class="aa-footer-social">
                                                <a href="#"><span class="fa fa-facebook"></span></a>
                                                <a href="#"><span class="fa fa-twitter"></span></a>
                                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                                <a href="#"><span class="fa fa-youtube"></span></a>
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
        <!-- footer-bottom -->
        <div class="aa-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-bottom-area">
                            <p>Designed by <a href="#">Abhay</a></p>
                            <div class="aa-footer-payment">
                                <span class="fa fa-cc-mastercard"></span>
                                <span class="fa fa-cc-visa"></span>
                                <span class="fa fa-paypal"></span>
                                <span class="fa fa-cc-discover"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- / footer -->

    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Login</h4>
                    <form class="aa-login-form" id="loginForm">
                        @csrf
                        <label for="">Email address<span>*</span></label>
                        <input type="text" placeholder="Email" name="email" id="email">
                        <span class="errorEmail">Email-Id Not Matched</span>
                        <label for="">Password<span>*</span></label>
                        <input type="password" placeholder="Password" name="password" id="password">
                        <span class="errorPass">Password Not Matched</span>
                        <button class="aa-browse-btn" type="submit">Login</button>

                        <div class="aa-register-now">
                            Don't have an account?<a href="/register">Register now!</a>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- jQuery library -->
</body>

@if($WishlistProduct == "1")
<script>
    document.getElementById("wishIcon").classList.remove("fa-heart-o");
    document.getElementById("wishIcon").classList.add("fa-heart");
</script>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{url('assests/addcard.js')}}"></script>
