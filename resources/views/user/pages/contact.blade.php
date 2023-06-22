@extends('user/layouts/homelayout')

@section('content')
             <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- contact area Start -->
        <main class="contact_area inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact_form">
                            <h3 class="ct_title">Send Us a Message</h3>
                           <form action="{{ url('/upload_contact') }}" method="post"
                                    enctype="multipart/form-data" class="contact-form">
                                    @csrf 
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Name <span class="required">*</span></label>
                                            <input type="text" id="con_name"  name="name" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Email <span class="required">*</span></label>
                                            <input type="email" id="con_email"  name="email" class="form-control"
                                                required>
                                        </div>
                                    </div>

                                      <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Mobile <span class="required">*</span></label>
                                            <input type="number" id="con_email"  name="mobile" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Message</label>
                                            <textarea id="con_message"  name="message"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-btn">
                                            <button type="submit" value="submit" id="submit" class="btn btn-black w-100"
                                                name="submit">send</button>
                                        </div>
                                        <div class="form__output"></div>
                                    </div>
                                </div>
                            </form>
                            <div class="form-output">
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="google-map"></div>
                    </div>
                </div>
            </div>
        </main>

          <div class="contact-bottom-info inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row">
                    <!--Contact Information Start-->
                    <div class="col-lg-3 col-sm-6 col-12 mb-30">
                        <div class="contact-info">
                            <span class="icon"><i class="fa fa-phone"></i></span>
                            <div class="content">
                                <h3 class="title">Contact By Phone</h3>
                                <p>+91 9567632318<br> +91 7907799411</p>
                            </div>
                        </div>
                    </div>
                    <!--Contact Information End-->

                    <!--Contact Information Start-->
                    <div class="col-lg-3 col-sm-6 col-12 mb-30">
                        <div class="contact-info">
                            <span class="icon"><i class="fa fa-envelope"></i></span>
                            <div class="content">
                                <h3 class="title">Contact By Email</h3>
                                <p>contact@bookbuzz.com <br> info@nookbuzz.com</p>
                            </div>
                        </div>
                    </div>
                    <!--Contact Information End-->

                    <!--Contact Information Start-->
                    <div class="col-lg-3 col-sm-6 col-12 mb-30">
                        <div class="contact-info">
                            <span class="icon"><i class="fa fa-map-marker"></i></span>
                            <div class="content">
                                <h3 class="title">Come To See Us</h3>
                                <p>BookBuzz , BookBuzz center<br> 1130/5 Louis III St. New York</p>
                            </div>
                        </div>
                    </div>
                    <!--Contact Information End-->

                    <!--Contact Information Start-->
                    <div class="col-lg-3 col-sm-6 col-12 mb-30">
                        <div class="contact-info">
                            <span class="icon"><i class="fa fa-users"></i></span>
                            <div class="content">
                                <h3 class="title">Bookbuzz Social</h3>
                                <ul class="social-list list-inline">
                                    <li class="single-social facebook"><a href="#"><i class="ion ion-social-facebook"></i></a></li>
                                    <li class="single-social twitter"><a href="#"><i class="ion ion-social-twitter"></i></a></li>
                                    <li class="single-social google"><a href="#"><i class="ion ion-social-googleplus-outline"></i></a></li>
                                    <li class="single-social youtube"><a href="#"><i class="ion ion-social-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Contact Information End-->
                </div>
            </div>
        </div>
          <script src="https://maps.googleapis.com/maps/api/js?key="></script>
@endsection
