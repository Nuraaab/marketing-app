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
                    <h1>Contact Us</h1>
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
                            Contact Us
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="contact-support fix section-padding pb-0">
            <div class="container">
                <div class="support-wrapper section-bg-8">
                    <div class="support-items wow fadeInUp" data-wow-delay=".2s">
                        <div class="icon">
                            <img src="front/assets/img/contact/icon.svg" alt="icon-img">
                        </div>
                        <div class="content">
                            <span>
                            Need Support ?
                            </span>
                            <h3>
                                We’re Ready to Talk <br>
                                your Next Project?
                            </h3>
                        </div>
                    </div>
                    <div class="icon-box wow fadeInUp" data-wow-delay=".4s">
                        <i class="fas fa-chevron-double-right"></i>
                    </div>
                    <div class="support-items wow fadeInUp" data-wow-delay=".6s">
                        <div class="icon">
                            <img src="front/assets/img/contact/icon2.svg" alt="icon-img">
                        </div>
                        <div class="content">
                            <span>
                            Join Our Team
                            </span>
                            <h3>
                                Become a Team <br> Member With Us?
                            </h3>
                        </div>
                    </div>
                    <div class="icon-box wow fadeInUp" data-wow-delay=".8s">
                        <i class="fas fa-chevron-double-right"></i>
                    </div>
                </div>
            </div>
        </section>

        @if(isset($contacts))
        <section class="contact-info fix section-padding">
            <div class="container">
                <div class="contact-info-wrapper">
                    <div class="row align-items-center">
                        <div class="col-xxl-6 col-xl-6">
                            <div class="contact-image">
                                <img src="{{!empty($contacts->image) ? asset('admin/contact_image/' . $contacts->image) : '' }}" alt="contact__img">
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 mt-5 mt-lg-0">
                            <div class="info-right">
                                <div class="section-title-content">
                                    <span class="wow fadeInUp">
                                    {{!empty($contacts->title) ? $contacts->title : ''}}
                                    </span>
                                    <h2 class="wow fadeInUp" data-wow-delay=".2s">
                                    {{!empty($contacts->subtitle) ? $contacts->subtitle : ''}}
                                    </h2>
                                </div>
                                <p class="wow fadeInUp" data-wow-delay=".4s">
                                {{!empty($contacts->top_desc) ? $contacts->top_desc : ''}}
                                </p>
                                <div class="contact-list wow fadeInUp">
                                    <div class="icon-item wow fadeInUp" data-wow-delay=".3s">
                                        <div class="icon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                        <div class="content">
                                            <p>Email Us</p>
                                            <h4>
                                            {{!empty($contacts->email) ? $contacts->email : ''}}
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="icon-item wow fadeInUp" data-wow-delay=".5s">
                                        <div class="icon">
                                            <i class="far fa-map-marker-alt"></i>
                                        </div>
                                        <div class="content">
                                            <p>Location</p>
                                            <h4>
                                            {{!empty($contacts->adress) ? $contacts->adress : ''}}
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="icon-item wow fadeInUp" data-wow-delay=".7s">
                                        <div class="icon">
                                            <i class="far fa-phone"></i>
                                        </div>
                                        <div class="content">
                                            <p>Call Us</p>
                                            <h4>
                                            {{!empty($contacts->phone) ? $contacts->phone : ''}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="map-section fix">
            <div class="googpemap">
                <iframe src="{{!empty($contacts->map_link) ? $contacts->map_link : ''}}" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        @endif

        <section class="contact-section overhid ralt section-padding">
            <div class="container">
                <div class="section-title">
                    <span class="wow fadeInUp" data-wow-duration="2s">
                    Send Us Message
                    </span>
                    <h2 class="mb-40 wow fadeInUp" data-wow-duration="4s">
                        Feel Free to Send Us Message
                    </h2>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-xxl-9 col-xl-9 col-lg-9">
                        <div class="contact-right wow fadeInDown" data-wow-duration="1.3s" data-wow-delay=".3s">
                            <form action="contact.php" id="contact-form" method="POST">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <input type="text" name="name" id="name" placeholder="Full Name">
                                            <div class="icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <input type="text" name="email" id="email" placeholder=" Email Address">
                                            <div class="icon">
                                                <i class="far fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <select name="card1">
                                                <option value="1">
                                                    Subject
                                                </option>
                                                <option value="2">
                                                    Web Development
                                                </option>
                                                <option value="3">
                                                    Finance Consulting
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-clt-big form-clt">
                                            <textarea name="message" id="message" placeholder="Write Comments"></textarea>
                                            <div class="icon">
                                                <i class="fal fa-pencil"></i>
                                            </div>
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
        </section>

                <!-- Footer Section Here -->
 @include('front.partials.footer')

@endsection