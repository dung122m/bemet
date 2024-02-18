@extends('web.master.main')

@section('title')
   Register - Bemet - Butcher & Meat 
@endsection
@section('main')
     <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Register</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route("home.index") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Register</li>
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
                                        <h2 class="title">Create your <span>account</span></h2>
                                    </div>
                                    
                                    <form id ="registerForm" action="{{ route("account.check_register") }}" method="POST">
                                        @csrf
                                        <div class="contact-form-wrap">
                                            <div class="form-grp">
                                                <input name="name" type="text" placeholder="Your Name *" required autofocus>
                                            </div>
                                            <div class="form-grp">
                                                <input name="email" type="email" placeholder="Your Email *" required>
                                            </div>
                                            <div class="form-grp">
                                                <input name="phone" type="text" placeholder="Your Phone *" required>
                                            </div>
                                             <div class="form-grp">
                                                <input name="address" type="text" placeholder="Your Address *" required>
                                            </div>
                                             <div class="form-grp">
                                                <div class="mb-3">
                                                    
                                                    <select
                                                        class="form-select"
                                                        name="gender"
                                                        id=""
                                                    >
                                                        <option selected class="select-one">Select one *</option>
                                                        <option value="1">Male</option>
                                                        <option value="0">Female</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="form-grp">
                                                <input name="password" type="password" placeholder="Your Password *" required>
                                            </div>
                                            <div class="form-grp">
                                                <input name="confirm-password" type="password" placeholder="Re-enter Your Password *" required>
                                            </div>
                                           
                                            <button type="submit">Register</button>
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

<script>
    
    document.addEventListener("DOMContentLoaded", function() {
        var formElement = document.getElementById("registerForm");
        if (formElement) {
            formElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });
</script>