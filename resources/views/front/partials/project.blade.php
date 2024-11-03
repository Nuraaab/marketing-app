<section class="project-section ralt section-bg section-padding">
            <div class="dot-shape">
                <img src="front/assets/img/project/dot.png" alt="dot-shape">
            </div>
            <div class="arrow-shape wow tpfadeRight" data-wow-delay=".3s">
                <img src="front/assets/img/project/arrow-shape.png" alt="arrow-shape">
            </div>
            <div class="arrow-shape-2 wow tpfadeRight" data-wow-delay=".5s">
                <img src="front/assets/img/project/arrow-shape2.png" alt="arrow-shape">
            </div>
            <div class="line-shape">
                <img src="front/assets/img/project/line.png" alt="line-shape">
            </div>
            <div class="container">
                <div class="section-title">
                    <span class="wow fadeInUp">
                    {{!empty($siteData->project_title) ? $siteData->project_title : ''}}
                    </span>
                    <h2 class="title wow fadeInUp" data-wow-delay=".3s">
                    {{!empty($siteData->project_subtitle) ? $siteData->project_subtitle : ''}}
                    </h2>
                </div>
                @if(isset($projects) && $projects->isNotEmpty())
                <div class="swiper project-wrapper">
                    <div class="swiper-wrapper">

                    @foreach($projects as $project)
                        <div class="swiper-slide">
                            <div class="single-project-style-1">
                                <div class="project-image">
                                    <img src="{{!empty($project->image) ? asset('admin/portfolio_image/' . $project->image) : '' }}" alt="project-img">
                                </div>
                                <div class="project-content">
                                    <div class="arrow-shape">
                                        <img src="front/assets/img/project/arrow.png" alt="arrow-img">
                                    </div>
                                    <div class="icon">
                                        <img src="{{!empty($project->icon) ? asset('admin/portfolio_image/' . $project->icon) : '' }}" alt="icon-img">
                                    </div>
                                    <p>
                                    {{!empty($project->name) ? $project->name : ''}}
                                    </p>
                                    <h3>
                                        <a href="{{ route('project_details', ['id' => $project->id]) }}">
                                        {{ \Illuminate\Support\Str::limit($project->desc, 100, '') }}...
                                        </a>
                                    </h3>
                                    <a href="{{ route('project_details', ['id' => $project->id]) }}" class="theme-btn-2  mt-3">
                                    {{!empty($project->button_text) ? $project->button_text : ''}}<i class="fas fa-chevron-right"></i>
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
                    <h1 style ="color:#fff;">No project found</h1>
                </div>
                @endif
            </div>
        </section>