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
            <div class="main-panel order-panel">
                <div class="content-wrapper ">
                    <div class="product">
                        <h1>All Orders</h1>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Product Title</th>
                                <th>Product Quantity</th>
                                <th>Product Price</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->product_title }}</td>
                                    <td>{{ $order->product_quantity }}</td>
                                    <td>${{ $order->product_price }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->delivery_status }}</td>
                                    <td class=""><img class="order-img" src="/product/{{ $order->product_image }}" alt=""></td>
                                    <td><a href="{{ url('delete_order', $order->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete the order')">Delete</a></td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center custom-paginate">
                            {!! $orders->appends(Request::all())->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
    </body>
</html>
