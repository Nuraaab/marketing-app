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


        <div class="breadcrumb-wrapper" data-background="{{asset('front/assets/img/breadcrumb/breadcrumb.jpg')}}">
            <div class="container">
                <div class="page-heading center">
                    <h1>project details</h1>
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
                            project details
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        @if(isset($projects))
        <section class="project-details section-padding overhid">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-12">
                        <div class="project-details-wrapper">
                            
                           @if(isset($projects->projectImage) && $projects->projectImage->isNotEmpty())
                            <div class="details-thumb-wrapper">
                                <div class="details-thumb-scroll">

                                @foreach($projects->projectImage as $image)
                                    <a href = "{{!empty($project->project_url) ? $project->project->url : ''}}"><img src="{{!empty($image->image) ? asset('admin/portfolio_image/' . $image->image) : '' }}" alt="project-image-1"></a>
                                @endforeach
                                </div>
                            </div>
                            @endif
                            <!-- Other Details -->
                            <div class="catagory-wrapper">
                                <div class="icon-items">
                                    <div class="icon">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="content">
                                        <p>Client Name:</p>
                                        <h6>{{!empty($projects->client) ? $projects->client : ''}}</h6>
                                    </div>
                                </div>
                                <div class="icon-items">
                                    <div class="icon">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                    <div class="content">
                                        <p>Category:</p>
                                        <h6>{{!empty($projects->category) ? $projects->category : ''}}</h6>
                                    </div>
                                </div>
                                <div class="icon-items">
                                    <div class="icon">
                                        <i class="fal fa-calendar-alt"></i>
                                    </div>
                                    <div class="content">
                                        <p>Delivery Date:</p>
                                        <h6>2{{!empty($projects->project_date) ? $projects->project_date : ''}}</h6>
                                    </div>
                                </div>
                                <div class="icon-items">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="content">
                                        <p>Address:</p>
                                        <h6>{{!empty($projects->address) ? $projects->address : ''}}</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="content">
                                <h2>
                                {{!empty($projects->name) ? $projects->name : ''}}
                                </h2>
                                <p class="text mb-3">
                                {{!empty($projects->desc) ? $projects->desc : ''}}
                                </p>
                                <!-- <p>
                                    Collaborate Consulting exists to find the place where to being seemingly disparate interests meet. From that point of the connection, we create platforms. We have spent 25 years working for one of Australia’s most recognised and successful retailers purpose and inspired culture, where people work cohesively towards shared goals.
                                </p>
                                <div class="heading-title">
                                    <p>
                                        " In this context, our approach was to build trusted and strategic relationships within key sectors, with the goal of advancing health, trade and business outcomes. "
                                    </p>
                                </div>
                                <h3 class="mt-40">
                                    The Challenge Of Project
                                </h3>
                                <p>
                                    We have spent 25 years working for one of Australia’s most recognised and successful retailers purpose and inspired culture, where people work cohesively towards shared goals. Starfish can re-grow their arms. In fact, a single arm can regenerate a whole body. Google’s founders were willing to sell & consult.
                                </p>
                                <div class="list-items">
                                    <ul>
                                        <li>
                                            <i class="fas fa-check-circle"></i>Will give you a complete account
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle"></i>Easy Customer Service
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle"></i>Excepteur sint occaecat cupidatat non.
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <i class="fas fa-check-circle"></i>he master-builder of human happiness
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle"></i>Duis aute irure dolor in reprehenderit
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle"></i>complete account of the system
                                        </li>
                                    </ul>
                                </div>
                                <p class="mt-40">
                                    Efficiently unleash cross-media information without cross-media value work. Objectively innovate empowered manufactured products whereas parallel platforms. Holisticly predominate extensible testing procedures for reliable supply chains. Dramatically engage top-line web services vis-a-vis cutting-edge deliverables. Proactively.
                                </p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif



                    <!-- Footer Section Here -->
    @include('front.partials.footer')

@endsection