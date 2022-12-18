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
                <div class="content-wrapper">
                    <div class="product">
                        <h1>All Orders</h1>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="order_search">
                            <form action="{{ url('search_data') }}" method="GET">
                                <input type="text" name="search" placeholder="Search for orders">
                                <input type="submit" value="Search" class="btn btn-primary">
                            </form>
                        </div>
                        <div class="greadient_border">
                            <table>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Product Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    <th>Product Image</th>
                                    <th>Action</th>
                                    <th>Download</th>
                                    <th>Feedback</th>
                                </tr>
                                @forelse ($orders as $order)
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
                                        <td>
                                            <a href="{{ url('delete_order', $order->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete the order')">Delete</a>
                                            @if ($order->delivery_status == "processing")
                                                <a href="{{ url('deliver_order', $order->id) }}" class="btn btn-success">Delivered</a>
                                            @endif
                                        </td>
                                        <td><a href="{{ url('download_pdf', $order->id) }}" class="btn btn-info">Export to PDF</a></td>
                                        <td><a href="{{ url('send_email', $order->id) }}" class="btn btn-info">Send Email</a></td>
                                    </tr>
                                    @empty
                                    <tr class="no-data">
                                        <td colspan="16">No Data Found</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                        {{-- <div style="margin: 30px 0" class="d-flex justify-content-center custom-paginate">
                            {!! $orders->appends(Request::all())->links() !!}
                        </div> --}}
                    </div>
                </div>
            </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
    </body>
</html>
