
<div>Dear {{ $order->customer->name }},</div>
<div>
Thank you for placing an order with Bemet. We are pleased to confirm the receipt of your order, dated {{$order->created_at}}.

</div>
<div>Order details:</div>
<table border="1" cellpadding="5" cellspacing="0">
  <tr>
    <th>ID</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Sub total</th>
  </tr>
  <?php $total = 0 ?>
  @foreach ($order->orderDetail as $item)
    <tr>
    <th>{{ $loop->index + 1 }}</th>
    <th>{{ $item->product->name }}</th>
    <th>{{ $item->price }}</th>
    <th>{{ $item->quantity }}</th>
    <th>{{ number_format($item->price * $item->quantity) }}</th>
  </tr>
  <?php
    $total += $item->price * $item->quantity;
  ?>

  @endforeach

</table>
<br>
<div>Total : {{ number_format($total) }} VND</div>
<div>Phone number {{ $order->phone }} </div>
<div>Delivery Address: {{ $order->address }}</div>
<div>
To confirm your order, please <a href="{{ route("order.verify",$token) }}">click here</a> . Your action is necessary to finalize the transaction and ensure the prompt processing of your request. By clicking the provided link, you acknowledge and confirm the details of your order, including item selection, quantity, and delivery information. This confirmation step helps us maintain accuracy and efficiency in fulfilling your order. 
</div> 


<div>
    We appreciate the trust you have placed in us and aim to provide you with the highest quality of service. If you have any questions or need further assistance, please do not hesitate to contact our customer service team at dungtran122cq@gmail.com or. Thank you for choosing Bemet. We value your business and look forward to serving you again.
</div>

<div>Warm regards,</div>


 <div>Bemet</div>
<div>dungtran122cq@gmail.com</div>