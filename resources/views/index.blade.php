<style>
  /* .ripple {
    width: 100%;
    height: 15vw;
    object-fit: cover;
  } */

  /* .card img {
    height: 300px;
    width: 88%;
  } */

  .card {
    width: 320px;
    height: 367px;
    padding: .8em;
    background: #f5f5f5;
    position: relative;
    overflow: visible;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    margin-bottom: 35px;
  }

  .card-img {
    background-color: #ffcaa6;
    height: 191px;
    width: 100%;
    border-radius: .5rem;
    transition: .3s ease;
  }

  .card-info {
    padding-top: 10%;
  }

  svg {
    width: 27px;
    height: 16px;
    margin-top: 5px;
  }

  .card-footer {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 10px;
    border-top: 1px solid #ddd;
  }

  /*Text*/
  .text-title {
    /* font-weight: 900; */
    font-size: 1.2em;
    line-height: 1.5;
    margin-bottom: 2px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 30rem
  }
  .text-titless{
    font-size: 1.2em;
    line-height: 1.5;
    margin-bottom: 2px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 30rem
  }

  .text-price{
    font-size: 1.2em;
    line-height: 1.5;
    margin-bottom: 2px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 30rem;
    padding-right:55px;
  }
  .text-body {
    font-size: .9em;
    padding-bottom: 10px;
  }

  /*Button*/
  .card-button {
    border: 1px solid #252525;
    display: flex;
    padding: .3em;
    cursor: pointer;
    border-radius: 50px;
    transition: .3s ease-in-out;
  }

  /*Hover*/

  .card-button:hover {
    border: 1px solid #ffcaa6;
    background-color: #ffcaa6;
  }

  .main-info-area .right-section .wrap-icon-section {
    display: inline-block;
    width: 50%;

  }

  header.fill-color .right-section .wrap-icon-section .title {
    color: #ffffff;
  }

  header.fill-color .main-info-area .right-section .wrap-icon-section .title {
    color: #ffffff;
  }

  .main-info-area .right-section .wrap-icon-section .title {
    font-size: 12px;
    color: #333333;
    text-transform: uppercase;
    font-weight: 600;
    display: block;
  }

  header.fill-color .main-info-area .right-section .wrap-icon-section .index {
    color: #ffffff;
    background: #414141;
  }

  header.fill-color .main-info-area .right-section .wrap-icon-section.minicart .index {
    background-color: #ff0000;
  }

  .main-info-area .right-section .wrap-icon-section .index {
    color: #fff;
    font-size: 12px;
    line-height: 12px;
    display: block;
    background: #888;
    padding: 1.5px 7px;
    border-radius: 2px;
  }

  header.fill-color .main-info-area .right-section .wrap-icon-section .link-direction>i {
    color: #ffffff;
  }

  .main-info-area .right-section .wrap-icon-section .link-direction>i {
    display: block;
    float: left;
    font-size: 25px;
    color: #aaa;
    margin: 7px 8px 0 0;
  }

  .main-info-area .right-section .wrap-icon-section .left-info {
    display: block;
    float: left;
  }

#rating{
  margin-left: -220px;
}


  /* Quick-zoom Container */
</style>
@extends('layout.main')
@section('content')
<!-- / menu -->
<!-- Start slider -->
@if(Session::has('success'))
<!-- <div class="alert-success">{{Session::get('success')}}</div> -->
<script>
  toastr.options.timeOut = 1000; // 1.5s
  toastr.success('Sighup successfully');
  $('#loginbtn').click(function() {
    toastr.success('Click Button');
  });
</script>
@endif
@if(Session::has('logout'))
<!-- <div class="alert-success">{{Session::get('success')}}</div> -->
<script>
  toastr.options.timeOut = 1000; // 1.5s
  toastr.error('Logout successfully');
  $('#loginbtn').click(function() {
    toastr.success('Click Button');
  });
</script>
@endif
<section id="aa-slider">
  <div class="aa-slider-area">
    <div id="sequence" class="seq">
      <div class="seq-screen">
        <ul class="seq-canvas">
          <!-- single slide item -->
          <li>
            <div class="seq-model">
              <img src="{{url('/images/7eisa4RXqzmdvHg7XIAnTDjyJihxfCwQFWt9aKY7.png')}}" class="col-12 no-padding banner-icon" alt="Image" />
              <img src=" 'public/assests/images/'.7eisa4RXqzmdvHg7XIAnTDjyJihxfCwQFWt9aKY7" class="col-12 no-padding banner-icon">
              <img src="{{url('images/7eisa4RXqzmdvHg7XIAnTDjyJihxfCwQFWt9aKY7.png')}}">
              <!-- <img src="https://demo.bagisto.com/bagisto-45-64-8-42/storage/slider_images/Default/VydE5vCqcrsR8v8edbNFSQ0DPKRNsio2kYeHjj9T.png" class="col-12 no-padding banner-icon"> -->
            </div>
            <div class="seq-title">
              <span data-seq>Save Up to 75% Off</span>
              <h2 data-seq>Men Collection</h2>
              <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
              <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
            </div>
          </li>
          <!-- single slide item -->
          <li>
            <div class="seq-model">
              <img src="{{url('/images/12QvXhCzqdPC9MyNJQPOAhNU4F8yFfhReGIAUIue.png')}}" class="col-12 no-padding banner-icon" alt="Image" />
              <img src="https://demo.bagisto.com/bagisto-45-64-8-42/storage/slider_images/Default/7eisa4RXqzmdvHg7XIAnTDjyJihxfCwQFWt9aKY7.png" class="col-12 no-padding banner-icon">
            </div>
            <div class="seq-title">
              <span data-seq>Save Up to 40% Off</span>
              <h2 data-seq>Wristwatch Collection</h2>
              <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
              <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
            </div>
          </li>
          <!-- single slide item -->
          <li>
            <div class="seq-model">
              <img src="{{url('/images/v1JxeHUZdlT6sZvqaxBY6xtnAoOr8jXN5iEOPq38.png')}}" class="col-12 no-padding banner-icon" alt="Image" />
              <img src="https://demo.bagisto.com/bagisto-45-64-8-42/storage/slider_images/Default/VydE5vCqcrsR8v8edbNFSQ0DPKRNsio2kYeHjj9T.png" class="col-12 no-padding banner-icon">
            </div>
            <div class="seq-title">
              <span data-seq>Save Up to 75% Off</span>
              <h2 data-seq>Sports Collection</h2>
              <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
              <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
            </div>
          </li>

        </ul>
      </div>
      <!-- slider navigation btn -->
      <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
        <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
        <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
      </fieldset>
    </div>
  </div>
</section>
<!-- / slider -->

<section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">
              <!-- start prduct navigation -->
              <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#all" data-toggle="tab">All Product</a></li>
                <!-- <li class="active"><a href="#men">Men</a></li> -->
                @foreach($category as $categoryss)
                <li><a href="#men" onclick="get_cate('{{$categoryss->id , $categoryss->category_name}}')" data-toggle="tab">{{$categoryss->category_name}}</a></li>
                @endforeach
                <!-- <li><a href="#men" data-toggle="tab">men</a></li>
                <li><a href="#women" data-toggle="tab">Women</a></li>
                <li><a href="#sports" data-toggle="tab">Sports</a></li>
                <li><a href="#electronics" data-toggle="tab">Electronics</a></li> -->
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="all">
                  <section>
                    <div class="row">
                      @foreach ($data as $value)

                      <div class="col-lg-4 col-md-12 mb-6">
                        <div class="card">
                          <div class="card-img">
                            <a href="/Addtocardview/{{$value->id}}">
                              <img src="{{ '/Addproduct/'.$value->profile}}" class="card-img" />
                            </a>
                          </div>
                          <div class="card-info">
                            <p class="text-title">{{ $value->name }}</p>
                         
                          </div>
                          <div class="card-footer">
                            <span class="text-title">₹{{ $value->price }}</span>
                            <div class="card-button">
                              <a href="{{url('/addtocart/'.$value->id)}}">
                                <a href="/Addtocardview/{{$value->id}}"><button type="submit" class="btn btn-add-to-cart small-padding"><i class="fa-solid fa-cart-shopping"></i> <span class="fs14 fw6 text-uppercase text-up-4">Add To Cart</span></button></a>
                                <!-- <svg class="svg-icon" viewBox="0 0 20 20">
                <path d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z"></path>
                <path d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z"></path>
                <path d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z"></path>
              </svg> -->

                              </a>
                            </div>
                          </div>
                          <?php
                          if ($value->rating_count != 0)
                          $rating_count = $value->rating / $value->rating_count;
                     
                      else
                          $rating_count = 0;
                         
                      ?>
                      @if($value->rating_count != Null)
                          <span class="text-rate">{{ number_format( $rating_count, 1, '.', ',') }}<i class="fa fa-star" aria-hidden="true"></i></span>
                            @else
                            <span class="text-ratess"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                          @endif
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </section>
                </div>
                <!-- Start men product category -->
                @foreach($category as $categoryss)
                <div class="tab-pane fade in" id="men">
                  @endforeach
                  <section>
                    <div class="row" id="rowdata">
                      
                    </div>
                  </section>
                </div>
      

                <!-- / men product category -->
                <!-- start women product category -->
               
                                <!-- Start Electronic product category -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
</section>
@endsection
<!-- / popular section -->


<!-- footer -->