@extends('web.master.main')

@section('title')
      Order Detail  - Bemet - Butcher & Meat 

@endsection

@section('main')
      <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Order Detail</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route("home.index") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- shop-area -->
            <section class="shop-area shop-bg" data-background="uploads/bg/shop_bg.jpg">
                <div class="contact-wrap">
                  <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                        <h4>Customer Information</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $order->name }}</td>
                                    
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $order->phone }}</td>
                                    
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $order->address }}</td>
                                    
                                </tr>
                            </thead>
                        </table>
                    </div>
                        <div class="col-lg-6">
                            <h4>Delivery Information</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $auth->name }}</td>
                                    
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $auth->phone }}</td>
                                    
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $auth->address }}</td>
                                    
                                </tr>
                            </thead>
                        </table>
                        </div>
                    </div>
                        

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
                             <tbody>
                               
                                @foreach ($order->orderDetail as $item)
                                    <tr>
                                    <td>{{$loop->index + 1 }}</td>
                                    <td>
                                        <img src=" uploads/product/{{ $item->product->image }}" alt="" height="50px">
                                    </td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->price,0) }} VND</td>
                                    <td>{{ number_format( $item->price * $item->quantity) }} VND </td>
                                </tr>
                                @endforeach
                                
                             </tbody>
                        </table>
                        
                            
                                
                  </div>
                </div>
            </section>
            <!-- shop-area-end -->

        </main>
@endsection