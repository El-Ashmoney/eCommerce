<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Blank Cart Admin">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Info</title>
    </head>
    <body>
        <div class="download_pdf container">
            <div style="margin-bottom: 20px">
                <strong style="margin-right: 20px" class="details_header">Customer Name:</strong>
                <span>{{ $order->name }}</span>
            </div>
            <div style="margin-bottom: 20px">
                <strong style="margin-right: 20px" class="details_header">Customer Email:</strong>
                <span>{{ $order->email }}</span>
            </div>
            <div style="margin-bottom: 20px">
                <strong style="margin-right: 20px" class="details_header">Customer Phone:</strong>
                <span>{{ $order->phone }}</span>
            </div>
            <div style="margin-bottom: 20px">
                <strong style="margin-right: 20px" class="details_header">Customer Address:</strong>
                <span>{{ $order->address }}</span>
            </div>
            <div style="margin-bottom: 20px">
                <strong style="margin-right: 20px" class="details_header">Customer Product:</strong>
                <span>{{ $order->product_title }}</span>
            </div>
            <div style="margin-bottom: 20px">
                <strong style="margin-right: 20px" class="details_header">Customer Product Quantity:</strong>
                <span>{{ $order->product_quantity }}</span>
            </div>
            <div style="margin-bottom: 20px">
                <strong style="margin-right: 20px" class="details_header">Customer Product Price:</strong>
                <span>${{ $order->product_price }}</span>
            </div>
            <div style="margin-bottom: 20px">
                <strong style="margin-right: 20px" class="details_header">Customer Payment Status:</strong>
                <span>{{ $order->payment_status }}</span>
            </div>
            <div style="margin-bottom: 20px">
                <strong style="margin-right: 20px" class="details_header">Customer Delivery Status:</strong>
                <span>{{ $order->delivery_status }}</span>
            </div>
            <div style="margin-bottom: 20px">
                <strong style="margin-right: 20px" class="details_header">Customer Image:</strong>
                <div style="margin-top: 20px">
                    <img class="details_img" src="./product/{{ $order->product_image }}" style="width: 100%; height: 100%; object-fit: contain;" alt="">
                </div>
            </div>
        </div>
    </body>
</html>
