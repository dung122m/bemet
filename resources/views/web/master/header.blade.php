<header class="transparent-header">
            <div class="header-top-wrap">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="header-top-left">
                                <ul class="list-wrap">
                                    <li class="header-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Cam Quang Commune, Cam Xuyen District, Ha Tinh Province
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <a href="mailto:dungtran122cq@gmail.com">dungtran122cq@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <div class="header-top-right">
                                <div class="header-top-menu">
                                    <ul class="list-wrap">
                                        @if(auth("customers")->user())
                                            <li><a href="{{ route("account.profile") }}"><span style="margin-right: 5px;">Hi, {{ auth("customers")->user()->name }}</span> <i class="fa fa-user"></i></a></li>
                                             <li><a href="{{ route("account.change-password") }}">Change password</a></li>
                                            <li><a href="{{ route("account.logout") }}">Logout</a></li>
                                           
                                        @else
                                            <li><a href="{{ route("account.login") }}">Login</a></li>
                                            <li><a href="{{ route("account.register") }}">Register</a></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="header-top-social">
                                    <ul class="list-wrap">
                                        <li><a href="https://www.facebook.com/dung.tran122/"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.instagram.com/dtrnn12/"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="menu-area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="menu-wrap">
                                <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                                <nav class="menu-nav">
                                    <div class="logo">
                                        <a href="{{ route("home.index") }}"><img src="uploads/logo/logo.png" alt="Logo"></a>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class=""><a href="/">Home</a></li>
                                            <li class=""><a href="about.html">ABOUT US</a></li>
                                            <li class="menu-item-has-children"><a href="#">Category</a>
                                                <ul class="sub-menu">
                                                    @foreach ($categories as $item)
                                                    <li><a href="{{ route("home.category",$item->id) }}">{{ $item->name }}</a></li>
                                                        
                                                    @endforeach
                                                    
                                                </ul>
                                            </li>
                                           

                                            
                                            <li><a href="contact.html">Contact</a></li>
                                           
                                            <li><a href="{{ route('account.wishlist') }}">Wishlist</a></li>
                                            <li><a href="{{ route('order.history') }}">Orders</a></li>
                                            
                                        </ul>
                                    </div>
                                    <div class="header-action d-none d-md-block">
                                        <ul class="list-wrap">
                                            <li class="header-search">
                                                <a href="#"><i class="flaticon-search"></i></a>
                                            </li>
                                            <li class="header-shop-cart">
                                                <a href="{{ route("cart.index") }}">
                                                    <i class="flaticon-shopping-basket"></i>
                                                   
                                                      
                                                    <span>{{ auth('customers')->user()? $cartCount : 0 }}</span>
                                                            
                                                      
                                                      
                                                       
                                                            
                                                </a>
                                            </li>
                                            <li class="header-btn"><a href="tel:0123456789" class="btn">+1 333 555 999</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>

                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <nav class="menu-box">
                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                    <div class="nav-logo">
                                        <a href="index-2.html"><img src="uploads/logo/logo.png" alt="Logo"></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix list-wrap">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu-backdrop"></div>
                            <!-- End Mobile Menu -->

                        </div>
                    </div>
                </div>
            </div>

            <!-- header-search -->
            <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="search-wrap text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Enter your keyword...">
                                        <button class="search-btn"><i class="flaticon-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-backdrop"></div>
            <!-- header-search-end -->

        </header>