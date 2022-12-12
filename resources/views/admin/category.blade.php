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
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="add_category">
                        <h2>Add Category</h2>
                        <form action="{{ url('/add_category') }}" method="POST">
                            @csrf
                            <input type="text" name="category_name" id="" placeholder="Write category name">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </form>
                    </div>
                    <table class="category_table">
                        <tr>
                            <td>ID</td>
                            <td>Category Name</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td><a href="{{ url('delete_category', $category->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete the category')">Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
    </body>
</html>
