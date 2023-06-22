@extends('user/layouts/homelayout')

@section('content')
    <section class="hero-area hero-slider-1">
        <div class="sb-slick-slider" data-slick-setting='{
                                                "autoplay": true,
                                                "fade": true,
                                                "autoplaySpeed": 3000,
                                                "speed": 3000,
                                                "slidesToShow": 1,
                                                "dots":true
                                                       }'>
            <div class="single-slide bg-shade-whisper  ">
                <div class="container">
                    <div class="home-content text-center text-sm-left position-relative">
                        <div class="hero-partial-image image-right">
                            <img src="{{ asset('front_assets/image/bg-images/home-slider-2-ai.png') }}" alt="">
                        </div>
                        <div class="row g-0">
                            <div class="col-xl-6 col-md-6 col-sm-7">
                                <div class="home-content-inner content-left-side text-start">
                                    <h1>H.G. Wells<br>
                                        De Vengeance</h1>
                                    <h2>Cover Up Front Of Books and Leave Summary</h2>
                                    {{-- <a href="shop-grid.html" class="btn btn-outlined--primary">
                                        $78.09 - Order Now!
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide bg-ghost-white">
                <div class="container">
                    <div class="home-content text-center text-sm-left position-relative">
                        <div class="hero-partial-image image-left">
                            <img src="{{ asset('front_assets/image/bg-images/home-slider-1-ai.png') }}" alt="">
                        </div>
                        <div class="row align-items-center justify-content-start justify-content-md-end">
                            <div class="col-lg-6 col-xl-7 col-md-6 col-sm-7">
                                <div class="home-content-inner content-right-side text-start">
                                    <h1>J.D. Kurtness <br>
                                        De Vengeance</h1>
                                    <h2>Cover Up Front Of Books and Leave Summary</h2>
                                    {{-- <a href="shop-grid.html" class="btn btn-outlined--primary">
                                        $78.09 - Learn More
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb--30">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="text">
                            <h5>Free Shipping Item</h5>
                            <p> Orders over $500</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-redo-alt"></i>
                        </div>
                        <div class="text">
                            <h5>Money Back Guarantee</h5>
                            <p>100% money back</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <div class="text">
                            <h5>Cash On Delivery</h5>
                            <p>Lorem ipsum dolor amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-life-ring"></i>
                        </div>
                        <div class="text">
                            <h5>Help & Support</h5>
                            <p>Call us : + 0123.4567.89</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-margin">
        <h2 class="sr-only">Promotion Section</h2>
        <div class="container">
            <div class="row space-db--30">
                <div class="col-lg-6 col-md-6 mb--30">
                    <a class="promo-image promo-overlay">
                        <img src="{{ asset('front_assets/image/bg-images/promo-banner-with-text.jpg') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 mb--30">
                    <a class="promo-image promo-overlay">
                        <img src="{{ asset('front_assets/image/bg-images/promo-banner-with-text-2.jpg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!--=================================
                            Deal of the day
                            ===================================== -->
    <section class="section-margin">
        <div class="container-fluid">
            <div class="promo-section-heading">
                <h2>Deal of the day up to 20% off Special offer</h2>
            </div>
            <div class="product-slider with-countdown  slider-border-single-row sb-slick-slider" data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 6,
                                    "dots":true
                                }' data-slick-responsive='[
                                    {"breakpoint":1400, "settings": {"slidesToShow": 4} },
                                    {"breakpoint":992, "settings": {"slidesToShow": 3} },
                                    {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                    {"breakpoint":575, "settings": {"slidesToShow": 2} },
                                    {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                ]'>
                @php
                    $category = App\Models\Category::all();
                @endphp

                @foreach ($books as $book)
                    <div class="single-slide">
                        <div class="product-card">
                            <div class="product-header">
                                <a class="author">
                                    Author: {{ $book->author }} <br>
                                    @foreach ($category as $categories)
                                        @if ($categories->id == $book->category_id)
                                            Category: {{ $categories->name }}
                                        @endif
                                    @endforeach
                                </a>
                                <h3><a>{{ $book->name }}</a></h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image">
                                    <img src="{{ asset('book_pic') }}/{{ $book->image }}" alt="">
                                    <div class="hover-contents">
                                        <a href="{{ url('shop-detail') }}/{{ $book->id }}" class="hover-image">
                                            <img src="{{ asset('book_pic') }}/{{ $book->image }}" alt="">
                                        </a>
                                        <div class="hover-btns">
                                            <a href="{{ url('shop-detail') }}/{{ $book->id }}"
                                                class="single-btn">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-block">
                                    <span class="price">₹{{ $book->price }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>



    <section class="section-margin">
        <div class="promo-wrapper promo-type-three">
            <a href="#" class="promo-image promo-overlay bg-image"
                data-bg="{{ asset('front_assets/image/bg-images/promo-banner-full.jpg') }}">
            </a>
            <div class="promo-text w-100 ml-0">
                <div class="container">
                    <div class="row w-100">
                        <div class="col-lg-7">
                            <h2>I Love This Idea!</h2>
                            <h3>Cover up front of book and
                                leave summary</h3>
                            {{-- <a href="#" class="btn btn--yellow"> Learn More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                            Home Blog Slider
                            ===================================== -->
    <!--=================================
                            Home Blog
                            ===================================== -->
    <section class="section-margin">
        <div class="container">
            <div class="section-title">
                <h2>LATEST EVENTS</h2>
            </div>
            <div class="blog-slider sb-slick-slider" data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 2,
                                    "dots": true
                                }' data-slick-responsive='[
                                    {"breakpoint":1200, "settings": {"slidesToShow": 1} }
                                ]'>
                        @php
                            $id = Session::get('VENDOR_ID');  
                            $events = App\Models\Event::all();
                        @endphp
                @foreach ($events as $data)
                    <div class="single-slide">
                        <div class="blog-card">
                            <div class="image">
                                <img src="{{ asset('front_assets/image/others/blog-grid-1.jpg') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="content-header">
                                     
                                    <h3 class="title"><a href="https://wa.me/917907799411?text=I%20would%20like%20to%20join%20%22{{$data->title}}%22%20event">{{$data->title}}</a>
                                    </h3>
                                </div>
                                <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Admin</a></p>
                                <article class="blog-paragraph">
                                    <h2 class="sr-only">blog-paragraph</h2>
                                    <p>{{$data->description}}</p>
                                </article>
                                <a href="https://wa.me/917907799411?text=I%20would%20like%20to%20join%20%22{{$data->title}}%22%20event" class="card-link">Join Event <i
                                        class="fas fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


    
@endsection
