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
                    <div class="add_product">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <h2>Edit Product</h2>
                        <form action="{{ url('/update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="title">Product Title</label>
                                <input type="text" name="title" class="" value="{{ $product->title }}" required>
                            </div>
                            <div>
                                <label for="description">Product Description</label>
                                <input type="text" name="description" class="" value="{{ $product->description }}" required>
                            </div>
                            <div>
                                <label for="price">Product Price</label>
                                <input type="number" name="price" class="" value="{{ $product->price }}" required>
                            </div>
                            <div>
                                <label for="quantity">Product Quantity</label>
                                <input type="number" name="quantity" class="" value="{{ $product->quantity }}" required>
                            </div>
                            <div>
                                <label for="discount_price">Product Discount Price</label>
                                <input type="number" name="discount_price" class="" value="{{ $product->discount_price }}">
                            </div>
                            <div>
                                <label for="product_category">Product Category</label>
                                <select name="product_category" required>
                                    <option value="{{ $product->category }}" selected>{{ $product->category }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="image">Product image</label>
                                <input type="file" name="image">
                            </div>
                            <div>
                                <input type="submit" value="Update Product" class="btn btn-primary">
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
