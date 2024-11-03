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