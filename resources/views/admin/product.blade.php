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
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="add_product">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <h2>Add Product</h2>
                        <form style="margin-top: 60px" action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="title">Product Title</label>
                                <input type="text" name="title" class="" placeholder="Enter the product title" required>
                            </div>
                            <div>
                                <label for="description">Product Description</label>
                                <input type="text" name="description" class="" placeholder="Enter the product description" required>
                            </div>
                            <div>
                                <label for="price">Product Price</label>
                                <input type="number" name="price" class="" placeholder="Enter the product price" required>
                            </div>
                            <div>
                                <label for="quantity">Product Quantity</label>
                                <input type="number" name="quantity" class="" placeholder="Enter the product quantity" required>
                            </div>
                            <div>
                                <label for="discount_price">Product Discount Price</label>
                                <input type="number" name="discount_price" class="" placeholder="Enter the product discount price">
                            </div>
                            <div>
                                <label for="product_category">Product Category</label>
                                <select name="product_category" required>
                                    <option value="0" selected>Add a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="image">Product image</label>
                                <input type="file" name="image" required>
                            </div>
                            <div>
                                <input type="submit" value="Add Product" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
    </body>
</html>
