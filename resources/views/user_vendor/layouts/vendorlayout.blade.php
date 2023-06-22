<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from htmldemo.net/pustok/pustok/{{url('/')}} by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 May 2022 19:37:25 GMT -->

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
                            <a href="{{url('/')}}" class="site-brand">
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
                                        {{-- <a href="{{ url('contact') }}">Contact</a> --}}
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
                        <div class="col-lg-3">
                            <nav class="category-nav   ">

                            </nav>
                        </div>
                        <div class="col-lg-5">

                        </div>
                        <div class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    @if (session()->has('VENDOR_ID'))
                                       <div class="login-block">
                                        <a href="{{ url('vendor/profile') }}" class="font-weight-bold">Profile</a> <br>
                                        <span>or</span><a href="{{ url('vendor/profile') }}">My Account</a>
                                    </div>
                                    @else
                                       <div class="login-block">
                                        <a href="{{ url('login') }}" class="font-weight-bold">Login</a> <br>
                                        <span>or</span><a href="{{ url('login') }}">Register</a>
                                    </div>
                                    @endif
                                    

                                    <div class="cart-block">


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
                            <a href="{{url('/')}}" class="site-brand">
                                <img src="{{ asset('front_assets/image/logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-5 order-3 order-md-2">
                            <nav class="category-nav   ">

                            </nav>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">

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

                    </div>
                    <!-- search box end -->
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu main-mobile-menu">


                                <li><a href="{{ url('/contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                    <nav class="off-canvas-nav">

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
                        <a href="{{url('/')}}" class="site-brand">
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
                            <img src="{{asset('front_assets/image/logo.png')}}" alt="">
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
                            <li><a href="{{url('shop')}}">Shop</a></li>
                            <li><a href="{{url('contact')}}">Contact us</a></li>
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
</body>


</html>
