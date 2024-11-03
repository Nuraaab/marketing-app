<section class="counter-wrapper section-padding">
            <div class="arrow-shape wow fadeInLeft" data-wow-delay=".3s">
                <img src="front/assets/img/counter/arrow-shape.png" alt="arrow-shape">
            </div>
            <div class="arrow-shape-2 wow fadeInLeft" data-wow-delay=".5s">
                <img src="front/assets/img/counter/arrow-shape2.png" alt="arrow-shape">
            </div>
            <div class="arrow-shape-3 wow fadeInRight" data-wow-delay=".3s">
                <img src="front/assets/img/counter/arrow-shape3.png" alt="arrow-shape">
            </div>
            <div class="arrow-shape-4 wow fadeInRight" data-wow-delay=".5s">
                <img src="front/assets/img/counter/arrow-shape4.png" alt="arrow-shape">
            </div>
            @if(isset($counters) && $counters->isNotEmpty())
            <div class="container">
                <div class="counter-main-items">
                    @foreach($counters as $counter)
                    <div class="single-counter-items wow fadeInUp" data-wow-delay=".2s">
                        <div class="icon">
                            <img src="{{!empty($counter->icon) ? asset('admin/counter_image/' . $counter->icon) : 'front/assets/img/counter/icon1.svg' }}" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2>
                                <span class="count">{{!empty($counter->count) ? $counter->count : ''}}</span>
                                k+
                            </h2>
                            <h6>
                            {{!empty($counter->label) ? $counter->label : ''}}
                            </h6>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="col-12 text-center">
                <h1 style ="color:#fff;">No counter found</h1>
            </div>
            @endif
        </section>