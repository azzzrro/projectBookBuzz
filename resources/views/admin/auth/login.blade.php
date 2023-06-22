<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>bookbuzz | Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('admin_assets/assets/img/og.jpg') }}" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https:/fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('admin_assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/forms/switches.css') }}">
</head>

<body class="form">


    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Sign In</h1>
                        <p class="">Welcome Admin.</p>

                        <form class="text-left" action="{{ route('auth.checkadmin') }}" method="post">
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
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="email">Email</label>
                                    <svg xmlns="http:/www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="username" name="email" type="email" class="form-control"
                                        placeholder="Email" required>
                                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">Password</label>
                                        <a href="auth_pass_recovery_boxed.html" class="forgot-pass-link">Forgot
                                            Password?</a>
                                    </div>
                                    <svg xmlns="http:/www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="Password" required>
                                    <span class="text-danger">@error('password') {{ $message }}
                                        @enderror</span>
                                    <svg xmlns="http:/www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Log In</button>
                                    </div>
                                </div>


                                <p class="signup-link">Forgot your Credentails ? <a href="">Contact Admin</a></p>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin_assets/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin_assets/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin_assets/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin_assets/assets/js/authentication/form-2.js') }}"></script>
    @include('sweetalert::alert')
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo8/auth_login_boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Mar 2021 08:59:28 GMT -->

</html>


 {{-- $result = DB::table('admins')
         ->where(['email' => $request->email])
         ->get();
         if (isset($result[0]->id)) {
             $db_pwd = $result[0]->password;
             if ($db_pwd == $request->password) {
                 $request->session()->put('ADMIN_LOGIN', true);
                 $request->session()->put('ADMIN_ID', $result['0']->id);
                 $request->session()->put('LoggedAdmin', $result['0']->id);
                 return redirect('admin/dashboard/home');
             } else {
                 return redirect()->back()->with('fail', 'Invalid password');

             }
         } else {
             return redirect()->back()->with('fail', 'We do not recognise your email address');
         } --}}