<?php

use App\Http\Controllers\HomeController;
use App\Register;
use App\Models\Addproduct;
use App\Models\card;
use App\Models\wishlist;

$total = 0;
$amount_get=0;
$wishlistcount = 0;
if (Session::has('userId')) {
  $user = Register::where('id', '=', Session::get('userId'))->first();
  $user_id = $user->id;
  $amount_get = $user->wallet_amount;
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Daily Shop | Home</title>

  <!-- Font awesome -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  <!-- Google Font -->
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
@include('layout.popup')
  <!-- wpf loader Two -->
  <div id="wpf-loader-two">
    <div class="wpf-loader-two-inner">
      <span>Loading</span>
    </div>
  </div>
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
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="img/flag/english.jpg" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="img/flag/french.jpg" alt="">HINDI</a></li>
                      <li><a href="#"><img src="img/flag/english.jpg" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>00-62-658-658</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li class="hidden-xs"><a href="/wishlist">Wishlist <span class="badge badge-pill bg-primary">{{$wishlistcount}}</span></a></li>
                  <li><a href="/register">My Account</a></li>
                  <!-- <li class="hidden-xs"><a href="wishlist.html">Wishlist</a></li> -->
                  <li class="hidden-xs"><a href="/myorder">My order</a></li>
                  <!-- <li class="hidden-xs"><a href="checkout.html">Checkout</a></li> -->
                   
                  <li class="dropdown">
                    @if(Session::has('userId'))
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">{{$user_name}}
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="/logout">Logout</a></li>
                      <a href="/changepassword">Change Password</a>
                      <a href="#" data-toggle="modal" data-target="#myModal2" onclick="wellet_get('{{$user_id}}')">Add Wallet payment</a>
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
    <!-- Modal -->


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



                <!-- <div class="aa-cartbox-summary">
                  <ul>
                    <li> -->
                <!-- <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a> -->
                <!-- <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div> -->
                <!-- <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a> -->
                <!-- </li>
                    <li> -->
                <!-- <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg" alt="img"></a> -->
                <!-- <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div> -->
                <!-- <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a> -->
                <!-- </li>                    
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        $500
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>
                </div>
              </div> -->
                <!-- / cart box -->
                <!-- search box -->

                <div class="aa-search-box">
                  <form action="/search" method="post" autocomplete="off">
                    @csrf
                    <input type="text"  id="" name="searchval" placeholder="Search here ex. 'man' ">
                    <button type="submit" name="submit"><span class="fa fa-search"></span></button>
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
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="">
            <!-- Left nav -->
            <!-- <ul class="nav navbar-nav">
              <li><a href="index.html">Home</a></li>
              <li><a href="#">Men <span class="caret"></span></a>
              
              </li>
              <li><a href="#">Women <span class="caret"></span></a>
              
              </li>
              <li><a href="#">Kids <span class="caret"></span></a>
               
              </li>
              <li><a href="#">Sports</a></li>
             <li><a href="#">Digital <span class="caret"></span></a>
                
              </li>
              <li><a href="#">Furniture</a></li>            
              
            </ul> -->
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  </section>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{url('assests/addcard.js')}}"></script>
  <script>
    function logout() {

      toastr.options.timeOut = 15000; // 1.5s
      toastr.error('Logout successfully');
      $('#loginbtn').click(function() {
        toastr.success('Click Button');
      });
    }
  </script>