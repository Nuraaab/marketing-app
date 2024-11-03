@if(isset($faqs) && $faqs->isNotEmpty())
<section class="solar-faq-section section-padding pb-0 fix mb-4">
    <div class="container">
        <div class="solar-faq-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="faq-content">
                        <div class="section-title-content">
                        <div class="section-both wow fadeInUp" data-wow-delay=".3s">
                                <span>
                                    {{!empty($siteData->faq_title) ? $siteData->faq_title : ''}}
                                </span>
                            </div>
                            <h2 class="wow fadeInUp" data-wow-delay=".5s">
                                {{!empty($siteData->faq_subtitle) ? $siteData->faq_subtitle : ''}}
                            </h2>
                        </div>
                        
                        
                        <div class="faq-accordion">
                            <div class="accordion" id="faqAccordion">
                                @foreach($faqs as $index => $faq)
                                    <div class="accordion-item wow fadeInUp" data-wow-delay=".3s">
                                        <h4 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                                {{!empty($faq->question) ? $faq->question : ''}}
                                            </button>
                                        </h4>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                {{!empty($faq->answer) ? $faq->answer : ''}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                       

                    </div>
                </div>
                
                <div class="col-lg-6 mt-5 mt-lg-0 wow fadeInUp" data-wow-delay=".4s">
                    <div class="faq-image">
                        <img src="{{!empty($siteData->faq_image) ? asset('admin/faq_image/' . $siteData->faq_image) : 'front/assets/img/about/about1.jpg' }}" alt="faq-img">
                        <div class="video-btn video-pulse">
                            <a class="video-popup" href="{{!empty($siteData->faq_video_url) ? $siteData->faq_video_url : 'https://www.youtube.com/watch?v=Cn4G2lZ_g2I'}}"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endif