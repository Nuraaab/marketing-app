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