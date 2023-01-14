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
            <div class="cart">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <table class="show_order">
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
                            <td><img class="product-img" src="product/{{ $cart->product_image }}" alt="Product Image"></td>
                            <td>
                                <a href="{{ url('remove_cart', $cart->id) }}" class="btn btn-danger uppercase" onclick="confirmation(event)"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $total_price = $total_price + $cart->product_price ?>
                    @endforeach
                </table>
                <div>
                    <h1>Total Price = ${{ $total_price }}</h1>
                </div>
                @if ($total_price !== 0)
                    <div class="payment-method">
                        <h1>Proceed to pay</h1>
                        <a href="{{ url('cash_order') }}" class="btn btn-danger uppercase">Cash On Delivery</a>
                        <a href="{{ url('stripe', $total_price) }}" class="btn btn-danger uppercase">Pay Using Card</a>
                    </div>
                @endif
            </div>
        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
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
