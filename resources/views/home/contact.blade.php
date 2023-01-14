<!DOCTYPE html>
<html>
    <head>
        @include('home.css')
    </head>
    <body class="sub_page">
    @include('sweetalert::alert')
        <div class="hero_area">
            <!-- header section strats -->
            @include('home.header')
            <!-- end header section -->
            <!-- inner page section -->
            <!-- end inner page section -->
            <!-- why section -->
            <section class="why_section contact_layout layout_padding">
                <div class="contact-page">
                    <div class="product-details heading_container">
                        <h2>
                            Contact <span>Us</span>
                        </h2>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="full">
                                <form action="{{ url('/contact') }}" method="POST">
                                    @csrf
                                    <fieldset>
                                        <input class="form-control" type="text" placeholder="Enter your full name" name="name" />
                                        @if($errors->has('name'))
                                            <small class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
                                        @endif
                                        <input type="email" placeholder="Enter your email address" name="email" />
                                        @if($errors->has('email'))
                                            <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
                                        @endif
                                        <input type="text" placeholder="Enter subject" name="subject" />
                                        @if($errors->has('subject'))
                                            <small class="form-text invalid-feedback">{{ $errors->first('subject') }}</small>
                                        @endif
                                        <textarea placeholder="Enter your message" name="message"></textarea>
                                        @if($errors->has('message'))
                                            <small class="form-text invalid-feedback">{{ $errors->first('message') }}</small>
                                        @endif
                                        <button type="submit" style="text-transform: uppercase">Submit</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end why section -->
            <!-- footer section -->
            <footer class="footer_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 footer-col">
                            <div class="footer_contact">
                                <h4>Reach at..</h4>
                                <div class="contact_link_box">
                                    <a href="">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>Location</span>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <span>Call +20 1012734018</span>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <span>ashmoney@outlook.com</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 footer-col">
                            <div class="footer_detail">
                                <a href="{{ url('/') }}" class="footer-logo">Blank Cart</a>
                                <p>The customer is at the heart of our unique business model, which includes design.</p>
                                <div class="footer_social">
                                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                                    <a href=""><i class="fa-brands fa-linkedin"></i></a>
                                    <a href=""><i class="fa-brands fa-google"></i></a>
                                    <a href=""><i class="fa-brands fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 footer-col">
                            <div class="map_container">
                                <div class="map">
                                    <div id="googleMap"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright text-center"><span>&copy;</span>2023 Blank Cart. All Right Reserved.</div>
            </footer>
        <!-- footer section -->
        {{-- Custom JS --}}
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
        </script>
        {{-- Custom JS --}}
        <!-- jQery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
    </body>
</html>
