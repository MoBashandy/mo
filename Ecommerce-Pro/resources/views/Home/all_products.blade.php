<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('Home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('Home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('Home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('Home/css/responsive.css')}}" rel="stylesheet" />
    </head>
   <body>

         <!-- header section strats -->
         @include('Home.header')
         <!-- end header section -->

<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">

    <div style="text-align: center;">
        <form action="{{url('search_product')}}" method="GET" >
        @csrf
            <input type="text" style="width:500px;" name="search" placeholder="search for products"/>
        <input type="submit" value="search" />
        </form>
    </div>
    <br>
    @if(session()->has('message'))
    <div class="alert alert-success">
        <button class="close" typy="button" data-dismiss="alert" eria-hidden="true">x</button>
        {{ session()->get('message') }}
       </div>
       @endif
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
                    <img src="/product/{{$products->image}} " alt="">
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


     @include('home.comments')


      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script type="text/javascript">
        function reply(caller)
            {
                document.getElementById('commentId').value=$(caller).attr('data-Commntid');
                $('.replaydiv').insertAfter($(caller));
                $('.replaydiv').show();
            }
        function reply_close(caller)
            {
                $('.replaydiv').hide();
            }
    </script>
      <script src="{{asset('Home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('Home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('Home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('Home/js/custom.js')}}"></script>
   </body>
</html>


