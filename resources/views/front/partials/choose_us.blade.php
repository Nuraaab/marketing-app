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