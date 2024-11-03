@extends('front.layout')
@section('content')

       @include('front.partials.preloader')

        <!-- Header Top Section Here -->
        @include('front.partials.header')

        <!-- Menu Sidebar Section Start -->
       @include('front.partials.menu_sidebar')

        <!-- Sidebar Area Here -->
       @include('front.partials.right_sidebar')

        <!-- Hero Section Here -->
       @include('front.partials.hero')

        <!-- Feature Section Here -->
        

        @include('front.partials.feature')
        <!-- About Section Here -->
        @include('front.partials.about')

        <!-- Service Section Here -->
        @include('front.partials.services')

        <!-- Why Choose Us Section Here -->
        <!-- <section class="why-choose-us fix section-bg-2 ralt section-padding pt-0">
            <div class="dot-shape">
                <img src="front/assets/img/choose-us/dot.png" alt="img">
            </div>
            <div class="circle-shape float-bob-y">
                <img src="front/assets/img/choose-us/circle.png" alt="img">
            </div>
            <div class="line-shape">
                <img src="front/assets/img/choose-us/line.png" alt="img">
            </div>
            <div class="arrow-shape wow tpfadeRight" data-wow-delay=".3s">
                <img src="front/assets/img/choose-us/arrow.png" alt="img">
            </div>
            <div class="arrow-shape-2 wow tpfadeRight" data-wow-delay=".5s">
                <img src="front/assets/img/choose-us/arrow2.png" alt="img">
            </div>
            <div class="container">
                <div class="choose-us-wrapper">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-6 wow tpfadeLeft" data-wow-delay=".4s">
                            <div class="choose-us-content">
                                <div class="section-title-content">
                                    <span>
                                    Get Know Why Us
                                    </span>
                                    <h2>
                                        Strategic Edge Advisors
                                        Innovating Your Business 
                                        Landscape
                                    </h2>
                                </div>
                                <p>
                                    At vero eos et accusamus et iusto odio dignissimos ducimus blanditiis praesentium voluptatum deleniti atque corrupti quos dol quas molestias excepturi sint occaecati cupiditate non provident, similique
                                </p>
                                <div class="circle-progress-bar-wrapper d-flex">
                                    <div class="single-circle-bar">
                                        <div class="circle-bar" data-percent="65" data-duration="1000">
                                        </div>
                                        <div class="content">
                                            <h5>Business Strategy</h5>
                                            <p class="mt-3">
                                                We denounce with righteous indignation and likes
                                            </p>
                                        </div>
                                    </div>
                                    <div class="single-circle-bar">
                                        <div class="circle-bar" data-percent="78" data-duration="1000">
                                        </div>
                                        <div class="content">
                                            <h5>Financial Planning</h5>
                                            <p class="mt-3">
                                                We denounce with righteous indignation and likes
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 mt-5 mt-lg-0">
                            <div class="choose-image ralt">
                                <img src="front/assets/img/choose-us/choose.png" alt="choose-img">
                                <div class="icon-box">
                                    <img src="front/assets/img/choose-us/icon.png" alt="img">
                                </div>
                                <div class="report-image">
                                    <img src="front/assets/img/choose-us/report.png" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- Team Section Here -->
       @include('front.partials.team')

        <!-- Why Choose Us Section Here -->
        @include('front.partials.choose_us')

        <!-- Project Section Here -->
        @include('front.partials.project')

         <!-- Faq Section Here -->
         @include('front.partials.faq')

        <!-- Counter Section Here -->
       @include('front.partials.counter')

        <!-- Testimonial Section Here -->
        @include('front.partials.testimonial')

        <!-- News Blog Section Here -->
        @include('front.partials.news')
        <!-- Brand Logo Section Here -->
        @include('front.partials.brands')

          <!-- Pricing Section Here -->
          @include('front.partials.package')
        <!-- News Blog Section Here -->

        

        <!-- Contact Section Here -->
          @include('front.partials.contacts')

        <!-- Footer Section Here -->
       @include('front.partials.footer')

       @endsection