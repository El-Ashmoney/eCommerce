<!DOCTYPE html>
<html>
    <head>
        @include('home.css')
    </head>
    <body>
        <div class="hero_area">
        @include('sweetalert::alert')
            <!-- header section strats -->
            @include('home.header')
            <!-- end header section -->
            <div class="product-details col-sm-6 col-md-4 col-lg-4" style="margin: auto; width= 50%; padding: 30px">
                <div class="heading_container">
                    <h2>
                        Product <span>Details</span>
                    </h2>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="/product/{{ $product->image }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5 style="margin: 20px 0; text-align: center">
                        {{ $product->title }}
                        </h5>
                        @if(!$product->discount_price == Null)
                            <h6 style="color: blue">
                                ${{ $product->discount_price }}
                            </h6>
                            <h6 style="text-decoration: line-through; color: red">
                                ${{ $product->price }}
                            </h6>
                            @else
                                <h6>
                                    <span style="font-weight: bold">Product Price: </span>${{ $product->price }}
                                </h6>
                        @endif
                        <h6><span style="font-weight: bold">Product Category:</span> {{ $product->category }}</h6>
                        <h6><span style="font-weight: bold">Product Description:</span> {{ $product->description }}</h6>
                        <h6><span style="font-weight: bold">Available Quantity:</span> {{ $product->quantity }}</h6>
                        <form action="{{ url('add_cart', $product->id) }}" method="POST" style="margin: 10px 0">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width: 100px; height: 53px; border-radius: 50px">
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" value="Add To Cart" style="border-radius: 50px; text-transform: uppercase">
                                </div>
                            </div>
                        </form>
                    </div>
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
