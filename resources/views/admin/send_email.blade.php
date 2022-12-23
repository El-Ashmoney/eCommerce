<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        @include('admin.css')
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.sidebar')
            <!-- partial -->
            @include('admin.header')
            <div class="main-panel">
                <div class="content-wrapper send-email">
                    <h1>Send Email To ( {{ $order->email }} )</h1>
                    <form action="{{ url('send_user_email', $order->id) }}" method="POST">
                        @csrf
                        <div class="email-greeting">
                            <label for="greeting">Email Greeting:</label>
                            <input type="text" name="greeting">
                        </div>
                        <div class="email-greeting">
                            <label for="firstLine">Email Firstline:</label>
                            <input type="text" name="firstLine">
                        </div>
                        <div class="email-greeting">
                            <label for="emailBody">Email body:</label>
                            <input type="text" name="emailBody">
                        </div>
                        <div class="email-greeting">
                            <label for="buttonName">Email Button Name:</label>
                            <input type="text" name="buttonName">
                        </div>
                        <div class="email-greeting">
                            <label for="emailUrl">Email URL:</label>
                            <input type="text" name="emailUrl">
                        </div>
                        <div class="email-greeting">
                            <label for="lastline">Email Lastline:</label>
                            <input type="text" name="lastLine">
                        </div>
                        <div class="email-greeting">
                            <input type="submit" value="Send Email" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
    </body>
</html>
