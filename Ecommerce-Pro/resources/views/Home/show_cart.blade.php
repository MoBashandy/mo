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
      <link rel="stylesheet" type="text/css" href="Home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="Home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="Home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="Home/css/responsive.css" rel="stylesheet" />
      <style type="text/css">
        .center{
            margin: auto;
            width: 60%;
            text-align: center;
            padding: 30px;
        }
        table,th,td{
         border: 1px solid black;
        }
        .th_deg{
         font-size: 30px;
         padding: 5px;
         background: skyblue;
        }
        .img_deg{
            height: 200px;
            width: 200px;
        }
        .total{
            font-size: 20px;
            padding: 40px;

        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('Home.header')
         <!-- end header section -->

      {{-- </div> --}}

      <div class="center">
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button class="close" typy="button" data-dismiss="alert" eria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
        @endif
        <table>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Product Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>
            <?php
             $total_price=0;
            ?>
            @foreach ($cart as $cart)
            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>${{$cart->price}}</td>
                <td><img class="img_deg" src="product/{{$cart->image}}" alt=""></td>
                <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{url('remove_cart',$cart->id)}}">Remove Product</a></td>
            </tr>
            <?php
            $total_price += $cart->price;
            ?>
            @endforeach
        </table>
        <div>
            <h1 class="total">
                Total Price : ${{$total_price}}
            </h1>
        </div>
      </div>

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="Home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="Home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="Home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="Home/js/custom.js"></script>
   </body>
</html>
