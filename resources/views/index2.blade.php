@extends('layout.main')
@section('container')
<!-- / menu -->
<!-- Start slider -->
<section id="aa-slider">
    <div class="aa-slider-area">
        <div id="sequence" class="seq">
            <div class="seq-screen">
                <ul class="seq-canvas">
                    <!-- single slide item -->
                    <li>
                        <div class="seq-model">
                            <!-- <img data-seq src="img/slider/cloth.png" alt="Men slide img" /> -->
                            <img src="https://demo.bagisto.com/bagisto-45-64-8-42/storage/slider_images/Default/v1JxeHUZdlT6sZvqaxBY6xtnAoOr8jXN5iEOPq38.png" class="col-12 no-padding banner-icon">
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
                        <img src="https://demo.bagisto.com/bagisto-45-64-8-42/storage/slider_images/Default/VydE5vCqcrsR8v8edbNFSQ0DPKRNsio2kYeHjj9T.png" class="col-12 no-padding banner-icon">
                            <!-- <img data-seq src="img/slider/watch3.jpg" alt="Wristwatch slide img" /> -->
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
                        <img src="https://demo.bagisto.com/bagisto-45-64-8-42/storage/slider_images/Default/7eisa4RXqzmdvHg7XIAnTDjyJihxfCwQFWt9aKY7.png" class="col-12 no-padding banner-icon">
                            <!-- <img data-seq src="img/slider/sports.jpg" alt="Women Jeans slide img" /> -->

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
                                <li class="active"><a href="#men" data-toggle="tab">Men</a></li>
                                <li><a href="#women" data-toggle="tab">Women</a></li>
                                <li><a href="#sports" data-toggle="tab">Sports</a></li>
                                <li><a href="#electronics" data-toggle="tab">Electronics</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <section class="section-products">
                                <div class="container">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-md-8 col-lg-6">
                                            <div class="header">
                                                <h3>Featured Product</h3>
                                                <h2>Popular Products</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach($data as $val)
                                        <!-- Single Product -->
                                        <div class="col-md-6 col-lg-3 col-xl-3">
                                            <div id="product-1" class="single-product">
                                                <div class="part-1">

                                                    <a class="aa-product-img" href="#"><img src="{{ asset('Addproduct/' . $val->profile) }}" alt="polo shirt img" width=230rem height="300rem"></a>

                                                    <!-- <ul>

														<li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
														<li><a href="#"><i class="fas fa-heart"></i></a></li>
														<li><a href="#"><i class="fas fa-plus"></i></a></li>
														<li><a href="#"><i class="fas fa-expand"></i></a></li>
												</ul> -->

                                                </div>
                                                      <div class="part">
												<h3 class="product-title">{{$val->name}}</h3>
												<h4 class="product-old-price">${{$val->price}}</h4>
												<h4 class="product-price">$49.99</h4>
										</div>
                                                <a href="/Addtocardview/{{$val->id}}"><button type="submit" class="btn btn-add-to-cart small-padding"><i class="fa-solid fa-cart-shopping"></i> <span class="fs14 fw6 text-uppercase text-up-4">Add To Cart</span></button></a>
                                                <!-- <div class="part-2">
												<h3 class="product-title">Here Product Title</h3>
												<h4 class="product-old-price">$79.99</h4>
												<h4 class="product-price">$49.99</h4>
										</div> -->

                                            </div>
                                        </div>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                        </div>
                        <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / latest product category -->
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