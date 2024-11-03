<section class="feature-section ralt fix section-bg section-padding">
    <div class="left-shape wow tpfadeLeft" data-wow-delay=".3s">
        <img src="front/assets/img/feature/arrow-shape.png" alt="shape-img">
    </div>
    <div class="left-shape-2 wow tpfadeLeft" data-wow-delay=".5s">
        <img src="front/assets/img/feature/arrow-shape2.png" alt="shape-img">
    </div>
    <div class="right-shape">
        <img src="front/assets/img/feature/dot-shape.png" alt="shape-img">
    </div>
    <div class="container">
        <h6 class="sub-title text-center wow fadeInUp" data-wow-delay=".2s">
            {{ !empty($siteData->feature_title) ? $siteData->feature_title : "No Title" }}
        </h6>

        <div class="row">
            @if(isset($companyFeatures) && $companyFeatures->isNotEmpty())
                @foreach($companyFeatures as $feature)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="feature-single-box">
                            <div class="box">
                                <h5>
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </h5>
                            </div>
                            <div class="icon">
                                <img src="{{ asset('admin/companyFeature_image/' . $feature->icon) }}" alt="icon-img">
                            </div>
                            <div class="content mt-4">
                                <h4>
                                    <a href="service-details.html">
                                       {{ !empty($feature->name) ? $feature->name : "" }}
                                    </a>
                                </h4>
                                <p>
                                    {{ !empty($feature->desc) ? $feature->desc : "" }} 
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <h1 style ="color:white;">No Features Available</h1>
                </div>
            @endif
        </div>
    </div>
</section>
