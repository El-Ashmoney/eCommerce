<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        @include('admin.css')
    </head>
    <body>
        @include('sweetalert::alert')
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.sidebar')
            <!-- partial -->
            @include('admin.header')
            <div class="main-panel">
                <div class="content-wrapper send-email">
                    <h1>Send Email To (<span style="color: #badc58"> {{ $order->email }} </span>)</h1>
                    <form action="{{ url('send_user_email', $order->id) }}" method="POST">
                        @csrf
                        <div class="email-greeting">
                            <label for="greeting">Email Greeting:</label>
                            <input type="text" name="greeting" required>
                        </div>
                        <div class="email-greeting">
                            <label for="firstLine">Email Firstline:</label>
                            <input type="text" name="firstLine" required>
                        </div>
                        <div class="email-greeting">
                            <label for="emailBody">Email body:</label>
                            <input type="text" name="emailBody" required>
                        </div>
                        <div class="email-greeting">
                            <label for="buttonName">Email Button Name:</label>
                            <input type="text" name="buttonName" required>
                        </div>
                        <div class="email-greeting">
                            <label for="emailUrl">Email URL:</label>
                            <input type="text" name="emailUrl" required>
                        </div>
                        <div class="email-greeting">
                            <label for="lastline">Email Lastline:</label>
                            <input type="text" name="lastLine" required>
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
