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
      <style type="text/css">
        .center{
            margin: auto;
            width: 65%;
            text-align: center;
            padding: 30px;
        }
        table,th,td{
            border: 1px solid black;
        }
        th{
            padding: 10px;
            background-color: skyblue;
            font-size: 20px;
            font-weight: bold;
        }

      </style>
   </head>
   <body>
         <!-- header section strats -->

         <div class="center">
             @include('Home.header')
             @if(session()->has('message'))
             <div class="alert alert-success">
                 <button class="close" typy="button" data-dismiss="alert" eria-hidden="true">x</button>
                 {{ session()->get('message') }}
                </div>
                @endif
                <table>
                    <tr>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Cancel Order</th>
                    </tr>
                    @foreach ($order as $order)
                    <tr>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivary_status}}</td>
                        <td>
                            <img height="100" width="180" src="product/{{$order->image}}" alt="order">
                        </td>
                        @if ($order->delivary_status == 'processing')
                            <td><a class="btn btn-danger" href="{{url('cancel_order',$order->id)}}"
                            onclick="return confirm('Are You Sure ?')">Cancel Order</a></td>
                        @elseif ($order->delivary_status == 'delivered')
                            <td>delivered</td>
                        @else
                            <td style="color : blue;font-size:18px">Canceled</td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
      <!-- jQery -->
      <script src="{{asset('Home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('Home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('Home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('Home/js/custom.js')}}"></script>
   </body>
</html>
