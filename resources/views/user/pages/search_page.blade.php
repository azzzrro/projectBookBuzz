@extends('user/layouts/homelayout')

@section('content')
   <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Search Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <main class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="shop-toolbar mb--30">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2 col-sm-6">
                            <!-- Product View Mode -->
                            <div class="product-view-mode">
                                <a href="#" class="sorting-btn" data-target="grid"><i class="fas fa-th"></i></a>
                                <a href="#" class="sorting-btn" data-target="grid-four">
                                    <span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
                                </a>
                                <a href="#" class="sorting-btn active" data-target="list "><i
										class="fas fa-list"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
                            <span class="toolbar-status">
								
							</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
                            <div class="sorting-selection">

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                            <div class="sorting-selection">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-toolbar d-none">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2 col-sm-6">
                            <!-- Product View Mode -->
                            <div class="product-view-mode">
                                <a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
                                <a href="#" class="sorting-btn" data-target="grid-four">
                                    <span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
                                </a>
                                <a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
                            <span class="toolbar-status">
							 
							</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">

                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">

                        </div>
                    </div>
                </div>
                <div class="shop-product-wrap list with-pagination row space-db--30 shop-border">
                @php 
                    $category = App\Models\Category::all();
                @endphp
                @foreach ($books as $book)
                    <div class="col-lg-4 col-sm-6">
                        <div class="product-card card-style-list">
                            <div class="product-grid-content">

                                <div class="product-header">
                                    <a class="author">
									Author: {{ $book->author }} <br>
                                    @foreach ($category as $categories)
                                         @if($categories->id == $book->category_id)
                                    Category: {{ $categories->name }}
                                    @endif
                                    @endforeach 
									</a>
                                    <h3><a href="{{url('shop-detail')}}/{{$book->id}}">{{ $book->name }}</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ asset('book_pic') }}/{{ $book->image }}" alt="">
                                        <div class="hover-contents">
                                            <a href="" class="hover-image">
                                                <img src="{{ asset('book_pic') }}/{{ $book->image }}" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.html" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">₹{{ $book->price }}</span> 
                                    </div>
                                </div>

                            </div>
                            <div class="product-list-content">

                                <div class="card-image">
                                    <img src="{{asset('front_assets/image/products/product-3.jpg')}}" alt="">
                                </div>
                                <div class="product-card--body">
                                    <div class="product-header">
                                         <a class="author">
									Author: {{ $book->author }} <br>
                                    @foreach ($category as $categories)
                                         @if($categories->id == $book->category_id)
                                    Category: {{ $categories->name }}
                                    @endif
                                    @endforeach 
									</a> 
                                        <h3><a href="{{url('shop-detail')}}/{{$book->id}}" tabindex="0">{{ $book->name }}</a></h3>
                                    </div>
                                    <article>
                                        <h2 class="sr-only">Card List Article</h2>
                                        <p>{{ $book->description }}</p>
                                    </article>
                                    <div class="price-block">
                                        <span class="price">₹{{ $book->price }}</span> 
                                    </div>
                                    <div class="rating-block">
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star "></span>
                                    </div>
                                    <div class="btn-block">
                                        <a href="{{url('home_add_to_cart')}}/{{ $book->id }}/1" class="btn btn-outlined">Add To Cart</a> 
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                    
                    {{-- <div class="col-lg-4 col-sm-6">
                        <div class="product-card card-style-list">
                            <div class="product-grid-content">
                                <div class="product-header">
                                    <a href="#" class="author">
										Lpple
									</a>
                                    <h3><a href="">Simple Things You To Save BOOK</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('front_assets/image/products/product-4.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="" class="hover-image">
                                                <img src="{{asset('front_assets/image/products/product-5.jpg')}}" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.html" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">₹51.20</span> 
                                    </div>
                                </div>
                            </div>
                            <div class="product-list-content">
                                <div class="card-image">
                                    <img src="{{asset('front_assets/image/products/product-6.jpg')}}" alt="">
                                </div>
                                <div class="product-card--body">
                                    <div class="product-header">
                                        <a href="#" class="author">
											fpple
										</a>
                                        <h3><a href="" tabindex="0">Apple iPad with Retina Display
												MD510LL/A</a></h3>
                                    </div>
                                    <article>
                                        <h2 class="sr-only">Card List Article</h2>
                                        <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or..</p>
                                    </article>
                                    <div class="price-block">
                                        <span class="price">₹51.20</span> 
                                    </div>
                                    <div class="rating-block">
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star "></span>
                                    </div>
                                    <div class="btn-block">
                                        <a href="#" class="btn btn-outlined">Add To Cart</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="product-card card-style-list">
                            <div class="product-grid-content">
                                <div class="product-header">
                                    <a href="#" class="author">
										Cpple
									</a>
                                    <h3><a href="">3 Ways Create Better BOOK With</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('front_assets/image/products/product-7.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="" class="hover-image">
                                                <img src="{{asset('front_assets/image/products/product-8.jpg')}}" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.html" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">₹51.20</span> 
                                    </div>
                                </div>
                            </div>
                            <div class="product-list-content">
                                <div class="card-image">
                                    <img src="{{asset('front_assets/image/products/product-7.jpg')}}" alt="">
                                </div>
                                <div class="product-card--body">
                                    <div class="product-header">
                                        <a href="#" class="author">
											Apple
										</a>
                                        <h3><a href="" tabindex="0">Apple iPad with Retina Display
												MD510LL/A</a></h3>
                                    </div>
                                    <article>
                                        <h2 class="sr-only">Card List Article</h2>
                                        <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or..</p>
                                    </article>
                                    <div class="price-block">
                                        <span class="price">₹51.20</span> 
                                    </div>
                                    <div class="rating-block">
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star "></span>
                                    </div>
                                    <div class="btn-block">
                                        <a href="#" class="btn btn-outlined">Add To Cart</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}


                </div>
                <!-- Pagination Block -->
                <div class="row pt--30">

                </div>
                <!-- Modal -->
              
            </div>
        </main>
@endsection