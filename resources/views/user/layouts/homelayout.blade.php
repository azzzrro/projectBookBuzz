<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from htmldemo.net/pustok/pustok/{{ url('/') }} by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 May 2022 19:37:25 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bookbuzz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('front_assets/css/plugins.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('front_assets/css/main.css') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front_assets/image/favicon.ico') }}">

</head>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            <div class="header-middle pt--10 pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 ">
                            <a href="{{ url('/') }}" class="site-brand">
                                <img src="{{ asset('front_assets/image/logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <div class="header-phone ">
                                <div class="icon">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="text">
                                    <p>Free Support 24/7</p>
                                    <p class="font-weight-bold number">+01-202-555-0181</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right ">
                                    <li class="menu-item">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ url('shop') }}">Shop</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ url('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        @php
                            
                            $categories = App\Models\Category::all();
                        @endphp
                        <div class="col-lg-3">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars"></i>Browse
                                        categories</a>
                                    <ul class="category-menu">
                                        @foreach ($categories as $data)
                                            <li class="cat-item">
                                                <a
                                                    href="{{ url('cat-shop') }}/{{ $data->id }}">{{ $data->name }}</a>
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-5">
                        <form action="{{url('search_process')}}" id="checkout" method="post">
                     	@csrf 
                        <div class="header-search-block">
                                <input type="text" id="search" name="search" placeholder="Search entire store here">
                                <button type="submit">Search</button>
                            </div>
                        </form>
                            
                        </div>
                        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
                        <script type="text/javascript">
                            var route = "{{ url('autocomplete-search') }}";
                            $('#search').typeahead({
                                source: function(query, process) {
                                    return $.get(route, {
                                        query: query
                                    }, function(data) {
                                        return process(data);
                                    });
                                }
                            });
                        </script>
                        <div class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    <div class="login-block">
                                        @if (session()->has('VENDOR_ID'))
                                            <div class="login-block">
                                                <a href="{{ url('vendor/profile') }}"
                                                    class="font-weight-bold">Profile</a> <br>
                                                <span>or</span><a href="{{ url('vendor/profile') }}">My Account</a>
                                            </div>
                                        @elseif (session()->has('USER_ID'))
                                            <div class="login-block">
                                                <a href="{{ url('user/profile') }}"
                                                    class="font-weight-bold">Profile</a> <br>
                                                <span>or</span><a href="{{ url('user/profile') }}">My Account</a>
                                            </div>
                                        @else
                                            <div class="login-block">
                                                <a href="{{ url('login') }}" class="font-weight-bold">Login</a> <br>
                                                <span>or</span><a href="{{ url('login') }}">Register</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="cart-block">
                                        @if (session()->has('USER_ID'))
                                            <div class="cart-total">
                                                @php
                                                    $id = Session::get('USER_ID');
                                                    $cart = App\Models\Cart::where(['user_id' => $id])->get();
                                                    
                                                @endphp
                                                <span class="text-number">
                                                    {{ count($cart) }}
                                                </span>
                                                <span class="text-item">
                                                    Shopping Cart
                                                </span>
                                                <span class="price">

                                                    <i class="fas fa-chevron-down"></i>
                                                </span>
                                            </div>
                                            <div class="cart-dropdown-block">

                                                <div class=" single-cart-block ">
                                                    <div class="btn-block">
                                                        <a href="{{ url('cart') }}" class="btn">View Cart
                                                            <i class="fas fa-chevron-right"></i></a>
                                                        <a href="{{ url('checkout') }}"
                                                            class="btn btn--primary">Check Out
                                                            <i class="fas fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="cart-total">

                                                <span class="text-number">
                                                    0
                                                </span>
                                                <span class="text-item">
                                                    Shopping Cart
                                                </span>
                                                <span class="price">

                                                    <i class="fas fa-chevron-down"></i>
                                                </span>
                                            </div>
                                            <div class="cart-dropdown-block">

                                                <div class=" single-cart-block ">
                                                    <div class="btn-block">

                                                        <a href="{{ url('login') }}" class="btn btn--primary">Login
                                                            <i class="fas fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- <div class="cart-total">
                                            @php
                                                $id = Session::get('USER_ID');
                                                $cart = App\Models\Cart::where(['user_id' => $id])->get();  
                                                
                                            @endphp
                                            <span class="text-number">
                                                {{count($cart);}}
                                            </span>
                                            <span class="text-item">
                                                Shopping Cart
                                            </span>
                                            <span class="price">
                                          
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </div>
                                        <div class="cart-dropdown-block">
                                            <div class=" single-cart-block ">
                                                <div class="cart-product">
                                                    <a href="product-details.html" class="image">
                                                        <img src="{{ asset('front_assets/image/products/cart-product-1.jpg') }}"
                                                            alt="">
                                                    </a>
                                                    <div class="content">
                                                        <h3 class="title"><a href="product-details.html">Kodak
                                                                PIXPRO
                                                                Astro Zoom AZ421 16 MP</a>
                                                        </h3>
                                                        <p class="price"><span class="qty">1
                                                                ×</span> £87.34</p>
                                                        <button class="cross-btn"><i
                                                                class="fas fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" single-cart-block ">
                                                <div class="btn-block">
                                                    <a href="cart.html" class="btn">View Cart <i
                                                            class="fas fa-chevron-right"></i></a>
                                                    <a href="checkout.html" class="btn btn--primary">Check Out <i
                                                            class="fas fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-mobile-menu">
            <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                <div class="container">
                    <div class="row align-items-sm-end align-items-center">
                        <div class="col-md-4 col-7">
                            <a href="{{ url('/') }}" class="site-brand">
                                <img src="{{ asset('front_assets/image/logo.png') }}" alt="">
                            </a>
                        </div>
                        @php
                            
                            $category = App\Models\Category::all();
                        @endphp
                        <div class="col-md-5 order-3 order-md-2">
                            <nav class="category-nav">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars"></i>Browse
                                        categories</a>
                                    <ul class="category-menu">
                                        @foreach ($category as $data)
                                            <li class="cat-item hidden-menu-item"><a href="#">{{ $data->name }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <li class="sin-link">
                                        <a href="cart.html" class="cart-link link-icon"><i
                                                class="ion-bag"></i></a>
                                    </li>
                                    <li class="sin-link">
                                        <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                                class="ion-navicon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--Off Canvas Navigation Start-->
            <aside class="off-canvas-wrapper">
                <div class="btn-close-off-canvas">
                    <i class="ion-android-close"></i>
                </div>
                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here">
                            <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu main-mobile-menu">

                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/shop') }}">Shop</a></li>
                                <li><a href="{{ url('/contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                    <nav class="off-canvas-nav">
                        <ul class="mobile-menu menu-block-2">
                            <li class="menu-item-has-children">
                                <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="#">Transactions</a></li>
                                    <li><a href="#">Downloads</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="off-canvas-bottom">
                        <div class="contact-list mb--10">
                            <a href="#" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345) 78790220</a>
                            <a href="#" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
                        </div>
                        <div class="off-canvas-social">
                            <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Off Canvas Navigation End-->
        </div>
        <div class="sticky-init fixed-header common-sticky">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <a href="{{ url('/') }}" class="site-brand">
                            <img src="{{ asset('front_assets/image/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-navigation flex-lg-right">
                            <ul class="main-menu menu-right ">
                                <li class="menu-item">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ url('shop') }}">Shop</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ url('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        @yield('content')




        <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
            aria-labelledby="quickModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="product-details-modal">
                        <div class="row">
                            <div class="col-lg-5">
                                <!-- Product Details Slider Big Image-->
                                <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "fade": true,
                                    "draggable": false,
                                    "swipe": false,
                                    "asNavFor": ".product-slider-nav"
                                    }'>
                                    <div class="single-slide">
                                        <img src="{{ asset('front_assets/image/products/product-details-1.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ asset('front_assets/image/products/product-details-2.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ asset('front_assets/image/products/product-details-3.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ asset('front_assets/image/products/product-details-4.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ asset('front_assets/image/products/product-details-5.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <!-- Product Details Slider Nav -->
                                <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
                                    data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
                                    <div class="single-slide">
                                        <img src="{{ asset('front_assets/image/products/product-details-1.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ asset('front_assets/image/products/product-details-2.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ asset('front_assets/image/products/product-details-3.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ asset('front_assets/image/products/product-details-4.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="{{ asset('front_assets/image/products/product-details-5.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 mt--30 mt-lg--30">
                                <div class="product-details-info pl-lg--30 ">
                                    <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
                                    <h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
                                    <ul class="list-unstyled">
                                        <li>Ex Tax: <span class="list-value"> £60.24</span></li>
                                        <li>Brands: <a href="#" class="list-value font-weight-bold"> Canon</a></li>
                                        <li>Product Code: <span class="list-value"> model1</span></li>
                                        <li>Reward Points: <span class="list-value"> 200</span></li>
                                        <li>Availability: <span class="list-value"> In Stock</span></li>
                                    </ul>
                                    <div class="price-block">
                                        <span class="price-new">£73.79</span>
                                        <del class="price-old">£91.86</del>
                                    </div>
                                    <div class="rating-widget">
                                        <div class="rating-block">
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star "></span>
                                        </div>
                                        <div class="review-widget">
                                            <a href="#">(1 Reviews)</a> <span>|</span>
                                            <a href="#">Write a review</a>
                                        </div>
                                    </div>
                                    <article class="product-details-article">
                                        <h4 class="sr-only">Product Summery</h4>
                                        <p>Long printed dress with thin adjustable straps. V-neckline and wiring under
                                            the Dust with ruffles
                                            at the bottom
                                            of the
                                            dress.</p>
                                    </article>
                                    <div class="add-to-cart-row">
                                        <div class="count-input-block">
                                            <span class="widget-label">Qty</span>
                                            <input type="number" class="form-control text-center" value="1">
                                        </div>
                                        <div class="add-cart-btn">
                                            <a href="#" class="btn btn-outlined--primary"><span
                                                    class="plus-icon">+</span>Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="compare-wishlist-row">
                                        <a href="#" class="add-link"><i class="fas fa-heart"></i>Add to Wish
                                            List</a>
                                        <a href="#" class="add-link"><i class="fas fa-random"></i>Add to
                                            Compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="widget-social-share">
                            <span class="widget-label">Share:</span>
                            <div class="modal-social-share">
                                <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================================
    Brands Slider
    ===================================== -->
    <section class="section-margin">
        <h2 class="sr-only">Brand Slider</h2>
        <div class="container">
            <div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
                <div class="single-slide">
                    <img src="{{ asset('front_assets/image/others/brand-1.jpg') }}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{ asset('front_assets/image/others/brand-2.jpg') }}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{ asset('front_assets/image/others/brand-3.jpg') }}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{ asset('front_assets/image/others/brand-4.jpg') }}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{ asset('front_assets/image/others/brand-5.jpg') }}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{ asset('front_assets/image/others/brand-6.jpg') }}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{ asset('front_assets/image/others/brand-1.jpg') }}" alt="">
                </div>
                <div class="single-slide">
                    <img src="{{ asset('front_assets/image/others/brand-2.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Footer Area
    ===================================== -->
    <footer class="site-footer">
        <div class="container">
            <div class="row justify-content-between  section-padding">
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="brand-footer footer-title">
                            <img src="{{ asset('front_assets/image/logo.png') }}" alt="">
                        </div>
                        <div class="footer-contact">
                            <p><span class="label">Address:</span><span class="text">Bookbuzz, ABC
                                    Street 98, HH2 BacHa, New
                                    York,
                                    USA</span></p>
                            <p><span class="label">Phone:</span><span class="text">+18088 234
                                    5678</span></p>
                            <p><span class="label">Email:</span><span
                                    class="text">suport@bookbuzz.com</span></p>
                        </div>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">

                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Extras</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="{{ url('shop') }}">Shop</a></li>
                            <li><a href="{{ url('contact') }}">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-4 col-sm-6">

                    <div class="social-block">
                        <h3 class="title">STAY CONNECTED</h3>
                        <ul class="social-list list-inline">
                            <li class="single-social facebook"><a href="#"><i class="ion ion-social-facebook"></i></a>
                            </li>
                            <li class="single-social twitter"><a href="#"><i class="ion ion-social-twitter"></i></a>
                            </li>
                            <li class="single-social google"><a href="#"><i
                                        class="ion ion-social-googleplus-outline"></i></a></li>
                            <li class="single-social youtube"><a href="#"><i class="ion ion-social-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p class="copyright-heading">

                </p>
                <a href="#" class="payment-block">
                    <img src="{{ asset('front_assets/image/icon/payment.png') }}" alt="">
                </a>
                <p class="copyright-text">Copyright © 2021 <a href="#" class="author">Bookbuzz</a>. All Right
                    Reserved.
                    <br>
                    Design By Bookbuzz
                </p>
            </div>
        </div>
    </footer>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="{{ asset('front_assets/js/plugins.js') }}"></script>
    <script src="{{ asset('front_assets/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('front_assets/js/custom.js') }}"></script>
    @include('sweetalert::alert')

    <script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?4533';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#4dc247",
                "ctaText": "Message Us",
                "borderRadius": "25",
                "marginLeft": "0",
                "marginBottom": "50",
                "marginRight": "50",
                "position": "right"
            },
            "brandSetting": {
                "brandName": "BOOKBUZZ",
                "brandSubTitle": "Typically replies within a day",
                "brandImg": "{{ asset('front_assets/image/watilogo.png') }}",
                "welcomeText": "Hi there!\nHow can I help you?",
                "messageText": "Hello, I have a question about Bookbuzz.",
                "backgroundColor": "#0a5f54",
                "ctaText": "Start Chat",
                "borderRadius": "25",
                "autoShow": true,
                "phoneNumber": "917907799411"
            }
        };
        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>
</body>


</html>
