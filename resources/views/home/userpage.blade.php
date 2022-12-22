<!DOCTYPE html>
<html>
    <head>
        @include('home.css')
    </head>
    <body>
        <div class="hero_area">
            <!-- header section strats -->
            @include('home.header')
            <!-- end header section -->
            <!-- slider section -->
            @include('home.slider')
            <!-- end slider section -->
        </div>
        <!-- why section -->
        @include('home.why')
        <!-- end why section -->

        <!-- arrival section -->
        @include('home.new_arrival')
        <!-- end arrival section -->

        <!-- product section -->
        @include('home.product')
        <!-- end product section -->

        {{-- Comment Section --}}
        <section class="comment_section subscribe_section">
            <div class="container-fuild">
                <div class="box">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="subscribe_form">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="heading_container heading_center">
                                    <h3>Comment</h3>
                                </div>
                                <form action="{{ url('add_comment') }}" method="POST" class="comments_form">
                                    @csrf
                                    @auth
                                        <textarea name="comment" id="" cols="30" rows="10" placeholder="Enter Your Comment"></textarea>
                                        <input class="btn btn-primary btn-block" type="submit" value="Comment">
                                    @endauth
                                    <a href="{{ url('show_comments') }}" class="btn btn-primary btn-block">Show All Comments</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Comment Section --}}

        <!-- subscribe section -->
        @include('home.subscribe')
        <!-- end subscribe section -->
        <!-- client section -->
        @include('home.client')
        <!-- end client section -->
        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- Custom jQery -->
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
        </script>
        <!-- jQery -->
        <script src="jhome/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
    </body>
</html>
