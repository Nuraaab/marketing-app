@extends('front.layout')
@section('content')

       @include('front.partials.preloader')

        <!-- Header Top Section Here -->
        @include('front.partials.header')

        <!-- Menu Sidebar Section Start -->
       @include('front.partials.menu_sidebar')

        <!-- Sidebar Area Here -->
        <div id="targetElement" class="side_bar slideInRight side_bar_hidden">
            <div class="side_bar_overlay"></div>
            <div class="logo mb-50">
                <img src="front/assets/img/logo/footer-logo.png" alt="logo">
            </div>
            <p>
                Quis autem veumure repreh volu tate velit esse niholestiae conseua veillum dolorem eum fugiat voluta nulla pariatur systems ways
            </p>
            <div class="info mt-50">
                <div class="icon__item">
                    <div class="icon">
                        <i class="far fa-map-marker-alt"></i>
                    </div>
                    <div class="content">
                        <p>Location</p>
                        <h6>Main Street, Melbourne, Australia</h6>
                    </div>
                </div>
                <div class="icon__item">
                    <div class="icon">
                        <i class="fal fa-envelope"></i>
                    </div>
                    <div class="content">
                        <p>Email Address</p>
                        <h6>Support@gmail.com</h6>
                    </div>
                </div>
                <div class="icon__item">
                    <div class="icon">
                        <i class="far fa-phone"></i>
                    </div>
                    <div class="content">
                        <p>Make A Call</p>
                        <h6>+000 (123) 456 88</h6>
                    </div>
                </div>
                <div class="icon__item">
                    <div class="icon">
                        <i class="fal fa-clock"></i>
                    </div>
                    <div class="content">
                        <p>Opening Hours:</p>
                        <h6>Mon-Fri 8am-5pm</h6>
                    </div>
                </div>
            </div>
            <div class="single-gallery mt-40">
                <div class="gallery-wrap">
                    <div class="gallery-item">
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery1.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery2.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery3.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery4.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery5.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                        <div class="thumb">
                            <img src="front/assets/img/gallery/gallery6.png" alt="gallery__img">
                            <div class="icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button id="closeButton" class="text-white"><i class="fas fa-times"></i></button>
        </div>

        <div class="breadcrumb-wrapper" data-background="front/assets/img/breadcrumb/breadcrumb.jpg">
            <div class="container">
                <div class="page-heading center">
                    <h1>News</h1>
                    <ul class="breadcrumb-items">
                        <li>
                            <a href="index.html">
                            Home
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-chevron-double-right"></i>
                        </li>
                        <li>
                            News
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @if(isset($blogs) && $blogs->isNotEmpty())
        <section class="blog-wrapper news-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="blog-posts">
                            @foreach($blogs as $blog)
                            <div class="single-blog-post">
                                <div class="post-featured-thumb bg-cover" data-background="{{!empty($blog->image) ? asset('admin/blog_image/' . $blog->image) : '' }}"></div>
                                <div class="post-content">
                                    <div class="post-cat">
                                        <a href="news.html">{{!empty($blog->category) ? $blog->category : ''}}</a>
                                    </div>
                                    <h2><a href="news-details.html">{{!empty($blog->title) ? $blog->title : ''}}</a></h2>
                                    <div class="post-meta">
                                        <!-- <span><i class="fal fa-comments"></i>35 Comments</span> -->
                                        <span><i class="fal fa-calendar-alt"></i>{{!empty($blog->date) ? $blog->date : ''}}</span>
                                    </div>
                                    <p>{{!empty($blog->desc) ? $blog->desc : ''}}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-30">
                                        <div class="author-info">
                                            <div class="author-img" data-background="front/assets/img/blog/author_img.jpg"></div>
                                            <h5><a href="#">{{!empty($blog->author) ? $blog->author : ''}}</a></h5>
                                        </div>
                                        <div class="post-link">
                                            <a href="news-details.html"><i class="fal fa-arrow-right"></i> {{!empty($blog->button_text) ? $blog->button_text : ''}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <div class="page-nav-wrap mt-60 text-center">
                        <ul>
                            {{-- Previous Page Link --}}
                            @if ($blogs->onFirstPage())
                                <li><span class="page-numbers"><i class="fal fa-long-arrow-left"></i></span></li>
                            @else
                                <li><a class="page-numbers" href="{{ $blogs->previousPageUrl() }}"><i class="fal fa-long-arrow-left"></i></a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                @if ($page == $blogs->currentPage())
                                    <li><span class="page-numbers">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</span></li>
                                @else
                                    <li><a class="page-numbers" href="{{ $url }}">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($blogs->hasMorePages())
                                <li><a class="page-numbers" href="{{ $blogs->nextPageUrl() }}"><i class="fal fa-long-arrow-right"></i></a></li>
                            @else
                                <li><span class="page-numbers"><i class="fal fa-long-arrow-right"></i></span></li>
                            @endif
                        </ul>
                    </div>

                        <!-- <div class="page-nav-wrap mt-60 text-center">
                            <ul>
                                <li><a class="page-numbers" href="#"><i class="fal fa-long-arrow-left"></i></a></li>
                                <li><a class="page-numbers" href="#">01</a></li>
                                <li><a class="page-numbers" href="#">02</a></li>
                                <li><a class="page-numbers" href="#">..</a></li>
                                <li><a class="page-numbers" href="#">10</a></li>
                                <li><a class="page-numbers" href="#">11</a></li>
                                <li><a class="page-numbers" href="#"><i class="fal fa-long-arrow-right"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="main-sidebar">
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Search</h3>
                                </div>
                                <div class="search_widget">
                                    <form action="#">
                                        <input type="text" placeholder="Search your keyword...">
                                        <button type="submit"><i class="fal fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                           
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Categories</h3>
                                </div>
                                <div class="widget_categories">
                                    <ul>
                                        <li><a href="news.html">Consultant <span>23</span></a></li>
                                        <li><a href="news.html">Help <span>24</span></a></li>
                                        <li><a href="news.html">Education <span>11</span></a></li>
                                        <li><a href="news.html">Technology <span>05</span></a></li>
                                        <li><a href="news.html">business <span>06</span></a></li>
                                        <li><a href="news.html">Events <span>10</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Never Miss News</h3>
                                </div>
                                <div class="social-link">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

            <!-- Footer Section Here -->
    @include('front.partials.footer')

@endsection