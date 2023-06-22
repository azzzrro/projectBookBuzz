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
                                <a href="{{url('login')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        @php
                            $id = Session::get('USER_ID');
                            $user = App\Models\User::where(['id' => $id])->firstorfail();
                            $order = App\Models\Order::where(['user_id' => $id])->get();
                        @endphp
                        <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>
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
												@foreach ($order as $data)
													<tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$data->address}},<br>{{$data->city}},<br>{{$data->state}},<br>{{$data->pincode}}</td>
                                                        <td>{{$data->created_at}}</td>
                                                        <td>{{$data->order_status}}</td>
                                                        <td>{{$data->payment_type}}</td> 
                                                        <td>{{$data->total_amount}}</td> 
                                                        <td><a href="{{url('order_detail')}}/{{$data->id}}" class="btn">View</a></td>
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
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                          
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                             <form action="{{ url('/change_user_password') }}" method="post">
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
