<section class="news-section fix ralt section-bg-2 section-padding">
            <div class="arrow-shape wow tpfadeLeft" data-wow-delay=".4s">
                <img src="front/assets/img/news/arrow-shape.png" alt="arrow-shape">
            </div>
            <div class="circle-shape float-bob-y">
                <img src="front/assets/img/news/circle-shape.png" alt="arrow-shape">
            </div>
            <div class="container">
                <div class="section-title">
                    <span class="wow fadeInUp">
                    {{!empty($siteData->blog_title) ? $siteData->blog_title : ''}}
                    </span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    {{!empty($siteData->blog_subtitle) ? $siteData->blog_subtitle : ''}}
                    </h2>
                </div>
                @if(isset($news) && $news->isNotEmpty())
                <div class="row">
                   @foreach($news as $blog)
                    <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="single-news-style-1">
                            <div class="news-image">
                                <img src="{{!empty($blog->image) ? asset('admin/blog_image/' . $blog->image) : '' }}" alt="news-img">
                                <div class="post-cat">
                                    <a href="{{route('news_details', ['id' => $blog->id])}}" class="cat-name">{{!empty($blog->category) ? $blog->category : ''}}</a>                    
                                </div>
                            </div>
                            <div class="news-content">
                                <div class="author-item mb-3">
                                    <ul>
                                        <li><i class="fal fa-calendar-alt"></i>{{!empty($blog->date) ? $blog->date : ''}}</li>
                                    </ul>
                                    <div class="post-author d-flex align-items-center">
                                        <img src="front/assets/img/news/author.jpg" alt="author-img">
                                        <p>{{!empty($blog->author) ? $blog->author : ''}}</p>
                                    </div>
                                </div>
                                <h3>
                                    <a href="{{route('news_details', ['id' => $blog->id])}}">
                                    {{!empty($blog->title) ? $blog->title : ''}}
                                    </a>
                                </h3>
                                <p>
                                {{!empty($blog->desc) ? $blog->desc : ''}}
                                </p>
                                <a href="{{route('news_details', ['id' => $blog->id])}}" class="theme-btn-2  mt-3">
                                {{!empty($blog->button_text) ? $blog->button_text : ''}}<i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
                @else
                <div class="col-12 text-center">
                    <h1 style ="color:#000;">No blogs found</h1>
                </div>
                @endif
            </div>
        </section>