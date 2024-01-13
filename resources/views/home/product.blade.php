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
                                <a href="{{url('product_details', $product->id)}}" class="option1">
                                    product Details
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p1.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $product->product_title }}
                            </h5>
                            <h6>
                              {{ $product->product_price }}
                            </h6>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- {!!$products->appends(Request::all)->link()!!} --}}



        </div>
        <div class="mx-auto w-50 pt-4">
            
            {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}

        </div>
    </div>
</section>
