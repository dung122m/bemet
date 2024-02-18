@extends('web.master.main')
@section('title')
   Change password - Bemet - Butcher & Meat  
@endsection
@section('main')
    <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Change password</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route("home.index") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Change password</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- contact-area -->
            <section class="contact-area">
               
                <div class="contact-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="contact-content">
                                    <div class="section-title mb-15">
                                        <h2 class="title">Change <span>Password</span></h2>
                                    </div>
                                    
                                    <form id="loginForm" action="{{ route("account.check_change_password") }}" method="POST">
                                        @csrf
                                        <div class="contact-form-wrap">
                                           
                                           <div class="form-grp">
                                                <input name="current-password" type="password" placeholder="Your current password" required autofocus>
                                                
                                            </div>
                                            <div class="form-grp">
                                                <input name="password" type="password" placeholder="Your new password" required >
                                                
                                            </div>
                                            <div class="form-grp">
                                                <input name="confirm-password" type="password" placeholder="Your confirm password" required >
                                                
                                            </div>
                                           
                                           
                                            <button type="submit">Send</button>
                                        </div>
                                    </form>
                                    <p class="ajax-response mb-0"></p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

    </main>
@endsection