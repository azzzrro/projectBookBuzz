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
                               
                                <a href="#orders" class="active" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders Detail</a> 
 
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
                               
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade  show active" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Orders Details</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                           <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Book Name</th>
                                                        <th>Product Code</th>
                                                        <th>Quantity</th>
                                                        <th>Amount</th>
                                                         
                                                    </tr>
                                                </thead>
                                                <tbody>
												@foreach ($order_details as $data)
													<tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$data->name}}</td>
                                                        <td>{{$data->product_code}}</td>
                                                        <td>{{$data->qty}}</td> 
                                                        <td>{{$data->qty * $data->price}}</td> 
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
                                 
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                 

                                

                                 
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
