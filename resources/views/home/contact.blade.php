<!DOCTYPE html>
<html>
    <head>
        @include('home.css')
    </head>
    <body class="sub_page">
        <div class="hero_area">
            <!-- header section strats -->
            @include('home.header')
            <!-- end header section -->
            <!-- inner page section -->
            <section class="inner_page_head">
                <div class="container_fuild">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="full">
                                <h3>Contact us</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end inner page section -->
            <!-- why section -->
            <section class="why_section contact_layout layout_padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="full">
                                <form action="{{ url('/') }}">
                                    <fieldset>
                                        <input type="text" placeholder="Enter your full name" name="name" required />
                                        <input type="email" placeholder="Enter your email address" name="email" required />
                                        <input type="text" placeholder="Enter subject" name="subject" required />
                                        <textarea placeholder="Enter your message" required></textarea>
                                        <input type="submit" value="Submit" />
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
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
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
                            <p>Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with</p>
                            <div class="footer_social">
                                <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-pinterest" aria-hidden="true"></i></a>
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
                <div class="footer-info">
                    <div class="col-lg-7 mx-auto px-0">
                        <p>
                            &copy; <span id="displayYear"></span> All Rights Reserved By
                            <a href="https://html.design/">Free Html Templates</a><br>

                            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                        </p>
                    </div>
                </div>
                </div>
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
