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

        <div class="breadcrumb-wrapper" data-background="{{asset('front/assets/img/breadcrumb/breadcrumb.jpg')}}">
            <div class="container">
                <div class="page-heading center">
                    <h1>News Details</h1>
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
                            News Details
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @if(isset($news))
        <section class="blog-wrapper news-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="blog-post-details border-wrap">
                            <div class="single-blog-post post-details">
                                <div class="post-content">
                                    <div class="post-cat">
                                        <a href="">{{$news->category}}</a>
                                    </div>
                                    <h2>{{$news->title}}</h2>
                                    <div class="post-meta">
                                        <span><i class="fal fa-comments"></i>35 Comments</span>
                                        <span><i class="fal fa-calendar-alt"></i>{{$news->date}}</span>
                                    </div>
                                    <p>{{$news->desc}}</p>
                                    <img src="{{!empty($news->image) ? asset('admin/blog_image/' . $news->image) : '' }}" alt="blog__img">

                                 
                               
                                </div>
                            </div>
                           
                            <!-- comments section wrap start -->
                             @if(isset($news->comment))
                            <div class="comments-section-wrap pt-40">
                                <div class="comments-heading">
                                <h3>{{ $news->comment->count() }} Comments</h3>
                                </div>
                                <ul class="comments-item-list">

                                @foreach($news->comment as $comment)
                                    <li class="single-comment-item">
                                        <div class="author-img">
                                            <img src="{{!empty($comment->profile) ? asset('admin/comment_image/' . $comment->profile) : '' }}" alt="img">
                                        </div>
                                        <div class="author-info-comment">
                                            <div class="info">
                                                <h5><a href="#">{{$comment->name}}</a></h5>
                                                <span>{{$comment->date}}</span>
                                                <!-- <a href="#" class="theme-btn minimal-btn"><i class="fal fa-reply"></i>Reply</a> -->
                                            </div>
                                            <div class="comment-text">
                                                <p>{{$comment->comment}}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="comment-form-wrap mt-40">
                                <h3>Post Comment</h3>
                                <form  class="comment-form" action="{{route('post_comment')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="single-form-input">
                                        <textarea placeholder="Type your comments...." name ="comment"></textarea>
                                    </div>
                                    <div class="single-form-input">
                                        <input type="text" name="user_name" placeholder="Type your name....">
                                    </div>
                                    <div class="single-form-input">
                                        <input type="email" name="email" placeholder="Type your email....">
                                    </div>
                                    <div class="single-form-input">
                                        <input type="file" name="photo" placeholder="Pick Image">
                                    </div>
                                    <input type="hidden" name="blog" value = "{{$news->id}}">
                                    <button class="theme-btn" type="submit"><i class="fal fa-comments"></i>Post Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="main-sidebar">
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Search</h3>
                                </div>
                                <div class="search_widget">
                                    <form action="#">
                                        <input type="text" placeholder="Search your keyword...">
                                        <button type="submit"><i class="fal fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                          
                           @isset($siteData)
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Never Miss News</h3>
                                </div>
                                <div class="social-link">
                                    @isset($siteData->facebook_url)
                                    <a href="{{$siteData->facebook_url}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    @endisset
                                    @isset($siteData->twitter_url)
                                    <a href="{$siteData->twitter_url}" target="_blank"><i class="fab fa-twitter"></i></a>
                                    @endisset
                                    @isset($siteData->youtube_url)
                                    <a href="{{$siteData->youtube_url}}" target="_blank"><i class="fab fa-youtube"></i></a>
                                    @endisset
                                    @isset($siteData->linkden_url)
                                    <a href="{{$siteData->linkden_url}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    @endisset
                                </div>
                            </div>
                            @endisset
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