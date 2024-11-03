@extends('front.layout')
@section('content')

    @include('front.partials.preloader')
    <section class="contact-section overhid ralt section-padding">
        <div class="container">
            <!-- Back Arrow -->
            <div class="back-arrow mb-3">
                <a href="javascript:history.back()" class="text-dark">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>

            <!-- Section Title -->
            <div class="section-title">
                <h2 class="mb-40 wow fadeInUp" data-wow-duration="3s">
                    Please Enter Your Information to Continue
                </h2>
            </div>

            <!-- Form Section -->
            <div class="row g-4 justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-8">
                    <div class="contact-right wow fadeInDown" data-wow-duration="1.3s" data-wow-delay=".3s">
                        <form action="{{ route('test') }}" id="login-form" method="POST">
                            @csrf
                            <!-- Hidden Inputs for Package Details -->
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <input type="hidden" name="package_price" value="{{ $package->price }}">
                            <input type="hidden" name="package_unit" value="{{ $package->unit }}">
                            <div class="row g-4">
                                <!-- Email Field -->
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <input type="text" name="email" id="email" placeholder="Email Address" required>
                                        <div class="icon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Field -->
                                <div class="col-lg-12">
                                    <div class="form-clt">
                                        <input type="password" name="password" id="password" placeholder="Password" required>
                                        <div class="icon">
                                            <i class="far fa-lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-lg-12">
                                    <button type="submit" class="theme-btn">Continue<i class="fa-solid fa-angles-right"></i></button>
                                </div>
                            </div>
                        </form>
                        <p class="form-message"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
