@extends('front.layout')
@section('content')

       @include('front.partials.preloader')

        <!-- Header Top Section Here -->
        @include('front.partials.header')

        <!-- Menu Sidebar Section Start -->
       @include('front.partials.menu_sidebar')

        <!-- Sidebar Area Here -->
        <div id="targetElement" class="side_bar slideInRight side_bar_hidden">
            <div class="side_bar_overlay"></div>
            <div class="logo mb-50">
                <img src="front/assets/img/logo/footer-logo.png" alt="logo">
            </div>
            <p>
                Quis autem veumure repreh volu tate velit esse niholestiae conseua veillum dolorem eum fugiat voluta nulla pariatur systems ways
            </p>
            <div class="info mt-50">
                <div class="icon__item">
                    <div class="icon">
                        <i class="far fa-map-marker-alt"></i>
                    </div>
                    <div class="content">
                        <p>Location</p>
                        <h6>Main Street, Melbourne, Australia</h6>
                    </div>
                </div>
                <div class="icon__item">
                    <div class="icon">
                        <i class="fal fa-envelope"></i>
                    </div>
                    <div class="content">
                        <p>Email Address</p>
                        <h6>Support@gmail.com</h6>
                    </div>
                </div>
                <div class="icon__item">
                    <div class="icon">
                        <i class="far fa-phone"></i>
                    </div>
                    <div class="content">
                        <p>Make A Call</p>
                        <h6>+000 (123) 456 88</h6>
                    </div>
                </div>
                <div class="icon__item">
                    <div class="icon">
                        <i class="fal fa-clock"></i>
                    </div>
                    <div class="content">
                        <p>Opening Hours:</p>
                        <h6>Mon-Fri 8am-5pm</h6>
                    </div>
                </div>
            </div>
            <div class="single-gallery mt-40">
                <div class="gallery-wrap">
                    <div class="gallery-item">
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery1.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery2.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery3.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery4.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery5.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery6.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button id="closeButton" class="text-white"><i class="fas fa-times"></i></button>
        </div>

        <div class="breadcrumb-wrapper" data-background="front/assets/img/breadcrumb/breadcrumb.jpg">
            <div class="container">
                <div class="page-heading center">
                    <h1>Our projects</h1>
                    <ul class="breadcrumb-items">
                        <li>
                            <a href="index.html">
                            Home
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-chevron-double-right"></i>
                        </li>
                        <li>
                            projects
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @include('front.partials.project')
        @include('front.partials.brands')
        @if(isset($testimonials) && $testimonials->isNotEmpty())
         <section class="testimonial-section ralt section-padding pt-0 mt-4">
            <div class="shape float-bob-y">
                <img src="front/assets/img/about/arrow-shape.png" alt="shape-img">
            </div>
            <div class="bg-shape">
                <img src="front/assets/img/service/bg-shape.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="section-title">
                    <span class="color-style-2 wow fadeInUp">
                    {{!empty($siteData->testimonial_title) ? $siteData->testimonial_title : ''}}
                    </span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    {{!empty($siteData->testimonial_subtitle) ? $siteData->testimonial_subtitle : ''}}
                    </h2>
                </div>
                <div class="single-testimonial-style-2">
                    <div class="swiper testimonial-slide-2">
                        <div class="swiper-wrapper">

                           @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="single-testimonial-items-2">
                                    <div class="ratting-items">
                                        <div class="quote-icon">
                                            <img src="front/assets/img/testimonial/quote.png" alt="icon-img">
                                        </div>
                                        <div class="client-ratting">
                                            <h5>Quality Services</h5>
                                            <ul>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text">
                                    {{!empty($testimonial->message) ? $testimonial->message : ''}}
                                    </p>
                                    <div class="client-info">
                                        <div class="image">
                                            <img src="{{!empty($testimonial->image) ? asset('admin/testimonial_image/' . $testimonial->image) : '' }}" alt="client-img">
                                        </div>
                                        <div class="content">
                                            <h3>
                                            {{!empty($testimonial->name) ? $testimonial->name : ''}}
                                            </h3>
                                            <p>
                                            {{!empty($testimonial->role) ? $testimonial->role : ''}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-dot color-style-two border-style center pt-5">
                            <div class="dot"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif




    <!-- Footer Section Here -->
    @include('front.partials.footer')

@endsection