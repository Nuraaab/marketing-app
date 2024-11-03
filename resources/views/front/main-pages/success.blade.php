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

    <section class="blog-wrapper news-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="blog-post-details border-wrap">
                        <div class="single-blog-post post-details">
                            <div class="post-content text-start">
                                <h2 style="color:#00A9A4;">
                                    <i class="fas fa-check-circle" style="color: #00A9A4;"></i> Payment Successful!
                                </h2>
                                <p style="font-size: 18px;">Thank you for your purchase!</p>

                                <div class="package-details">
                                    <p>
                                        <i class="fas fa-box" style="color: #00A9A4;"></i> Package Name: <strong>{{ $package->name }}</strong>
                                    </p>
                                    <p>
                                        <i class="fas fa-dollar-sign" style="color: #00A9A4;"></i> Package Price: <strong>{{ $package->unit }}{{ $package->price }}</strong>
                                    </p>
                                </div>

                                <div class="contact-info" style="margin-top: 20px;">
                                    <p>
                                        <i class="fas fa-clock" style="color: #00A9A4;"></i> We will contact you soon with more details.
                                    </p>
                                    <p>
                                        <i class="fas fa-question-circle" style="color: #00A9A4;"></i> If you have any questions, feel free to <a href="mailto:support@example.com" style="color: #00A9A4; text-decoration: underline;">contact us</a>.
                                    </p>
                                </div>
                            </div>
                        </div>

                          
                          
                          
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>

    @include('front.partials.footer')

@endsection   