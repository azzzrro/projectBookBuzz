@extends('user_vendor/layouts/vendorlayout')

@section('content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">My Account</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="page-section inner-page-sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- My Account Tab Menu Start -->
                        <div class="col-lg-3 col-12">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-bs-toggle="tab"><i
                                        class="fas fa-tachometer-alt"></i>
                                    Dashboard</a>
                                <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>



                                <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account
                                    Details</a>
                                <a href="#add-books" data-bs-toggle="tab"><i class="fa fa-user"></i> Add
                                    Books</a>
                                <a href="#all-books" data-bs-toggle="tab"><i class="fa fa-user"></i> All
                                    Books</a>
                                <a href="{{url('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        @php
                            $id = Session::get('VENDOR_ID');
                            $user = App\Models\User::where(['id' => $id])->firstorfail(); 
                            $category = App\Models\Category::all();
                        @endphp
                        <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Vendor Dashboard</h3>
                                        <div class="welcome mb-20">
                                            <p>Hello, <strong>{{ $user->name }}</strong> (If Not
                                                <strong>{{ $user->name }}
                                                    !</strong><a href="{{ url('logout') }}" class="logout">
                                                    Logout</a>)
                                            </p>
                                        </div>
                                        <p class="mb-0">From your account dashboard. you can easily check &amp;
                                            view
                                            your
                                            recent orders, manage your shipping and billing addresses and edit your
                                            password and account details.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                           <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Address</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Payment Type</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												@foreach ($order_details as $data)
													<tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$data->address}},<br>{{$data->city}},<br>{{$data->state}},<br>{{$data->pincode}}</td>
                                                        <td>{{$data->created_at}}</td>
                                                        <td>{{$data->order_status}}</td>
                                                        <td>{{$data->payment_type}}</td> 
                                                        <td>{{$data->total_amount}}</td> 
                                                        <td><a href="{{url('vendor_order_details')}}/{{$data->id}}" class="btn">View</a></td>
                                                    </tr>
												@endforeach
                                                    
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->

                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Billing Address</h3>
                                        <address>
                                            <p><strong>Alex Tuntuni</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                                San Francisco, CA 94103</p>
                                            <p>Mobile: (123) 456-7890</p>
                                        </address>
                                        <a href="#" class="btn btn--primary"><i class="fa fa-edit"></i>Edit
                                            Address</a>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                            <form action="{{ url('/change_vendor_password') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <input id="first-name" placeholder="Name" type="text"
                                                            value="{{ $user->name }}" readonly>
                                                    </div>


                                                    <div class="col-12  mb--30">
                                                        <input id="email" placeholder="Email Address" type="email"
                                                            value="{{ $user->email }}"name="email" readonly>
                                                    </div>
                                                    <div class="col-12  mb--30">
                                                        <h4>Password change</h4>
                                                    </div>
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <input name="current_pwd" placeholder="Current Password"
                                                            type="password">
                                                    </div>
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <input name="new_pwd" placeholder="New Password" type="password">
                                                    </div>

                                                    <div class="col-12">
                                                        <button class="btn btn--primary">Save Changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="add-books" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Add Books</h3>
                                        <div class="account-details-form">
                                            <form action="{{ url('/add_books') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <input id="name" placeholder="Book Name" type="text" name="name"
                                                            required>
                                                    </div>

													 <div class="col-lg-6 col-12  mb--30">
                                                        <input id="name" placeholder="Author of the Book" type="text" name="author"
                                                            required>
                                                    </div>

                                                    <div class="col-12  mb--30">
                                                        <label for="cars">Choose a Category:</label>
                                                        <select id="cat" name="category_id"
                                                            style="display: block;width: 100%;border: 1px solid #cecece;line-height: 24px;padding: 11px 25px;color: #333;background: transparent;border-radius: 3px;">
															@foreach ($category as $categories)
																 <option value="{{$categories->id}}">{{$categories->name}}</option>
															@endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-12  mb--30">
                                                        <label for="cars">Choose a if Bestseller:</label>
                                                        <select id="bestseller" name="best_seller"
                                                            style="display: block;width: 100%;border: 1px solid #cecece;line-height: 24px;padding: 11px 25px;color: #333;background: transparent;border-radius: 3px;">
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12  mb--30">
                                                        <input id="current-pwd" placeholder="Product Code" type="text"
                                                            name="product_code">
                                                    </div>
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <input id="new-pwd" placeholder="Description" type="text"
                                                            name="description">
                                                    </div>
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <input id="confirm-pwd" placeholder="Quantity" type="text"
                                                            name="qty">
                                                    </div>
                                                    <div class="col-12  mb--30">
                                                        <h4>Banner Image</h4>
                                                    </div>
                                                    <div class="col-12  mb--30">
                                                        <input id="current-pwd" placeholder="banner" type="file"
                                                            name="image">
                                                    </div>
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <input id="new-pwd" placeholder="Price" type="text" name="price">
                                                    </div>
                                                    {{-- <div class="col-lg-6 col-12  mb--30">
                                                        <input id="confirm-pwd" placeholder="Discount" type="text" >
                                                    </div> --}}
                                                    <div class="col-12">
                                                        <button class="btn btn--primary">Save Changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="all-books" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                            <div
                                                class="shop-product-wrap list with-pagination row space-db--30 shop-border">
												@foreach ($books as $book)
													   <div class="col-lg-4 col-sm-6">
                                                    <div class="product-card card-style-list">
                                                        <div class="product-list-content">
                                                            <div class="card-image">
                                                                <img src="{{ asset('book_pic') }}/{{ $book->image }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="product-card--body">
                                                                <div class="product-header">
																 	<a class="author">
																	 @if($book->status == "0")
                                                                       Status :  Pending
																	@elseif($book->status == "1")
																	    Status : Approved
																	@endif
                                                                    </a>
                                                                    <a href="#" class="author">
                                                                        {{$book->author}}
                                                                    </a>
                                                                    <h3><a href="" tabindex="0"> {{$book->name}}</a></h3>
                                                                </div>
                                                                <article>
                                                                    <h2 class="sr-only">Card List Article</h2>
                                                                    <p> {{$book->description}}</p>
                                                                </article>
                                                                <div class="price-block">
                                                                    <span class="price">₹ {{$book->price}}</span>
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
												@endforeach
                                             
                                                {{-- <div class="col-lg-4 col-sm-6">
                                                    <div class="product-card card-style-list"> 
                                                        <div class="product-list-content">
                                                            <div class="card-image">
                                                                <img src="{{ asset('front_assets/image/products/product-6.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="product-card--body">
                                                                <div class="product-header">
                                                                    <a href="#" class="author">
                                                                        fpple
                                                                    </a>
                                                                    <h3><a href="" tabindex="0">Apple iPad with Retina
                                                                            Display
                                                                            MD510LL/A</a></h3>
                                                                </div>
                                                                <article>
                                                                    <h2 class="sr-only">Card List Article</h2>
                                                                    <p>More room to move. With 80GB or 160GB of storage and
                                                                        up to 40 hours of battery life, the new iPod classic
                                                                        lets you enjoy up to 40,000 songs or..</p>
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
                                                        <div class="product-list-content">
                                                            <div class="card-image">
                                                                <img src="{{ asset('front_assets/image/products/product-7.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="product-card--body">
                                                                <div class="product-header">
                                                                    <a href="#" class="author">
                                                                        Apple
                                                                    </a>
                                                                    <h3><a href="" tabindex="0">Apple iPad with Retina
                                                                            Display
                                                                            MD510LL/A</a></h3>
                                                                </div>
                                                                <article>
                                                                    <h2 class="sr-only">Card List Article</h2>
                                                                    <p>More room to move. With 80GB or 160GB of storage and
                                                                        up to 40 hours of battery life, the new iPod classic
                                                                        lets you enjoy up to 40,000 songs or..</p>
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
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                            </div>
                        </div>
                        <!-- My Account Tab Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
