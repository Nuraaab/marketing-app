<section class="about-section fix section-padding">
            <div class="container">
                <div class="single-about-1">

                    <div class="row">
                    @if(isset($aboutData) && isset($siteData))
                        <div class="col-xl-5 col-lg-6 wow tpfadeLeft" data-wow-delay=".4s">
                            <div class="about-image">
                                <img src="{{ !empty($aboutData->about_image) ? asset('admin/about_image/' . $aboutData->about_image) : '' }}" alt="about-img">
                                <div class="client-img">
                                    <img src="{{!empty($aboutData->quote_image) ? asset('admin/about_image/' . $aboutData->quote_image) : '' }}" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 mt-5 mt-lg-0 wow tpfadeRight" data-wow-delay=".8s">
                            <div class="about-content">
                                <div class="section-title-content">
                                    <span>
                                    {{!empty($siteData->about_title) ? $siteData->about_title : ''}}
                                    </span>
                                    <h2>
                                       {{!empty($aboutData->subtitle) ? $aboutData->subtitle : ""}}
                                    </h2>
                                </div>

                                
                                <h3>
                                    {{!empty($aboutData->normal_text) ? $aboutData->normal_text : ""}} <a href="/about">{{!empty($aboutData->highlighted_text) ? $aboutData->highlighted_text : "" }}</a>
                                </h3>
                                <p class="text">
                                   {{!empty($aboutData->content) ? $aboutData->content : ""}}
                                </p>
                                @if(!empty($aboutData->project_completed) || !empty($aboutData->years_of_experience || !empty($aboutData->about_button_name)))
                                <div class="about-info mt-5">
                                    <a href="about.html" class="theme-btn bg-style-2">{{$aboutData->about_button_name}}</a>
                                    <!-- <div class="customer-img">
                                        <img src="front/assets/img/about/customer.jpg" alt="customer-img">
                                        <h6>
                                            5m+ Trusted <br>
                                            Global Customers
                                        </h6>
                                    </div> -->
                                </div>
                                

                                <div class="counter-item">
                                    <div class="counter-box">
                                        <h2><span class="count">{{$aboutData->project_completed}}</span>k+</h2>
                                        <p>Project Complete</p>
                                    </div>
                                    <div class="counter-box">
                                        <h2><span class="count">{{$aboutData->years_of_experience}}</span>+</h2>
                                        <p>Years Of Experience</p>
                                    </div>
                                </div>
                                @endif
                               
                            </div>

                            @else
                            <div class="col-12 text-center">
                                <h1 style ="color:black;">No About section available</h1>
                            </div>
                            @endif
                        </div>
                   
                    </div>
                </div>
            </div>
        </section>