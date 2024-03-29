@include('sweetalert::alert')
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
            <div>
                <form action="{{ url('product_search') }}" method="GET">
                    @csrf
                    <input class="search_product" type="text" name="search" placeholder="Search By Product Title Or Category">
                    <input type="submit" value="Search" style="text-transform: uppercase">
                </form>
            </div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success" style="text-align: center" role="alert">
                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ url('product_details', $product->id) }}" class="option1">
                                    Product Details
                                </a>
                                <form action="{{ url('add_cart', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                                        </div>
                                        <div class="col-md-4">
                                            <input class="" type="submit" value="Add To Cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="/product/{{ $product->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
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
                                        ${{ $product->price }}
                                    </h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="custom_pagination container" style="margin-top: 50px">
            <div class="row">
                {{ $products->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</section>
