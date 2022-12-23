<!DOCTYPE html>
<html>
    <head>
        @include('home.css')
    </head>
    <body>
        @include('sweetalert::alert')
        <div class="hero_area">
            <!-- header section strats -->
            @include('home.header')
            <!-- end header section -->
            <div class="comment_page">
                <div class="container">
                    <h1>Comments</h1>
                    <div class="comment_body row">
                        @foreach ($comments as $comment)
                            <div>
                                <p class="comment_auther">{{ $comment->name }}</p>
                                <p>{{ $comment->comment }}</p>
                                <a href="javascript::void(0);" onclick="reply(this)" class="btn btn-primary" data-commentId="{{ $comment->id }}">Reply</a>
                                @foreach ($replies as $reply)
                                    @if ($reply->comment_id == $comment->id)
                                        <div class="replies">
                                            <b>{{ $reply->name }}</b>
                                            <p>{{ $reply->reply }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                        <div class="comment_reply">
                            <form action="{{ url('add_reply') }}" method="POST">
                                @csrf
                                <input type="text" id="commentId" name="commentId" hidden>
                                <textarea name="reply" id="" cols="30" rows="3" placeholder="Enter Your Comment"></textarea>
                                <input class="btn btn-primary" type="submit" value="Reply">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
            </p>
        </div>

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
        <script src="jhome/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
    </body>
</html>
