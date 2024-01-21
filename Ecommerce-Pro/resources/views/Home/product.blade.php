      <!-- product section -->
      <section class="product_section layout_padding">
        <div class="container">
           <div class="heading_container heading_center">
              <h2>
                 Our <span>products</span>
              </h2>
           </div>
           <br>
        <div style="text-align: center;">
            <form action="{{url('search_home')}}" method="GET" >
            @csrf
                <input type="text" style="width:500px;" name="search" placeholder="search for products"/>
            <input type="submit" value="search" />
            </form>
        </div>
           <div class="row">
            @foreach ($product as $products)

            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{url('product_details',$products->id)}}" class="option1">
                                Product Details
                            </a>
                            <form action="{{url('add_cart',$products->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" value="Add to Cart">
                                    </div>
                                </div>
                            </form>
                       </div>
                    </div>
                    <div class="img-box">
                        <img src="product/{{$products->image}} " alt="">
                    </div>
                    <div class="detail-box">

                        <h5>
                            {{$products->title}}
                        </h5>
                            @if ($products->discount != null)
                                <h6 style="color:red;">
                                    discount price
                                    <br>
                                    ${{$products->discount}}
                                </h6>
                                <h6 style=" text-decoration : line-through ;color:blue;">
                                    price
                                    <br>
                                    ${{$products->price}}
                                </h6>
                            @else
                                <h6 style="color:blue;">
                                    price
                                    <br>
                                    ${{$products->price}}
                                </h6>
                            @endif
                    </div>
                </div>
            </div>
            @endforeach
            <div class="pagination-section">
                <div class="container">
                    <span style="padding-top: 20px;width:50%;">
                        {!! $product ->withQueryString()->links('pagination::bootstrap-5') !!}
                    </span>
                </div>
            </div>
        </div>
    </section>
    <!-- end product section -->
