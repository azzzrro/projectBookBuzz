@extends('user/layouts/homelayout')

@section('content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Cart Page Start -->
    <main class="cart-page-main-block inner-page-sec-padding-bottom">
        <div class="cart_area cart-area-padding  ">
            <div class="container">
                <div class="page-section-title">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="#" class="">
                            <!-- Cart Table -->
                            <div class="cart-table table-responsive mb--40">
                                <table class="table">
                                    <!-- Head Row -->
                                    <thead>
                                        <tr>
                                            <th class="pro-remove"></th>
                                            <th class="pro-thumbnail">Image</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Product Row -->
                                        @foreach ($all_data as $carts)
                                      
                                        <tr>
                                            <td class="pro-remove"><a href="{{url('delete_from_cart')}}/{{$carts->id}}"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                            <td class="pro-thumbnail"><a href="#"><img src="{{ asset('book_pic') }}/{{ $carts->image }}"
                                                        alt="Product"></a></td>
                                            <td class="pro-title"><a href="#">{{$carts->name}}</a></td>
                                            <td class="pro-price"><span>₹{{$carts->total_amt}}</span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty">
                                                    <div class="count-input-block">
                                                        <input type="number" class="form-control text-center" value="{{$carts->qty}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pro-subtotal"><span>₹{{$carts->total_amt}}</span></td>
                                        </tr>
                                      
                                        @endforeach
                                       
                                        
                                        <!-- Product Row -->
                                        {{-- <tr>
                                            <td class="pro-remove"><a href="#"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                            <td class="pro-thumbnail"><a href="#"><img src="{{asset('front_assets/image/products/product-2.jpg')}}"
                                                        alt="Product"></a></td>
                                            <td class="pro-title"><a href="#">Rinosin Glasses</a></td>
                                            <td class="pro-price"><span>₹395.00</span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty">
                                                    <div class="count-input-block">
                                                        <input type="number" class="form-control text-center" value="1">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pro-subtotal"><span>₹395.00</span></td>
                                        </tr> --}}
                                        <!-- Discount Row  -->
                                         
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-section-2">
            <div class="container">
                <div class="row">
                   
                    <!-- Cart Summary -->
                    <div class="col-lg-6 col-12 d-flex">
                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4><span>Cart Summary</span></h4>
                                <p>Sub Total <span class="text-primary">₹{{$all_data->sum("total_amt")}}</span></p>
                                <p>Shipping Cost <span class="text-primary">₹00.00</span></p>
                                <h2>Grand Total <span class="text-primary">₹{{$all_data->sum("total_amt")}}</span></h2>
                            </div>
                            <div class="cart-summary-button">
                                <a href="{{url('checkout')}}" class="checkout-btn c-btn btn--primary">Checkout</a>
                                <a href="{{url('shop')}}" class="checkout-btn c-btn btn--primary">Continue Shopping</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
