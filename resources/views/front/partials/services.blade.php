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