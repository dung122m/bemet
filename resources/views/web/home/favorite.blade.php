@extends('web.master.main')

@section('title')
        Wishlist  - Bemet - Butcher & Meat 

@endsection

@section('main')
      <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title"> Wishlist</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route("home.index") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
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
                <div class="container custom-container-five">
                    <div class="shop-inner-wrap">
                        <div class="row">
                            <div class="col-xl-9 col-lg-8">
                                
                                <div class="shop-item-wrap">
                                    <div class="row">
                                        @foreach ($favorites as $item)
                                            <div class="col-xl-4 col-md-6">
                                            <div class="product-item-three inner-product-item">
                                                <div class="product-thumb-three">
                                                    <a href="{{ route("home.product",$item->products->id) }}"><img src="uploads/product/{{ $item->products->image }}" alt=""></a>
                                                    <span class="batch">New<i class="fas fa-star"></i></span>
                                                </div>
                                                <div class="product-content-three">
                                                    
                                                    <h2 class="title"><a href="{{ route("home.product",$item->products->id) }}">{{ $item->products->name }}</a></h2>
                                                    <span class=""><s>{{number_format( $item->products->price,0) }} VND</s> </span>
                                                    <h6 class="price">{{number_format( $item->products->sale_price,0) }} vnd</h6>
                                                    
                                                    
                                                    <br>
                                                    @if(auth('customers')->check())
                                            <div class="favorite-icon">
                                                @if ($item->products->favorited)
                                                    <a onclick="return confirm('Do you want to remove the product from your wishlist? ')" href="{{ route("home.product.favorite",$item->products->id) }}"><i class="fas fa-heart fa-2x" style="color: #f51414;"></i></a>
                                                @else
                                                <a href="{{ route("home.product.favorite",$item->products->id) }}"><i class="far fa-heart fa-2x"></i></a>
                                                @endif
                                            
                                            
                                        </div>
                                        @endif
                                                </div>
                                                <div class="product-shape-two">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 303 445" preserveAspectRatio="none">
                                                        <path d="M319,3802H602c5.523,0,10,5.24,10,11.71l-10,421.58c0,6.47-4.477,11.71-10,11.71H329c-5.523,0-10-5.24-10-11.71l-10-421.58C309,3807.24,313.477,3802,319,3802Z" transform="translate(-309 -3802)" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4">
                                <div class="shop-sidebar">
                                    
                                    
                                    
                                    <div class="shop-widget">
                                        <h4 class="sw-title">instagram</h4>
                                        <div class="sidebar-instagram">
                                            <ul class="list-wrap">
                                                <li>
                                                    <a href="#"><img src="uploads/product/s_insta_img01.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a href="#"><img src="uploads/product/s_insta_img02.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a href="#"><img src="uploads/product/s_insta_img03.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a href="#"><img src="uploads/product/s_insta_img04.jpg" alt=""></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- shop-area-end -->

        </main>
@endsection