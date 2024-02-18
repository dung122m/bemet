@extends('web.master.main')

@section('title')
        Create Order - Bemet - Butcher & Meat 

@endsection

@section('main')
<section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Create Order</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route("home.index") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create Order</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="shop-area shop-bg" data-background="uploads/bg/shop_bg.jpg">
                <div class="contact-wrap">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-md-8">
                                <table class="table">
                              <thead>
                                    <tr>
                                          <th>ID</th>
                                          <th>Product name</th>
                                          <th>Product Price</th>
                                          <th>Image</th>
                                          <th class="text-center">Quantity</th>
                                          
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($carts as $item)
                                    <tr>
                                          <td scope="row">{{ $loop->index + 1 }}</td>
                                          <td >{{ $item->products->name }}</td>
                                          <td >{{  number_format( $item->price,0) }} VND</td>
                                          <td ><img src="uploads/product/{{ $item->products->image }}" alt="" height="80px"></td>
                                          <td class="text-center">
                                                {{ $item->quantity }}
                                                        
                                          </td>
                                          
                                          
                                          
                                    </tr>
                                        
                                    @endforeach
                              </tbody>
                        </table>
                            </div>
                        <div class="col-md-4">
                                <form  action="" method="POST">
                                        @csrf
                                        <div class="contact-form-wrap">
                                            <div class="form-grp">
                                                <input name="name" type="text" placeholder="Your Name *" required autofocus value="{{ $auth->name }}">
                                            </div>
                                            <div class="form-grp">
                                                <input name="email" type="email" placeholder="Your Email *" required
                                                value="{{ $auth->email }}"
                                                >
                                            </div>
                                            <div class="form-grp">
                                                <input name="phone" type="text" placeholder="Your Phone *" required
                                                value="{{ $auth->phone }}">
                                            </div>
                                             <div class="form-grp">
                                                <input name="address" type="text" placeholder="Your Address *" required value="{{ $auth->address }}">
                                            </div>
                                             
                                           
                                            <button type="submit">Create</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

@endsection