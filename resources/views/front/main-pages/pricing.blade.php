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
                    <h1>Packages</h1>
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
                            Packages
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <section id="pricing-section"  class="pricing-section fix section-padding section-bg-2">
            <div class="container">
                <!-- Categories Section -->
                <div class="section-title">
                    <span class="wow fadeInUp">
                        {{ $siteData->package_title ?? '' }}
                    </span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        {{ $siteData->package_subtitle ?? '' }}
                    </h2>
                </div>

                <!-- Category Buttons -->
                <div class="category-list text-center">
                    <a href="{{ url()->current() }}#pricing-section" class="theme-btn mt-5 {{ $selectedCategory === 'all' ? 'active' : '' }}">All</a>
                    @foreach($categories as $category)
                        <a href="{{ url()->current() }}?category={{ $category->name }}#pricing-section" 
                        class="theme-btn mt-5 {{ $selectedCategory === $category->name ? 'active' : '' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach

                    <!-- <a href="{{ url()->current() }}?category=app#pricing-section" class="theme-btn mt-5 {{ $selectedCategory === 'app' ? 'active' : '' }}">App</a> -->
                </div>


                <!-- Packages Display -->
                @if($packages->isNotEmpty())
                <div class="row package-list">
                    @foreach($packages as $package)
                    <div class="col-xl-4 col-lg-6 wow fadeInUp package-item" data-wow-delay=".5s">
                        <div class="single-pricing-items {{ $package->is_popular == '1' ? 'active-tag' : '' }}">
                            <div class="icon">
                                <img src="{{ asset('/admin/package_image/' . ($package->icon ?? '')) }}" alt="icon-img">
                            </div>
                            <div class="content">
                                <h3>{{ $package->name ?? '' }}</h3>
                                <p>{{ $package->desc ?? '' }}</p>
                            </div>
                            <div class="price-plan">
                                <h2>{{ $package->unit ?? '' }}{{ $package->price ?? '' }}</h2>
                            </div>
                            <ul>
                                @foreach($package->features as $feature)
                                <li class="{{ $feature->status == '1' ? 'icon' : 'icon-2' }}">
                                    <i class="{{ $feature->status == '1' ? 'fas fa-check' : 'fas fa-times' }}"></i>
                                    {{ $feature->name ?? '' }}
                                </li>
                                @endforeach
                            </ul>
                            <form action="{{ route('checkout') }}" method="POST">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $package->id }}">
                                <button type="submit" class="theme-btn mt-5">Choose Package</button>
                            </form>

                            <div class="contact-options mt-4">
                                <!-- Phone Number -->
                                <a href ="tel:{{$contacts->phone}}" class="phone-number">
                                <i class="far fa-phone-volume"></i>
                                    {{ $contacts->phone ?? 'N/A' }}
                                </a>
                                
                                <!-- Contact Link -->
                                <p class="contact-link">
                                    <a href="/contact" target="_blank">
                                        Contact Us
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="col-12 text-center">
                    <h1 style="color:#fff;">No packages found</h1>
                </div>
                @endif
            </div>
        </section>
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