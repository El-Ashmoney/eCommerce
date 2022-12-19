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
                        <th class="th_deg">Payment Status</th>
                        <th class="th_deg">Delivery Status</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Control</th>
                    </tr>
                    <tr>
                        @foreach ($orders as $order)
                            <td>{{ $order->product_title }}</td>
                            <td>{{ $order->product_quantity }}</td>
                            <td>{{ $order->product_price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td><img class="product-img" src="product/{{ $order->product_image }}" alt=""></td>
                            <td>
                                @if ($order->delivery_status == 'processing')
                                    <a href="{{ url('cancel_order', $order->id) }}" class="btn btn-danger" onclick="return confirm('Are You Sure To Cancel This Order?')">Cancel Order</a>
                                @else
                                    <button type="button" class="btn btn-warning disabled" style="color: red" disabled aria-disabled="true">Canceled</button>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                </table>
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
