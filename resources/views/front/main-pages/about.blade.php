@extends('front.layout')
@section('content')

       @include('front.partials.preloader')

        <!-- Header Top Section Here -->
        <header class="main-header main-header-1">
            <div class="main-logo">
                <a href="/home">
                <img src="{{!empty($siteData->header_logo) ? asset('admin/logo/' . $siteData->header_logo) : '' }}" alt="logo-image">
                </a>
            </div>
            <div class="main-button">
                <a href="/packages" class="theme-btn header-btn">
                Get Started
                </a>
            </div>
            <div class="containr">
                <div class="header-top ralt">
                    <div class="container">
                        <div class="top-header-items">
                            <ul class="contact-list">
                            <li>
                                <i class="far fa-envelope"></i>
                                @isset($contacts->email)
                                    <a style = "color:white;" href="mailto:{{ $contacts->email }}">{{ $contacts->email }}</a>
                                @endisset
                            </li>
                            @isset($contacts->adress)
                                <li>
                                    <i class="far fa-map-marker-alt"></i> {{!empty($contacts->adress) ? $contacts->adress : ''}}
                                </li>
                            @endisset
                            </ul>
                            <div class="header-right">
                                <ul class="contact-list">
                                    <li>
                                        <i class="fal fa-clock"></i>24/7
                                    </li>
                                </ul>
                                <ul class="social-icon">
                                  @isset($siteData->facebook_url)
                                    <li>
                                        <a href="{{$siteData->facebook_url}}"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    @endisset

                                    @isset($siteData->twitter_url)
                                    <li>
                                        <a href="{{$siteData->twitter}}"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    @endisset
                                    @isset($siteData->linkden_url)
                                    <li>
                                        <a href="{{$siteData->linkden_url}}"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    @endisset
                                    @isset($siteData->youtube_url)
                                    <li>
                                        <a href="{{$siteData->youtube_url}}"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    @endisset
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Nav Menu Start -->
                <div class="header-menu-area sticky-header">
                    <div class="container">
                        <div class="header-menu-items">
                            <div class="row align-items-center">
                                <div class="col-xl-9 col-lg-9 col-md-6">
                                    <div class="logo-1">
                                        <a href="/home">
                                            <img src="{{!empty($siteData->header_logo) ? asset('admin/logo/' . $siteData->header_logo) : '' }}" alt="logo-img">
                                        </a>
                                    </div>
                                    <div class="menu">
                                        <div class="sticky-logo">
                                            <a href="/home">
                                                <img src="{{!empty($siteData->header_logo) ? asset('admin/logo/' . $siteData->header_logo) : '' }}" alt="logo-img">
                                            </a>
                                        </div>
                                        <nav id="main-menu" class="main-menu">
                                            <ul>
                                                <li class="active">
                                                    <a href="/">Home</a>
                                                </li>
                                                <li><a href="/about">About Us</a></li>
                                                <li><a href="/service">Service</a></li>
                                                <li><a href="/project">Projects</a></li>
                                                <li><a href="/packages">Pricing</a></li>
                                                <li >
                                                    <a href="/news">News</a>
                                                </li>
                                                <li><a href="/contact">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6">
                                    <div class="menu-components">
                                        <div class="contact-info-items">
                                            <div class="icon">
                                                <i class="far fa-phone-volume"></i>
                                            </div>
                                            @if(!empty($contacts->phone))
                                                <div class="content">
                                                    <p>Urgent Call</p>
                                                    <h6><a href="tel:{{ $contacts->phone }}">{{ $contacts->phone }}</a></h6>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="header-dots">
                                            <button id="openButton">
                                                <img src="{{asset('front/assets/img/logo/bar.png')}}" alt="dots">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mobile-menu-bar d-xl-none text-end">
                                        <a href="#" class="mobile-menu-toggle-btn"><i class="fal fa-bars"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Menu Sidebar Section Start -->
       @include('front.partials.menu_sidebar')

        <!-- Sidebar Area Here -->
         @if(isset($contacts))
        <div id="targetElement" class="side_bar slideInRight side_bar_hidden">
            <div class="side_bar_overlay"></div>
            <div class="logo mb-50">
                <img src="{{!empty($siteData->footer_logo) ? asset('admin/logo/' . $siteData->footer_logo) : '' }}" alt="logo">
            </div>
            @if(!empty($contacts->top_desc))
            <p>
                {{$contacts->top_desc}}
            </p>
            @endif
            <div class="info mt-50">
                <div class="icon__item">
                    <div class="icon">
                        <i class="far fa-map-marker-alt"></i>
                    </div>
                    <div class="content">
                        <p>Location</p>
                        <h6>{{$contacts->adress}}</h6>
                    </div>
                </div>
                <div class="icon__item">
                    <div class="icon">
                        <i class="fal fa-envelope"></i>
                    </div>
                    <div class="content">
                        <p>Email Address</p>
                        <h6><a style ="color:white;" href="tel:{{ $contacts->email }}">{{ $contacts->email }}</a></h6>
                    </div>
                </div>
                <div class="icon__item">
                    <div class="icon">
                        <i class="far fa-phone"></i>
                    </div>
                    <div class="content">
                        <p>Make A Call</p>
                        <h6><a style ="color:white;" href="tel:{{ $contacts->phone }}">{{$contacts->phone}}</a></h6>
                    </div>
                </div>
                <div class="icon__item">
                    <div class="icon">
                        <i class="fal fa-clock"></i>
                    </div>
                    <div class="content">
                        <p>Opening Hours:</p>
                        <h6>24/7</h6>
                    </div>
                </div>
            </div>
            <button id="closeButton" class="text-white"><i class="fas fa-times"></i></button>
        </div>
        @endif

        <div class="breadcrumb-wrapper" data-background="front/assets/img/breadcrumb/breadcrumb.jpg">
            <div class="container">
                <div class="page-heading center">
                    <h1>About us</h1>
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
                            about
                        </li>
                    </ul>
                </div>
            </div>
        </div>

         <!-- About Section Here -->
         <section class="about-section fix section-padding">
            <div class="container">
                <div class="single-about-1">

                    <div class="row">
                    @if(isset($aboutData) && isset($siteData))
                        <div class="col-xl-5 col-lg-6 wow tpfadeLeft" data-wow-delay=".4s">
                            <div class="about-image">
                                <img src="{{ !empty($aboutData->about_image) ? asset('admin/about_image/' . $aboutData->about_image) : '' }}" alt="about-img">
                                <div class="client-img">
                                    <img src="{{!empty($aboutData->quote_image) ? asset('admin/about_image/' . $aboutData->quote_image) : '' }}" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 mt-5 mt-lg-0 wow tpfadeRight" data-wow-delay=".8s">
                            <div class="about-content">
                                <div class="section-title-content">
                                    <span>
                                    {{!empty($siteData->about_title) ? $siteData->about_title : ''}}
                                    </span>
                                    <h2>
                                       {{!empty($aboutData->subtitle) ? $aboutData->subtitle : ""}}
                                    </h2>
                                </div>

                                
                                <h3>
                                    {{!empty($aboutData->normal_text) ? $aboutData->normal_text : ""}} <a href="/about">{{!empty($aboutData->highlighted_text) ? $aboutData->highlighted_text : "" }}</a>
                                </h3>
                                <p class="text">
                                   {{!empty($aboutData->content) ? $aboutData->content : ""}}
                                </p>
                                @if(!empty($aboutData->project_completed) || !empty($aboutData->years_of_experience || !empty($aboutData->about_button_name)))
                                <div class="about-info mt-5">
                                    <a href="about.html" class="theme-btn bg-style-2">{{$aboutData->about_button_name}}</a>
                                    <!-- <div class="customer-img">
                                        <img src="front/assets/img/about/customer.jpg" alt="customer-img">
                                        <h6>
                                            5m+ Trusted <br>
                                            Global Customers
                                        </h6>
                                    </div> -->
                                </div>
                                

                                <div class="counter-item">
                                    <div class="counter-box">
                                        <h2><span class="count">{{$aboutData->project_completed}}</span>k+</h2>
                                        <p>Project Complete</p>
                                    </div>
                                    <div class="counter-box">
                                        <h2><span class="count">{{$aboutData->years_of_experience}}</span>+</h2>
                                        <p>Years Of Experience</p>
                                    </div>
                                </div>
                                @endif
                               
                            </div>

                            @else
                            <div class="col-12 text-center">
                                <h1 style ="color:black;">No About section available</h1>
                            </div>
                            @endif
                        </div>
                   
                    </div>
                </div>
            </div>
        </section>

         <!-- @if(isset($why_us) && $why_us->isNotEmpty())
         <section class="about-section ralt fix section-padding">
            <div class="shape float-bob-y">
                <img src="front/assets/img/about/arrow-shape.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="section-title width-style">
                    <span class="color-style-2 wow fadeInUp">
                    Who We Are
                    </span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        Infinite IT Services Unlocking Limitless 
                        Possibilities for Your Business Artificial Intelligence
                        Company That Excels Problem Solutions
                    </h2>
                </div>
                <div class="single-about-wrapper-2">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="about-image-item ralt">
                                <div class="circle-shape">
                                    <img src="front/assets/img/about/circle-shape.png" alt="shape-img">
                                </div>
                                <div class="bg-shape">
                                    <img src="front/assets/img/about/bg-shape.png" alt="shape-img">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="about-image-1">
                                            <img src="{{ !empty($aboutData->about_image) ? asset('admin/about_image/' . $aboutData->about_image) : '' }}" alt="about-img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="about-image-2">
                                            <img src="{{!empty($aboutData->quote_image) ? asset('admin/about_image/' . $aboutData->quote_image) : '' }}" alt="about-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 mt-5 mt-lg-0">
                            <div class="about-content">
                                <p class="text  wow fadeInUp">
                                    Feel free to reach out to us <a href="about.html">through contact information</a> provided below, and one of our representatives will get back to you as soon as
                                    possible. Thank you for your interest in <a href="about.html">Finland</a>. 
                                </p>
                                @foreach($why_us as $why)
                                <div class="single-system-item wow fadeInUp" data-wow-delay=".3s">
                                    <div class="icon">
                                        <img src="{{!empty($why->icon) ? asset('admin/why_image/' . $why->icon) : '' }}" alt="icon-img">
                                    </div>
                                    <div class="content">
                                        <h4>
                                        {{!empty($why->title) ? $why->title : ''}}
                                        </h4>
                                        <p>
                                        {{!empty($why->desc) ? $why->desc : ''}}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         @endif -->
         @if(isset($services) && $services->isNotEmpty())
         <section class="service-section  section-padding pt-0">
            <div class="bg-shape">
                <img src="front/assets/img/service/bg-shape.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="section-title">
                    <span class="color-style-2 wow fadeInUp">
                    {{!empty($siteData->service_title) ? $siteData->service_title : ''}}
                    </span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    {{!empty($siteData->service_subtitle) ? $siteData->service_subtitle : ''}}
                    </h2>
                </div>
                <div class="row">
                 @foreach($services as $service)
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="single-service-style-2 active center">
                            <div class="icon">
                                <img src="{{!empty($service->icon) ? asset('admin/service_image/' . $service->icon) : '' }}" alt="icon-img">
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="service-details.html">
                                    {{!empty($service->name) ? $service->name : ''}}
                                    </a>
                                </h3>
                                <p>
                                {{!empty($service->content) ? $service->content : ''}}
                                </p>
                                <a href="service-details.html" class="theme-btn-2 color-style-2 mt-3">
                                {{!empty($service->button_text) ? $service->button_text : ''}}<i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </section>
         @endif

         @if(isset($testimonials) && $testimonials->isNotEmpty())
         <section class="testimonial-section ralt section-padding pt-0">
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
         <footer class="footer-wrapper section-bg section-padding pb-0">
            <div class="dot-shape">
                <img src="{{asset('front/assets/img/footer/dot-shape.png')}}" alt="dot-img">
            </div>
            <div class="arrow-shape-2 wow tpfadeLeft" data-wow-delay=".3s">
                <img src="{{asset('front/assets/img/footer/arrow-shape2.png')}}" alt="arrow-img">
            </div>
            <div class="arrow-shape wow tpfadeRight" data-wow-delay=".3s">
                <img src="{{asset('front/assets/img/footer/arrow-shape.png')}}" alt="arrow-img">
            </div>
            <div class="container">
                <div class="cta-banner-style-1 wow fadeInUp">
                    <div class="cta-banner" data-background="{{!empty($siteData->cta_image) ? asset('admin/cta_image/' . $siteData->cta_image) : '' }}">
                        <div class="section-title-content mb-0">
                            <span class="text-white">
                            {{$siteData->cta_title}}
                            </span>
                            <h2>
                                {{$siteData->cta_subtitle}}
                            </h2>
                        </div>
                        <a href="/project" class="theme-btn bg-style-3">
                        Get Started
                        </a>
                    </div>
                </div>
                <div class="footer-top section-padding">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                            <div class="single-footer-widget">
                                <div class="widget-head">
                                    <a href="index.html">
                                    <img src="{{!empty($siteData->footer_logo) ? asset('admin/logo/' . $siteData->footer_logo) : '' }}" alt="footer-logo">
                                    </a>
                                </div>
                                <p>
                                   {{$siteData->footer_desc}}
                                </p>
                                <ul class="social-icon">
                                    @isset($siteData->facebook_url)
                                    <li>
                                        <a href="{{$siteData->facebook_url}}"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    @endisset

                                    @isset($siteData->twitter_url)
                                    <li>
                                        <a href="{{$siteData->twitter}}"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    @endisset
                                    @isset($siteData->linkden_url)
                                    <li>
                                        <a href="{{$siteData->linkden_url}}"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    @endisset
                                    @isset($siteData->youtube_url)
                                    <li>
                                        <a href="{{$siteData->youtube_url}}"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    @endisset
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 ps-sm-5 wow fadeInUp" data-wow-delay=".4s">
                            <div class="single-footer-widget">
                                <div class="widget-head">
                                    <h4>
                                        Links
                                    </h4>
                                </div>
                                <ul class="list">
                                    <li>
                                        <a href="/home">
                                        <i class="fas fa-chevron-double-right"></i>
                                        Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/about">
                                        <i class="fas fa-chevron-double-right"></i>
                                        About
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/service">
                                        <i class="fas fa-chevron-double-right"></i>
                                        Services
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="/news">
                                        <i class="fas fa-chevron-double-right"></i>
                                        Latest News
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 ps-sm-0 wow fadeInUp" data-wow-delay=".6s">
                            <div class="single-footer-widget">
                                <div class="widget-head">
                                    <h4>
                                        Recent News
                                    </h4>
                                </div>
                                @if(isset($footer_news) && $footer_news->isNotEmpty())
                                @foreach($footer_news as $blog)
                                <div class="single-post-items">
                                    <div class="post-image">
                                        <img style ="height:50px; width:50px;" src="{{!empty($blog->image) ? asset('admin/blog_image/' . $blog->image) : '' }}" alt="post-img">
                                    </div>
                                    <div class="post-content">
                                        <ul>
                                            <li>
                                                <i class="fal fa-calendar-alt"></i>{{$blog->date}}
                                            </li>
                                        </ul>
                                        <h6>
                                            <a href="news-details.html">
                                            {{$blog->title}}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                            <div class="single-footer-widget">
                                <div class="widget-head">
                                    <h4>
                                        {{$siteData->newsletter_title}}
                                    </h4>
                                </div>
                                <div class="footer-single-newsletter">
                                    <p>
                                        {{$siteData->newsletter_subtitle}}
                                    </p>
                                    <div class="footer-newsletter">
                                        <input type="email" name="EMAIL" placeholder="Email Address" required="">
                                        <button value="submit"> Sign Up </button>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-wrapper d-flex align-items-center justify-content-between">
                        <p class="wow fadeInLeft" data-wow-delay=".3s">
                            {{$siteData->copyright_text}}
                        </p>
                        <ul class="footer-menu wow fadeInRight" data-wow-delay=".4s">
                            <li>
                                <a href="/service">
                                Services
                                </a>
                            </li>
                            <li>
                                <a href="/about">
                                About
                                </a>
                            </li>
                            
                            <li>
                                <a href="/contact">
                                Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="scrollUp" class="scroll-icon">
                    <a href="#">
                    <i class="fas fa-chevron-double-up"></i>
                    </a>
                </div>
            </div>
        </footer>

@endsection



