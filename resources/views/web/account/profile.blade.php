@extends('web.master.main')

@section('title')
    Profile - Bemet - Butcher & Meat 
@endsection

@section('main')
     <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">Profile</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route("home.index") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                                        <h2 class="title">Edit your <span>profile</span></h2>
                                    </div>
                                    
                                    <form id ="registerForm" action="{{ route("account.check_profile") }}" method="POST">
                                        @csrf
                                        <div class="contact-form-wrap">
                                            <div class="form-grp">
                                                <input name="name" type="text" value="{{ $profile->name }}" >
                                            </div>
                                            <div class="form-grp">
                                                <input name="email" type="email" value="{{ $profile->email }}" readonly>
                                            </div>
                                            <div class="form-grp">
                                                <input name="phone" type="text" value="{{ $profile->phone }}">
                                            </div>
                                             <div class="form-grp">
                                                <input name="address" type="text" value="{{ $profile->address }}">
                                            </div>
                                             <div class="form-grp">
                                                <div class="mb-3">
                                                        <select class="form-select" name="gender" id="">
                                                            <option class="select-one" disabled>Select one *</option>
                                                            <option value="1" {{ $profile->gender == 1 ? 'selected' : '' }}>Male</option>
                                                            <option value="0" {{ $profile->gender == 0 ? 'selected' : '' }}>Female</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="form-grp">
                                                <input name="password" type="password" placeholder="Your Password *" required>
                                                
                                            </div>
                                           
                                           
                                            <button type="submit">Update profile</button>
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