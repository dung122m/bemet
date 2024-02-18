@extends('web.master.main')

@section('title')
      Orders  - Bemet - Butcher & Meat 

@endsection

@section('main')
      <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Orders</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route("home.index") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
                        
                        <table class="table">
                              <thead>
                                    <tr>
                                          <th>ID</th>
                                          
                                          <th>Total Price</th>
                                          <th>Created at</th>
                                          <th class="text-center">Status</th>
                                          
                                          <th class="text-center">Action</th>
                                          
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($orders as $item)
                                    <tr>
                                          <td scope="row">{{ $loop->index + 1 }}</td>
                                          
                                          <td > {{  number_format($item->totalAmount,0 ) }} VND</td>



                                          <td >{{ $item->created_at->format('Y-m-d ') }}</td>
                                         
                                          <td class="text-center">
                                                {{ $item->status == 1 ? "Confirmed" : "Unconfirmed" }}
                                          </td>
                                          <td class="text-center">
                                                
                                                <a href="{{ route("order.detail",$item->id) }}" class="btn btn-primary ">Detail</a>
                                                
                                          </td>
                                          
                                          
                                    </tr>
                                        
                                    @endforeach
                              </tbody>
                        </table>
                        
                            <div class="text-center">
                              <a href="{{ route("cart.clear") }}" onclick="return confirm('Are you want to reset your cart ?') " class="btn btn-primary mr-10"> <i class="fa fa-trash mr-10"></i> Reset cart</a>
                              <a href="{{ route("order.create") }}" class="btn btn-success">Create Order</a>
                        </div>
                                
                  </div>
                </div>
            </section>
            <!-- shop-area-end -->

        </main>
@endsection