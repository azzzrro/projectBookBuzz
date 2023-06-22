@extends('user/layouts/homelayout')

@section('content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!--=============================================
                    =            Login Register page content         =
                    =============================================-->
    <main class="page-section inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                    <!-- Login Form s-->
                    <form action="{{ route('auth.reguser') }}" class="sign-up-form" method="POST">
                        @csrf

                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">New Customer</h4>
                            <p><span class="font-weight-bold">I am a new customer</span></p>
                            <div class="row">
                                <div class="col-md-12 col-12 mb--15">
                                    <label for="email">Full Name</label>
                                    <input class="mb-0 form-control" type="text" name="name"
                                        placeholder="Enter your full name">
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="email">Email</label>
                                    <input class="mb-0 form-control" type="email" name="email"
                                        placeholder="Enter Your Email Address Here..">
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="email">Mobile</label>
                                    <input class="mb-0 form-control" type="number" name="mobile"
                                        placeholder="Enter Your Mobile Here..">
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="email">Choose your type</label>
                                    <select class="mb-0 form-control" name="utype">
                                        <option value="1">User</option>
                                        <option value="2">Vendor</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mb--20">
                                    <label for="password">Password</label>
                                    <input class="mb-0 form-control" type="password" name="password"
                                        placeholder="Enter your password">
                                </div>

                                <div class="col-md-12">
                                    <input type="submit" value="Register" class="btn btn-outlined" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                    <form action="{{ route('auth.checkuser') }}" class="sign-in-form" method="POST">
                        @csrf

                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Returning Customer</h4>
                            <p><span class="font-weight-bold">I am a returning customer</span></p>
                            <div class="row">
                                <div class="col-md-12 col-12 mb--15">
                                    <label for="email">Enter your email address here...</label>
                                    <input class="mb-0 form-control" type="email" name="email"
                                        placeholder="Enter you email address here...">
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="password">Password</label>
                                    <input class="mb-0 form-control" type="password" name="password"
                                        placeholder="Enter your password">
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-12">

                                    <input type="submit" value="Login" class="btn btn-outlined" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    </div>
@endsection
