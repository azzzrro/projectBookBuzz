@extends('user/layouts/homelayout')

@section('content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Book Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <main class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row  mb--60">
                <div class="col-lg-5 mb--30">
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
                            <img src="{{ asset('book_pic') }}/{{ $books->image }}" alt="">
                        </div> 
                    </div>
                    <!-- Product Details Slider Nav -->
                    <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
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
                            <img src="{{ asset('book_pic') }}/{{ $books->image }}" alt="">
                        </div> 
                    </div>
                </div>
                @php 
                    $category = App\Models\Category::all();
                @endphp
               
                <div class="col-lg-7">
                    <div class="product-details-info pl-lg--30 "> 
                     <form action="{{url('add_to_cart')}}" id="add_to_cart_post" method="post">
                     @csrf
                        <h3 class="product-title">{{$books->name}}</h3>
                        <ul class="list-unstyled"> 
                                   <li>Author: {{ $books->author }}</li>  
                                    @foreach ($category as $categories)
                                         @if($categories->id == $books->category_id)
                                   <li>Category: {{ $categories->name }}</li>
                                    @endif
                                    @endforeach 
                            
                            <li>Product Code: <span class="list-value"> {{$books->product_code}}</span></li> 
                            @if($books->quantity >= 1)
                            <li>Availability: <span class="list-value">{{$books->quantity}} In Stock</span></li>
                            @endif
                        </ul>
                        <div class="price-block">
                            <span class="price-new">₹{{$books->price}}</span> 
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
                            <p>{{$books->description}}</p>
                        </article>
                        <div class="add-to-cart-row">
                            <div class="count-input-block">
                                <span class="widget-label">Qty</span>
                                <input type="number" class="form-control text-center" name="qty" value="1">
                                <input type="hidden" name="bid" value="{{$books->id}}">
                                <input type="hidden" name="price" value="{{$books->price}}">
                            </div>
                            <div class="add-cart-btn">
                                <a href="javascript:{}" onclick="document.getElementById('add_to_cart_post').submit();" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to
                                    Cart</a>
                            </div>
                        </div>
                        </form> 
                    </div>
                </div>
                
            </div>
            <div class="sb-custom-tab review-tab section-padding">
                <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#tab-1" role="tab"
                            aria-controls="tab-1" aria-selected="true">
                            DESCRIPTION
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#tab-2" role="tab"
                            aria-controls="tab-2" aria-selected="true">
                            REVIEWS 
                        </a>
                    </li>
                </ul>
                <div class="tab-content space-db--20" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                        <article class="review-article">
                            <h1 class="sr-only">Tab Article</h1>
                            <p>{{$books->description}}</p>
                        </article>
                    </div>
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                        <div class="review-wrapper">
                           
                            <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                            <div class="rating-row pt-2">
                                <p class="d-block">Your Rating</p>
                                <span class="rating-widget-block">
                                    <input type="radio" name="star" id="star1">
                                    <label for="star1"></label>
                                    <input type="radio" name="star" id="star2">
                                    <label for="star2"></label>
                                    <input type="radio" name="star" id="star3">
                                    <label for="star3"></label>
                                    <input type="radio" name="star" id="star4">
                                    <label for="star4"></label>
                                    <input type="radio" name="star" id="star5">
                                    <label for="star5"></label>
                                </span>
                                <form action=""  class="mt--15 site-form ">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="message">Comment</label>
                                                <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" id="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input type="text" id="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" id="website" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="submit-btn">
                                                <a href="#" class="btn btn-black">Post Comment</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>
@endsection
