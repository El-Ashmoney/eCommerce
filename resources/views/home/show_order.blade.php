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
                <div class="container">
                    <table class="show_order">
                        <tr>
                            <th class="th_deg">Product Title</th>
                            <th class="th_deg">Product Quantity</th>
                            <th class="th_deg">Product Price</th>
                            <th class="th_deg">Payment Status</th>
                            <th class="th_deg">Delivery Status</th>
                            <th class="th_deg">Image</th>
                            <th class="th_deg">Control</th>
                        </tr>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->product_title }}</td>
                                <td>{{ $order->product_quantity }}</td>
                                <td>${{ $order->product_price }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->delivery_status }}</td>
                                <td><img class="product-img" src="product/{{ $order->product_image }}" alt=""></td>
                                <td>
                                    @if ($order->delivery_status == 'processing')
                                        <a href="{{ url('cancel_order', $order->id) }}" class="btn btn-danger uppercase" onclick="return confirm('Are you sure to cancel this order?')">Cancel Order</a>
                                    @else
                                        <button type="button" class="btn btn-warning disabled uppercase" style="color: red" disabled aria-disabled="true">Canceled</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="custom_pagination container" style="margin-top: 50px">
                    <div class="row">
                        {{ $orders->appends(Request::all())->links() }}
                    </div>
                </div>
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
