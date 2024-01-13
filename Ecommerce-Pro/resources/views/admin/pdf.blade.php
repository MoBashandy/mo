<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order PDF</title>
</head>
<body>
    <h1>Order Details</h1>
    <h3>Customer Name : {{$order->name}}</h3>
    <h3>Customer Email : {{$order->email}}</h3>
    <h3>Customer Phone : {{$order->phone}}</h3>
    <h3>Customer Address : {{$order->address}}</h3>
    <h3>Customer Id : {{$order->user_id}}</h3>

    <h3>Product Name : {{$order->product_title}}</h3>
    <h3>Product Price : {{$order->price}}</h3>
    <h3>Product Quantity : {{$order->quantity}}</h3>
    <h3>Payment Status : {{$order->payment_statu}}</h3>
    <h3>Product Id : {{$order->product_id}}</h3>

    <img height="250" width="450" src="product/{{$order->image}}" alt="{{$order->product_title}}">
</body>
</html>
