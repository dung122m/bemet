<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from themegenix.net/html/bemet/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 02:25:48 GMT -->
<head>
        <base href="/">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="Bemet - Butcher & Meat Shop HTML Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		@include('web.master.style')
    </head>
    <body>

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div class="loader">
                    <div class="loader-outter"></div>
                    <div class="loader-inner"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        @include("web.master.header")
        <!-- header-area-end -->


        <!-- main-area -->
       @yield('main')
        <!-- main-area-end -->

        <!-- footer-area -->
        @include("web.master.footer")
        <!-- footer-area-end -->

        <!-- JS here -->
        @include('web.master.script')
    </body>

<!-- Mirrored from themegenix.net/html/bemet/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 02:25:48 GMT -->
</html>
