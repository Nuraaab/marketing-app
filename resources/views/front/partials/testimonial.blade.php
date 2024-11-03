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