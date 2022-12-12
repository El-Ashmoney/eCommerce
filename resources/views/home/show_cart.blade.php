<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <base href="/public">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="images/favicon.png" type="">
        <title>Famms - Fashion</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
        <!-- font awesome style -->
        <link href="home/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="home/css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="home/css/responsive.css" rel="stylesheet" />
    </head>
    <body>
        <div class="hero_area">
            <!-- header section strats -->
            @include('home.header')
            <!-- end header section -->
            <div class="cart">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <table>
                    <tr>
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Product Quantity</th>
                        <th class="th_deg">Product Price</th>
                        <th class="th_deg">Product Image</th>
                        <th class="th_deg">Control</th>
                    </tr>
                    <?php $total_price = 0;?>
                    @foreach ($cart as $cart)
                        <tr>
                            <td>{{ $cart->product_title }}</td>
                            <td>{{ $cart->product_quantity }}</td>
                            <td>${{ $cart->product_price }}</td>
                            <td><img class="product-img" src="product/{{ $cart->product_image }}" alt=""></td>
                            <td>
                                <a href="{{ url('remove_cart', $cart->id) }}" class="btn btn-danger" onclick="return confirm('Are You Sure To Remove This Product?')">Remove</a>
                            </td>
                        </tr>
                        <?php $total_price = $total_price + $cart->product_price ?>
                    @endforeach
                </table>
                <div>
                    <h1>Total Price = ${{ $total_price }}</h1>
                </div>
                <div class="payment-method">
                    <h1>Proceed to pay</h1>
                    <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
                    <a href="{{ url('') }}" class="btn btn-danger">Pay Using Card</a>
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
