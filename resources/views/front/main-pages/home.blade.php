@extends('front.layout')
@section('content')

       @include('front.partials.preloader')

        <!-- Header Top Section Here -->
        <header class="main-header main-header-1">
            <div class="main-logo">
                <a href="index.html">
                <img src="{{!empty($siteData->header_logo) ? asset('admin/logo/' . $siteData->header_logo) : '' }}" alt="logo-image">
                </a>
            </div>
            <div class="main-button">
                <a href="contact.html" class="theme-btn header-btn">
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
                                @if(!empty($contacts->email))
                                    <a style = "color:white;" href="mailto:{{ $contacts->email }}">{{ $contacts->email }}</a>
                                @endif
                            </li>
                                <li>
                                    <i class="far fa-map-marker-alt"></i> {{!empty($contacts->adress) ? $contacts->adress : ''}}
                                </li>
                            </ul>
                            <div class="header-right">
                                <ul class="contact-list">
                                    <li>
                                        <i class="fal fa-clock"></i>14/7
                                    </li>
                                </ul>
                                <ul class="social-icon">
                                    <li>
                                        <a href="{{$siteData->facebook_url}}"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{$siteData->twitter_url}}"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{$siteData->linkden_url}}"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{$siteData->youtube_url}}"><i class="fab fa-youtube"></i></a>
                                    </li>
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
                                        <a href="index.html">
                                            <img src="{{!empty($siteData->header_logo) ? asset('admin/logo/' . $siteData->header_logo) : '' }}" alt="logo-img">
                                        </a>
                                    </div>
                                    <div class="menu">
                                        <div class="sticky-logo">
                                            <a href="index.html">
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

        <!-- Hero Section Here -->
        <section class="hero-section hero-1">
            <div class="swiper hero-slider">
                <div class="swiper-wrapper">

                @foreach($images as $image)
                    <div class="swiper-slide">
                        <div class="slide-bg" data-background="{{ asset('admin/banner/' . $image->banner_image) }}">
                            <div data-animation="fadeInRight" data-delay="2.3s" class="arrow-shape">
                                <img src="front/assets/img/hero/arrow-shape.png" alt="arrow-shape">
                            </div>
                            <div data-animation="fadeInRight" data-delay="2.6s" class="arrow-shape-2">
                                <img src="front/assets/img/hero/arrow-shape2.png" alt="arrow-shape">
                            </div>
                            <div class="container">
                                <div class="row g-4">
                                    <div class="col-xl-7 col-lg-7">
                                        <div class="hero-content">
                                            <h1 data-animation="fadeInUp" data-delay="1.3s">
                                            {{!empty($siteData->banner_title) ? $siteData->banner_title : "No banner title added" }}
                                            </h1>
                                            <h3 data-animation="fadeInUp" data-delay="1.5s">
                                            {{ !empty($siteData->banner_sub_title) ? $siteData->banner_sub_title :"No banner sub title added" }}
                                            </h3>
                                            <div class="hero-button">
                                                <a href="contact.html" data-animation="fadeInUp" data-delay="1.7s" class="theme-btn">
                                                {{!empty($siteData->banner_button_name) ? $siteData->banner_button_name : "Get Started" }}
                                                </a>
                                                <div class="d-sm-inline video-play-btn"  data-animation="fadeInUp" data-delay="1.7s">
                                                    <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-popup play-video" tabindex="-1"><i class="fas fa-play"></i></a>  
                                                    <span class="ms-3 d-line">{{!empty($siteData->banner_video_button) ?  $siteData->banner_video_button : "Watch Video" }}</span>                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  @endforeach

                </div>
                <div class="arry-button">
                    <button class="arry-prev hero-arry-prev"><i class="fal fa-arrow-right"></i></button>
                    <button class="arry-next hero-arry-next"><i class="fal fa-arrow-left"></i></button>
                </div>
            </div>
        </section>

        <!-- Feature Section Here -->
        

        <section class="feature-section ralt fix section-bg section-padding">
            <div class="left-shape wow tpfadeLeft" data-wow-delay=".3s">
                <img src="front/assets/img/feature/arrow-shape.png" alt="shape-img">
            </div>
            <div class="left-shape-2 wow tpfadeLeft" data-wow-delay=".5s">
                <img src="front/assets/img/feature/arrow-shape2.png" alt="shape-img">
            </div>
            <div class="right-shape">
                <img src="front/assets/img/feature/dot-shape.png" alt="shape-img">
            </div>
            <div class="container">
                <h6 class="sub-title text-center wow fadeInUp" data-wow-delay=".2s">
                    {{ !empty($siteData->feature_title) ? $siteData->feature_title : "No Title" }}
                </h6>

                <div class="row">
                    @if(isset($companyFeatures) && $companyFeatures->isNotEmpty())
                        @foreach($companyFeatures as $feature)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                <div class="feature-single-box">
                                    <div class="box">
                                        <h5>
                                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </h5>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('admin/companyFeature_image/' . $feature->icon) }}" alt="icon-img">
                                    </div>
                                    <div class="content mt-4">
                                        <h4>
                                            <a href="service-details.html">
                                            {{ !empty($feature->name) ? $feature->name : "" }}
                                            </a>
                                        </h4>
                                        <p>
                                            {{ !empty($feature->desc) ? $feature->desc : "" }} 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <h1 style ="color:white;">No Features Available</h1>
                        </div>
                    @endif
                </div>
            </div>
        </section>

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

        <!-- Service Section Here -->
        <section class="service-section fix section-padding pt-0">
            <div class="service-single-wrapper">
                <div class="container">
                    <div class="section-title">
                        <span class="wow fadeInUp">
                        {{!empty($siteData->service_title) ? $siteData->service_title : 'Title Here'}}
                        </span>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">
                           {{!empty($siteData->service_subtitle) ? $siteData->service_subtitle: 'Subtitle Here'}}
                        </h2>
                    </div>
                    @if(isset($services) && $services->isNotEmpty())
                    <div class="swiper service-wrapper">
                        <div class="swiper-wrapper">
                           @foreach($services as $service)
                            <div class="swiper-slide">
                                <div class="single-service-style-1">
                                    <div class="service-image">
                                        <img src="{{!empty($service->image) ? asset('admin/service_image/' . $service->image) : '' }}" alt="service-img">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex">
                                            <div class="icon">
                                                <img src="{{!empty($service->icon) ? asset('admin/service_image/' . $service->icon) : '' }}" alt="icon-img">
                                            </div>
                                            <div class="service-title">
                                                <h3>
                                                    <a href="{{route('service_details', ['id' => $service->id])}}">
                                                   {{!empty($service->name) ? $service->name : ''}}
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                        <p>
                                           {{!empty($service->content) ? $service->content : ''}}
                                        </p>
                                        <a href="{{route('service_details', ['id' => $service->id])}}" class="theme-btn-2  mt-3">
                                        {{!empty($service->button_name) ? $service->button_name : 'Get Started'}}<i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                        <div class="swiper-dot text-center pt-5">
                            <div class="dot"></div>
                        </div>
                    </div>
                    @else
                    <div class="col-12 text-center">
                        <h1 style ="color:black;">No service found</h1>
                    </div>
                    @endif
                </div>
            </div>
        </section>

     
        <!-- Team Section Here -->
        <section class="team-section section-padding fix">
            <div class="container">
                <div class="section-title">
                    <span class="wow fadeInUp">
                    {{!empty($siteData->team_title) ? $siteData->team_title :''}}
                    </span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                       {{!empty($siteData->team_subtitle) ? $siteData->team_subtitle : ''}}
                    </h2>
                </div>
                <div class="row">

                @if(isset($teams) && $teams->isNotEmpty())
                @foreach($teams as $team)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="single-team-style-1">
                            <div class="team-image ralt">
                                <img src="{{!empty($team->image) ? asset('admin/team_image/' . $team->image) : '' }}" alt="team-img">
                                <div class="icon-list">
                                    <ul>
                                        @if(!empty($team->facebook_url))
                                        <li>
                                            <a href="{{$team->facebook_url}}"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        @endif
                                        @if(!empty($team->twitter_url))
                                        <li>
                                            <a href="{{$team->twitter_url}}"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if(!empty($team->linkedin_url))
                                        <li>
                                            <a href="{{$team->linkedin_url}}"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        @endif

                                        @if(!empty($team->github_url))
                                        <li>
                                        <a href="#"><i class="fab fa-github"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="team-content center">
                                <h3>
                                    <a href="team-details.html">
                                    {{!empty($team->name) ? $team->name : ''}}
                                    </a>
                                </h3>
                                <p>
                                    {{!empty($team->role) ? $team->role : ''}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="col-12 text-center">
                    <h1 style ="color:#1c2539;">No team found</h1>
                </div>
                @endif
                </div>
            </div>
        </section>

        <!-- Why Choose Us Section Here -->
        <section class="choose-us-wrapper-2 fix section-padding">

            <div class="circle-shape-2 float-bob-y">
                <img src="front/assets/img/choose-us/circle2.png" alt="circle-shape">
            </div>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-5 col-lg-5">
                        <div class="choose-us-image">
                            <img src="{{!empty($siteData->why_choose_us_image) ? asset('admin/why_image/' . $siteData->why_choose_us_image) : '' }}" alt="choose-img">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 mt-5 mt-lg-0">
                        <div class="choose-us-content">
                            <div class="section-title-content">
                                <span class="wow fadeInUp">
                               {{!empty($siteData->why_choose_us_title) ? $siteData->why_choose_us_title : ''}}
                                </span>
                                <h2 class="wow fadeInUp" data-wow-delay=".2s">
                                {{!empty($siteData->why_choose_us_subtitle) ? $siteData->why_choose_us_subtitle : ''}}
                                </h2>
                            </div>
                            <p class="wow fadeInUp" data-wow-delay=".4s">
                            {{!empty($siteData->why_choose_us_description) ? $siteData->why_choose_us_description : ''}}
                            </p>
                            @if(isset($why_us) && $why_us->isNotEmpty())
                            <div class="row g-4 mt-4">
                               @foreach($why_us as $why)
                                <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                                    <div class="icon-items">
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
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="col-12 text-center">
                                <h1 style ="color:#1c2539;">No choose us found</h1>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Project Section Here -->
        <section class="project-section ralt section-bg section-padding">
            <div class="dot-shape">
                <img src="front/assets/img/project/dot.png" alt="dot-shape">
            </div>
            <div class="arrow-shape wow tpfadeRight" data-wow-delay=".3s">
                <img src="front/assets/img/project/arrow-shape.png" alt="arrow-shape">
            </div>
            <div class="arrow-shape-2 wow tpfadeRight" data-wow-delay=".5s">
                <img src="front/assets/img/project/arrow-shape2.png" alt="arrow-shape">
            </div>
            <div class="line-shape">
                <img src="front/assets/img/project/line.png" alt="line-shape">
            </div>
            <div class="container">
                <div class="section-title">
                    <span class="wow fadeInUp">
                    {{!empty($siteData->project_title) ? $siteData->project_title : ''}}
                    </span>
                    <h2 class="title wow fadeInUp" data-wow-delay=".3s">
                    {{!empty($siteData->project_subtitle) ? $siteData->project_subtitle : ''}}
                    </h2>
                </div>
                @if(isset($projects) && $projects->isNotEmpty())
                <div class="swiper project-wrapper">
                    <div class="swiper-wrapper">

                    @foreach($projects as $project)
                        <div class="swiper-slide">
                            <div class="single-project-style-1">
                                <div class="project-image">
                                    <img src="{{!empty($project->image) ? asset('admin/portfolio_image/' . $project->image) : '' }}" alt="project-img">
                                </div>
                                <div class="project-content">
                                    <div class="arrow-shape">
                                        <img src="front/assets/img/project/arrow.png" alt="arrow-img">
                                    </div>
                                    <div class="icon">
                                        <img src="{{!empty($project->icon) ? asset('admin/portfolio_image/' . $project->icon) : '' }}" alt="icon-img">
                                    </div>
                                    <p>
                                    {{!empty($project->name) ? $project->name : ''}}
                                    </p>
                                    <h3>
                                        <a href="{{ route('project_details', ['id' => $project->id]) }}">
                                        {{ \Illuminate\Support\Str::limit($project->desc, 100, '') }}...
                                        </a>
                                    </h3>
                                    <a href="{{ route('project_details', ['id' => $project->id]) }}" class="theme-btn-2  mt-3">
                                    {{!empty($project->button_text) ? $project->button_text : ''}}<i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                      @endforeach
                    </div>
                    <div class="swiper-dot text-center pt-5">
                        <div class="dot"></div>
                    </div>
                </div>
                @else
                <div class="col-12 text-center">
                    <h1 style ="color:#fff;">No project found</h1>
                </div>
                @endif
            </div>
        </section>

         <!-- Faq Section Here -->
         @if(isset($faqs) && $faqs->isNotEmpty())
            <section class="solar-faq-section section-padding pb-0 fix mb-4">
                <div class="container">
                    <div class="solar-faq-wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-12">
                                <div class="faq-content">
                                    <div class="section-title-content">
                                    <div class="section-both wow fadeInUp" data-wow-delay=".3s">
                                            <span>
                                                {{!empty($siteData->faq_title) ? $siteData->faq_title : ''}}
                                            </span>
                                        </div>
                                        <h2 class="wow fadeInUp" data-wow-delay=".5s">
                                            {{!empty($siteData->faq_subtitle) ? $siteData->faq_subtitle : ''}}
                                        </h2>
                                    </div>
                                    
                                    
                                    <div class="faq-accordion">
                                        <div class="accordion" id="faqAccordion">
                                            @foreach($faqs as $index => $faq)
                                                <div class="accordion-item wow fadeInUp" data-wow-delay=".3s">
                                                    <h4 class="accordion-header" id="heading{{ $index }}">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                                            {{!empty($faq->question) ? $faq->question : ''}}
                                                        </button>
                                                    </h4>
                                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                                        <div class="accordion-body">
                                                            {{!empty($faq->answer) ? $faq->answer : ''}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                

                                </div>
                            </div>
                            
                            <div class="col-lg-6 mt-5 mt-lg-0 wow fadeInUp" data-wow-delay=".4s">
                                <div class="faq-image">
                                    <img src="{{!empty($siteData->faq_image) ? asset('admin/faq_image/' . $siteData->faq_image) : 'front/assets/img/about/about1.jpg' }}" alt="faq-img">
                                    <div class="video-btn video-pulse">
                                        <a class="video-popup" href="{{!empty($siteData->faq_video_url) ? $siteData->faq_video_url : 'https://www.youtube.com/watch?v=Cn4G2lZ_g2I'}}"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            @endif

        <!-- Counter Section Here -->
        <section class="counter-wrapper section-padding">
            <div class="arrow-shape wow fadeInLeft" data-wow-delay=".3s">
                <img src="front/assets/img/counter/arrow-shape.png" alt="arrow-shape">
            </div>
            <div class="arrow-shape-2 wow fadeInLeft" data-wow-delay=".5s">
                <img src="front/assets/img/counter/arrow-shape2.png" alt="arrow-shape">
            </div>
            <div class="arrow-shape-3 wow fadeInRight" data-wow-delay=".3s">
                <img src="front/assets/img/counter/arrow-shape3.png" alt="arrow-shape">
            </div>
            <div class="arrow-shape-4 wow fadeInRight" data-wow-delay=".5s">
                <img src="front/assets/img/counter/arrow-shape4.png" alt="arrow-shape">
            </div>
            @if(isset($counters) && $counters->isNotEmpty())
            <div class="container">
                <div class="counter-main-items">
                    @foreach($counters as $counter)
                    <div class="single-counter-items wow fadeInUp" data-wow-delay=".2s">
                        <div class="icon">
                            <img src="{{!empty($counter->icon) ? asset('admin/counter_image/' . $counter->icon) : 'front/assets/img/counter/icon1.svg' }}" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2>
                                <span class="count">{{!empty($counter->count) ? $counter->count : ''}}</span>
                                k+
                            </h2>
                            <h6>
                            {{!empty($counter->label) ? $counter->label : ''}}
                            </h6>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="col-12 text-center">
                <h1 style ="color:#fff;">No counter found</h1>
            </div>
            @endif
        </section>

        <!-- Testimonial Section Here -->
        @if(isset($testimonials) && $testimonials->isNotEmpty())
            <section class="testimonial-section fix section-padding">
                        <div class="container">
                            <div class="single-testimonial-style-1">
                                <div class="row justify-content-between">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="section-title-content">
                                            <span class="wow fadeInUp">
                                            {{!empty($siteData->testimonial_title) ? $siteData->testimonial_title : ''}}
                                            </span>
                                            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                            {{!empty($siteData->testimonial_subtitle) ? $siteData->testimonial_subtitle : ''}}
                                            </h2>
                                        </div>
                                    
                                        <div class="swiper testimonial-slide">
                                            <div class="swiper-wrapper">
                                            @foreach($testimonials as $testimonial)
                                                <div class="swiper-slide">
                                                    <div class="teastimonial-items ralt">
                                                        <div class="quote-img">
                                                            <img src="front/assets/img/testimonial/quote.png" alt="img">
                                                        </div>
                                                        <div class="testimonial-content">
                                                            <p class="text">
                                                            {{!empty($testimonial->message) ? $testimonial->message : ''}}
                                                            </p>
                                                            <div class="client-info mt-4">
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
                                                </div>
                                            @endforeach
                                            </div>
                                            <div class="swiper-dot ml-100 pt-5">
                                                <div class="dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 mt-5 mt-lg-0">
                                        <div class="testimonial-image ralt">
                                            <img src="{{!empty($siteData->testimonial_image) ? asset('admin/testimonial_image/' . $siteData->testimonial_image) : '' }}" alt="testimonial-img">
                                            <div class="arrow-shape wow fadeInUp" data-wow-delay=".3s">
                                                <img src="front/assets/img/testimonial/arrow-shape.png" alt="shape-img">
                                            </div>
                                            <div class="arrow-shape-2 wow fadeInUp" data-wow-delay=".5s">
                                                <img src="front/assets/img/testimonial/arrow-shape2.png" alt="shape-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </section>
             @endif

        <!-- News Blog Section Here -->
        <section class="news-section fix ralt section-bg-2 section-padding">
            <div class="arrow-shape wow tpfadeLeft" data-wow-delay=".4s">
                <img src="front/assets/img/news/arrow-shape.png" alt="arrow-shape">
            </div>
            <div class="circle-shape float-bob-y">
                <img src="front/assets/img/news/circle-shape.png" alt="arrow-shape">
            </div>
            <div class="container">
                <div class="section-title">
                    <span class="wow fadeInUp">
                    {{!empty($siteData->blog_title) ? $siteData->blog_title : ''}}
                    </span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    {{!empty($siteData->blog_subtitle) ? $siteData->blog_subtitle : ''}}
                    </h2>
                </div>
                @if(isset($news) && $news->isNotEmpty())
                <div class="row">
                   @foreach($news as $blog)
                    <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="single-news-style-1">
                            <div class="news-image">
                                <img src="{{!empty($blog->image) ? asset('admin/blog_image/' . $blog->image) : '' }}" alt="news-img">
                                <div class="post-cat">
                                    <a href="{{route('news_details', ['id' => $blog->id])}}" class="cat-name">{{!empty($blog->category) ? $blog->category : ''}}</a>                    
                                </div>
                            </div>
                            <div class="news-content">
                                <div class="author-item mb-3">
                                    <ul>
                                        <li><i class="fal fa-calendar-alt"></i>{{!empty($blog->date) ? $blog->date : ''}}</li>
                                    </ul>
                                    <div class="post-author d-flex align-items-center">
                                        <img src="front/assets/img/news/author.jpg" alt="author-img">
                                        <p>{{!empty($blog->author) ? $blog->author : ''}}</p>
                                    </div>
                                </div>
                                <h3>
                                    <a href="{{route('news_details', ['id' => $blog->id])}}">
                                    {{!empty($blog->title) ? $blog->title : ''}}
                                    </a>
                                </h3>
                                <p>
                                {{!empty($blog->desc) ? $blog->desc : ''}}
                                </p>
                                <a href="{{route('news_details', ['id' => $blog->id])}}" class="theme-btn-2  mt-3">
                                {{!empty($blog->button_text) ? $blog->button_text : ''}}<i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
                @else
                <div class="col-12 text-center">
                    <h1 style ="color:#000;">No blogs found</h1>
                </div>
                @endif
            </div>
        </section>
        <!-- Brand Logo Section Here -->
        @if(isset($brands) && $brands->isNotEmpty())
        <section class="brand-section ralt section-padding section-bg-2 pt-4 ">
            <div class="arrow-shape wow tpfadeRight" data-wow-delay=".4s">
                <img src="front/assets/img/brand/arrow-shape.png" alt="arrow-shape">
            </div>
            <div class="container">
                <div class="single-brand-style-1">
                    <h6 class="wow fadeInUp" data-wow-delay=".3s">
                    {{!empty($siteData->brand_title) ? $siteData->brand_title : ''}}
                    </h6>
                    <div class="swiper brand-slider">
                        <div class="swiper-wrapper">
                            
                            @foreach($brands as $brand)
                            <div class="swiper-slide">
                                <div class="brand-logo">
                                    <img src="{{!empty($brand->brand_image) ? asset('admin/brand_image/' . $brand->brand_image) : '' }}" alt="brand-img">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
       @endif

          <!-- Pricing Section Here -->
          

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

                            <!-- <form action="/test" method="POST">
                                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                                 <button href="#" class="theme-btn mt-5">Choose Package</button>
                            </form> -->
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


        <!-- News Blog Section Here -->

        

        <!-- Contact Section Here -->
        <section class="contact-section section-padding pb-0 fix ralt">
            <div class="dot-shape">
                <img src="front/assets/img/contact/dot.png" alt="dot-img">
            </div>
            <div class="frame-shape">
                <img src="front/assets/img/contact/frame.png" alt="frame-img">
            </div>
            <div class="frame-shape-2">
                <img src="front/assets/img/contact/frame.png" alt="frame-img">
            </div>
            @if(isset($contacts))
            <div class="container">
                <div class="single-contact-us">
                    <div class="row justify-content-between">
                        <div class="col-xxl-5 col-xl-5 col-lg-6">
                            <div class="section-title-content">
                                <span class="wow fadeInLeft">
                                {{!empty($contacts->top_title) ? $contacts->top_title : ''}}
                                </span>
                                <h2 class="wow fadeInLeft" data-wow-delay=".2">
                                {{!empty($contacts->top_subtitle) ? $contacts->top_subtitle : ''}}
                                </h2>
                            </div>
                            <p class="wow fadeInLeft" data-wow-delay=".4">
                            {{!empty($contacts->top_desc) ? $contacts->top_desc : ''}}
                            </p>
                            <div class="contact-info-item d-flex align-items-center wow fadeInLeft" data-wow-delay=".2s">
                                <i class="far fa-envelope"></i>
                                <div class="content">
                                    <p>
                                        Email Us
                                    </p>
                                    <h3>
                                    {{!empty($contacts->email) ? $contacts->email : ''}}
                                    </h3>
                                </div>
                            </div>
                            <div class="contact-info-item d-flex align-items-center wow fadeInLeft" data-wow-delay=".4s">
                                <i class="far fa-phone-alt"></i>
                                <div class="content">
                                    <p>
                                        Call Us
                                    </p>
                                    <h3>
                                    {{!empty($contacts->phone) ? $contacts->phone : ''}}
                                    </h3>
                                </div>
                            </div>
                            <div class="contact-info-item d-flex align-items-center wow fadeInLeft" data-wow-delay=".6s">
                                <i class="far fa-map-marker-alt"></i>
                                <div class="content">
                                    <p>
                                        Location
                                    </p>
                                    <h3>
                                    {{!empty($contacts->adress) ? $contacts->adress : ''}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-7 col-lg-8 wow tpfadeRight" data-wow-delay=".8s">
                            <div class="contact-image">
                                <img src="{{!empty($contacts->image) ? asset('admin/contact_image/' . $contacts->image) : '' }}" alt="contact-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-12 text-center">
                <h1 style ="color:#000;">No contact info found</h1>
            </div>
            @endif
        </section>
         <section class="solar-contact-section fix section-padding">
            <div class="container">
                <div class="solar-contact-wrapper">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6"></div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-section">
                                <div class="section-title-content">
                                    <div class="section-both wow fadeInUp" data-wow-delay=".2s">
                                        <span>{{!empty($contacts->title) ? $contacts->title : ''}}</span>
                                    </div>
                                    <h2 class="wow fadeInUp" data-wow-delay=".4s">
                                    {{!empty($contacts->subtitle) ? $contacts->subtitle : ''}}
                                    </h2>
                                </div>
                                <div class="contact-right">
                                    <form action="{{route('contact')}}"  method="POST">
                                    @csrf
                                        <div class="row g-4">
                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <input type="text" id="name" name ="name" placeholder="Enter Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <input type="text" id="email" name="email" placeholder="Enter Email Address">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <input type="text" id="phone" name="phone" placeholder="Enter Number">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <input type="text" id="subject" name= "subject" placeholder="Enter Subject">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-clt-big form-clt">
                                                    <textarea id="message" name = "message" placeholder="Enter Message"></textarea> 
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <button type="submit" class="theme-btn">{{!empty($contacts->button_text) ? $contacts->button_text : ''}}<i class="fa-solid fa-angles-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="form-message"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map-item">
                <div class="google-map">
                    <iframe src="{{!empty($contacts->map_link) ? $contacts->map_link : ''}}" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
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
                                    <li>
                                        <a href="{{$siteData->facebook_url}}"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{$siteData->twitter}}"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{$siteData->linkden_url}}"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{$siteData->youtube}}"><i class="fab fa-youtube"></i></a>
                                    </li>
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