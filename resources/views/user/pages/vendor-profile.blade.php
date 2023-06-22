@extends('user/layouts/homelayout')

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
									<a href="login-register.html"><i class="fas fa-sign-out-alt"></i> Logout</a>
								</div>
							</div>
							<!-- My Account Tab Menu End -->
							<!-- My Account Tab Content Start -->
							<div class="col-lg-9 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
										<div class="myaccount-content">
											<h3>Vendor Dashboard</h3>
											<div class="welcome mb-20">
												<p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni
														!</strong><a href="login-register.html" class="logout">
														Logout</a>)</p>
											</div>
											<p class="mb-0">From your account dashboard. you can easily check &amp; view
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
															<th>Name</th>
															<th>Date</th>
															<th>Status</th>
															<th>Total</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>Mostarizing Oil</td>
															<td>Aug 22, 2018</td>
															<td>Pending</td>
															<td>$45</td>
															<td><a href="cart.html" class="btn">View</a></td>
														</tr>
														<tr>
															<td>2</td>
															<td>Katopeno Altuni</td>
															<td>July 22, 2018</td>
															<td>Approved</td>
															<td>$100</td>
															<td><a href="cart.html" class="btn">View</a></td>
														</tr>
														<tr>
															<td>3</td>
															<td>Murikhete Paris</td>
															<td>June 12, 2017</td>
															<td>On Hold</td>
															<td>$99</td>
															<td><a href="cart.html" class="btn">View</a></td>
														</tr>
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
												<form action="#">
													<div class="row">
														<div class="col-lg-6 col-12  mb--30">
															<input id="first-name" placeholder="First Name" type="text">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="last-name" placeholder="Last Name" type="text">
														</div>
														<div class="col-12  mb--30">
															<input id="display-name" placeholder="Display Name"
																type="text">
														</div>
														<div class="col-12  mb--30">
															<input id="email" placeholder="Email Address" type="email">
														</div>
														<div class="col-12  mb--30">
															<h4>Password change</h4>
														</div>
														<div class="col-12  mb--30">
															<input id="current-pwd" placeholder="Current Password"
																type="password">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="new-pwd" placeholder="New Password"
																type="password">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="confirm-pwd" placeholder="Confirm Password"
																type="password">
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
											<h3>Books Details</h3>
											<div class="account-details-form">
												<form action="#">
													<div class="row">
														<div class="col-lg-6 col-12  mb--30">
															<input id="name" placeholder="Book Name" type="text">
														</div>
														 
														<div class="col-12  mb--30">
															<input id="display-name" placeholder="Choose Category"
																type="text">
														</div>
													 
														<div class="col-12  mb--30">
															<input id="current-pwd" placeholder="Product Code"
																type="text">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="new-pwd" placeholder="Description"
																type="text">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="confirm-pwd" placeholder="Quantity"
																type="text">
														</div>
															<div class="col-12  mb--30">
															<h4>Banner Image</h4>
														</div>
															<div class="col-12  mb--30">
															<input id="current-pwd" placeholder="banner"
																type="file">
														</div>
															<div class="col-lg-6 col-12  mb--30">
															<input id="new-pwd" placeholder="Price"
																type="text">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="confirm-pwd" placeholder="Discount"
																type="text">
														</div>
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
												<div class="shop-product-wrap list with-pagination row space-db--30 shop-border">
                    <div class="col-lg-4 col-sm-6">
                        <div class="product-card card-style-list">
                            <div class="product-grid-content">
                                <div class="product-header">
                                    <a href="#" class="author">
										Epple
									</a>
                                    <h3><a href="">Here Is A Quick Cure For Book</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset('front_assets/image/products/product-2.jpg')}}" alt="">
                                        <div class="hover-contents">
                                            <a href="" class="hover-image">
                                                <img src="{{asset('front_assets/image/products/product-1.jpg')}}" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.html" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                {{-- </a>
                                                <a href="wishlist.html" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.html" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickModal" class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">₹51.20</span>
                                        {{-- <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="product-list-content">
                                <div class="card-image">
                                    <img src="{{asset('front_assets/image/products/product-3.jpg')}}" alt="">
                                </div>
                                <div class="product-card--body">
                                    <div class="product-header">
                                        <a href="#" class="author">
											Gpple
										</a>
                                        <h3><a href="" tabindex="0">Qpple cPad with Retina Display
												MD510LL/A</a></h3>
                                    </div>
                                    <article>
                                        <h2 class="sr-only">Card List Article</h2>
                                        <p>More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or..</p>
                                    </article>
                                    <div class="price-block">
                                        <span class="price">₹51.20</span>
                                        {{-- <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span> --}}
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
                                        {{-- <a href="#" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                        <a href="#" class="card-link"><i class="fas fa-random"></i> Add To Cart</a> --}}
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
                                                {{-- <a href="wishlist.html" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.html" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickModal" class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">₹51.20</span>
                                        {{-- <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span> --}}
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
                                        {{-- <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span> --}}
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
                                        {{-- <a href="#" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                        <a href="#" class="card-link"><i class="fas fa-random"></i> Add To Cart</a> --}}
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
                                                {{-- <a href="wishlist.html" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.html" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickModal" class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">₹51.20</span>
                                        {{-- <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span> --}}
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
                                        {{-- <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span> --}}
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
                                        {{-- <a href="#" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                        <a href="#" class="card-link"><i class="fas fa-random"></i> Add To Cart</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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
