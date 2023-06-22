@extends('user/layouts/homelayout')

@section('content')
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
							<li class="breadcrumb-item active">Checkout</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Checkout Form s-->
						<div class="checkout-form">
							<div class="row row-40">
								    @php
									$id = Session::get('USER_ID');
									$user = App\Models\User::where(['id' => $id])->firstorfail();
									$category = App\Models\Category::all();
                        			@endphp
								<div class="col-lg-7 mb--20">
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40">
										<h4 class="checkout-title">Billing Address</h4>
										<form action="{{url('checkout_process')}}" id="checkout" method="post">
                     							@csrf 
										<div class="row">
											<div class="col-md-6 col-12 mb--20">
												<label>Name*</label>
												<input type="text" placeholder="Full Name" value="{{$user->name}}" name="name" required>
											</div>
										  
											<div class="col-md-6 col-12 mb--20">
												<label>Email Address*</label>
												<input type="email" placeholder="Email Address" name="email" value="{{$user->email}}" required>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Phone no*</label>
												<input type="text" placeholder="Phone number" name="phone" value="{{$user->mobile}}" required>
											</div>
										 
											<div class="col-12 mb--20">
												<label>Address*</label>
												<input type="text" placeholder="Address line 1" name="address" required> 
											</div>
										 
											<div class="col-md-6 col-12 mb--20">
												<label>Town/City*</label>
												<input type="text" placeholder="Town/City" name="city" required>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>State*</label>
												<input type="text" placeholder="State" name="state" required>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Zip Code*</label>
												<input type="text" placeholder="Zip Code" name="pincode" required>
											</div>
										
										</div>
										<div class="term-block">
													<input type="checkbox" id="accept_terms2" required>
													<input type="hidden" name="total_price" value="{{$all_data->sum("total_amt")}}" required>
													<label for="accept_terms2">I’ve read and accept the terms &
														conditions</label>
												</div>
												<button class="place-order w-100">Place order</button>
										 </form>
									</div>
									<!-- Shipping Address -->
									{{-- <div id="shipping-form" class="mb--40">
										<h4 class="checkout-title">Shipping Address</h4>
										<div class="row">
											<div class="col-md-6 col-12 mb--20">
												<label>Name*</label>
												<input type="text" placeholder="First Name" name="name" required>
											</div>
										  
											<div class="col-md-6 col-12 mb--20">
												<label>Email Address*</label>
												<input type="email" placeholder="Email Address" name="email" required>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Phone no*</label>
												<input type="text" placeholder="Phone number" name="phone" required>
											</div>
										 
											<div class="col-12 mb--20">
												<label>Address*</label>
												<input type="text" placeholder="Address line 1" name="address" required> 
											</div>
										 
											<div class="col-md-6 col-12 mb--20">
												<label>Town/City*</label>
												<input type="text" placeholder="Town/City" name="city" required>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>State*</label>
												<input type="text" placeholder="State" name="state" required>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Zip Code*</label>
												<input type="text" placeholder="Zip Code" name="pincode" required>
											</div>
										</div>
									</div> --}}
									 
								</div>
								<div class="col-lg-5">
									<div class="row">
										<!-- Cart Total -->
										<div class="col-12">
											<div class="checkout-cart-total">
												<h2 class="checkout-title">YOUR ORDER</h2>
												<h4>Product <span>Total</span></h4>
												<ul>
												@foreach ($all_data as $carts)
													<li><span class="left">{{$carts->name}} X {{$carts->qty}}</span> <span
															class="right">₹{{$carts->total_amt}}</span></li>
												@endforeach 
												</ul>
												<p>Sub Total <span>₹{{$all_data->sum("total_amt")}}</span></p>
												<p>Shipping Fee <span>₹00.00</span></p>
												<h4>Grand Total <span>₹{{$all_data->sum("total_amt")}}</span></h4>
												{{-- <div class="method-notice mt--25">
													<article>
														<h3 class="d-none sr-only">blog-article</h3>
														Sorry, it seems that there are no available payment methods for
														your state. Please contact us if you
														require
														assistance
														or wish to make alternate arrangements.
													</article>
												</div> --}}
												 
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection
