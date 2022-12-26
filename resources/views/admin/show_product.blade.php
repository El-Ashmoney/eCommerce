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
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="product">
                        <h2>Products</h2>
                        <table>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount_price }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td><img style="object-fit: contain;" class="product-img" src="/product/{{ $product->image }}" alt=""></td>
                                    <td><a href="{{ url('/update_product', $product->id) }}" class="btn btn-success">Edit</a></td>
                                    <td><a href="{{ url('delete_product', $product->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete the product')">Delete</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="container custom_pagination">
                        <div style="margin-top: 30px" class="">
                            {!! $products->appends(Request::all())->links() !!}
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
