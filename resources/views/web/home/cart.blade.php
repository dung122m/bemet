@extends('web.master.main')

@section('title')
      Cart  - Bemet - Butcher & Meat 

@endsection

@section('main')
      <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Cart</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route("home.index") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
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
                                          <th>Product name</th>
                                          <th>Product Price</th>
                                          <th>Image</th>
                                          <th class="text-center">Quantity</th>
                                          <th class="text-center">Action</th>
                                          
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($carts as $item)
                                    <tr>
                                          <td scope="row">{{ $loop->index + 1 }}</td>
                                          <td >{{ $item->products->name }}</td>
                                          <td >{{  number_format( $item->price,0) }} VND</td>
                                          <td ><img src="uploads/product/{{ $item->products->image }}" alt="" height="100px"></td>
                                          <td class="text-center">
                                                <form action="{{ route("cart.update",$item->product_id) }}" method="get">
                                                      <div class="product-cart-wrap">
                                                            <div class="cart-plus-minus">
                                                                  <input type="text" name="quantity" id="" value = {{ $item->quantity }}>
                                                            </div>
                                                      </div>
                                                

                                                    <button href=""><i class="fa fa-save"></i></button>
                                                </form>
                                          </td>
                                          <td class="text-center">
                                                
                                                <a class="mr-10" onclick = "return confirm('Do you want to remove the product from your cart? ')" href="{{ route("cart.delete",$item->product_id) }}"><i class="fa fa-trash"></i>
                                                </a>
                                                
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