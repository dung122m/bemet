@extends('admin.master.main')

@section('title')
   Order Detail
@endsection

@section('content')

<div class="box-body">
        <div class="row">
            <div class="col-lg-12">
<h4>Customer Information</h4>
<table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $customer->name }}</td>
                                    
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $customer->phone }}</td>
                                    
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $customer->address }}</td>
                                    
                                </tr>
                            </thead>
                        </table>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                                          
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Sub total</th>
                             
            </tr>
        </thead>
        @foreach ($order->orderDetail as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td><img src="uploads/product/{{ $item->product->image }}" height="50px" alt=""></td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price,0) }} VND</td>
                <td>{{ number_format( $item->price * $item->quantity,0)}}</td>
            </tr>
        @endforeach
    </table>
    <br>
   <h4>Total: {{number_format($order->totalAmount ,0) }} VND</h4> 
        </div>
              
    </div>
  </div>
@endsection