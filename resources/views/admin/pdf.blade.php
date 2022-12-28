<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        @include('sweetalert::alert')
        Customer Name: <h1>{{ $order->name }}</h1>
        Customer Email: <h1>{{ $order->email }}</h1>
        Customer Phone: <h1>{{ $order->phone }}</h1>
        Customer Address: <h1>{{ $order->address }}</h1>
        Customer Product : <h1>{{ $order->product_title }}</h1>
        Customer Product Quantity: <h1>{{ $order->product_quantity }}</h1>
        Customer Product Price: <h1>${{ $order->product_price }}</h1>
        Customer Payment Status: <h1>{{ $order->payment_status }}</h1>
        Customer Delivery Status: <h1>{{ $order->delivery_status }}</h1>
        Product Image: <br>
        <img src="/product/{{ $order->product_image }}" style="width: 450px; height: 250px" alt="">
    </body>
</html>
