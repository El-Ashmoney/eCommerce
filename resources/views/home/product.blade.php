<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
        <h2>
            Our <span>products</span>
        </h2>
        </div>
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
                            <img src="product/{{ $product->image }}" alt="">
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
            <div>
                <span style="padding: 10px 0" class="custom-paginate">
                    {!! $products->appends(Request::all())->links() !!}
                </span>
            </div>
        </div>
    </div>
</section>
