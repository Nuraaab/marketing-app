<!-- <section class="pricing-section fix section-padding section-bg-2">
            <div class="dot-shape">
                <img src="front/assets/img/choose-us/line.png" alt="dot-img">
            </div>
            <div class="arrow-shape float-bob-y">
                <img src="front/assets/img/pricing/arrow.png" alt="arrow-img">
            </div>
            <div class="dot-shape-2">
                <img src="front/assets/img/news/circle-shape.png" alt="dot-img">
            </div>
            <div class="container">
                <div class="section-title">
                    <span class="wow fadeInUp">
                    {{!empty($siteData->package_title) ? $siteData->package_title : ''}}
                    </span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    {{!empty($siteData->package_subtitle) ? $siteData->package_subtitle : ''}}
                    </h2>
                </div>

                @if(isset($packages) && $packages->isNotEmpty())
                <div class="row">
                    @foreach($packages as $package)
                    <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="single-pricing-items {{$package->is_popular == '1' ? 'active-tag' : '' }} ">
                            <div class="icon">
                                <img src="{{!empty($package->icon) ? asset('/admin/package_image/' .$package->icon) : ''}}" alt="icon-img">
                            </div>
                            <div class="content">
                                <h3>
                                {{!empty($package->name) ? $package->name : ''}}
                                </h3>
                                <p>
                                {{!empty($package->desc) ? $package->desc : ''}}
                                </p>
                            </div>
                            <div class="price-plan">
                                <h2>
                                {{!empty($package->unit) ? $package->unit : ''}}{{!empty($package->price) ? $package->price : ''}}
                                </h2>
                            </div>
                            <ul>
                                @foreach($package->features as $feature)
                                <li class="{{ $feature->status == '1' ? 'icon' : 'icon-2' }}">
                                    <i class="{{$feature->status == '1' ? 'fas fa-check' :  'fas fa-times'}}"></i>{{!empty($feature->name) ? $feature->name : ''}}
                                </li>
                                @endforeach
                            
                            </ul>
                            <a href="#" class="theme-btn  mt-5">
                            Choose Package
                            </a>
                        </div>
                    </div>
                    @endforeach

            
                </div>

                @else
                <div class="col-12 text-center">
                    <h1 style ="color:#fff;">No packages found</h1>
                </div>
                @endif
            </div>
        </section> -->


        <section id="pricing-section"  class="pricing-section fix section-padding section-bg-2">
            <div class="container">
                <!-- Categories Section -->
                <div class="section-title">
                    <span class="wow fadeInUp">
                        {{ $siteData->package_title ?? '' }}
                    </span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        {{ $siteData->package_subtitle ?? '' }}
                    </h2>
                </div>

                <!-- Category Buttons -->
                <div class="category-list text-center">
                    <a href="{{ url()->current() }}#pricing-section" class="theme-btn mt-5 {{ $selectedCategory === 'all' ? 'active' : '' }}">All</a>
                    @foreach($categories as $category)
                        <a href="{{ url()->current() }}?category={{ $category->name }}#pricing-section" 
                        class="theme-btn mt-5 {{ $selectedCategory === $category->name ? 'active' : '' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach

                    <!-- <a href="{{ url()->current() }}?category=app#pricing-section" class="theme-btn mt-5 {{ $selectedCategory === 'app' ? 'active' : '' }}">App</a> -->
                </div>


                <!-- Packages Display -->
                @if($packages->isNotEmpty())
                <div class="row package-list">
                    @foreach($packages as $package)
                    <div class="col-xl-4 col-lg-6 wow fadeInUp package-item" data-wow-delay=".5s">
                        <div class="single-pricing-items {{ $package->is_popular == '1' ? 'active-tag' : '' }}">
                            <div class="icon">
                                <img src="{{ asset('/admin/package_image/' . ($package->icon ?? '')) }}" alt="icon-img">
                            </div>
                            <div class="content">
                                <h3>{{ $package->name ?? '' }}</h3>
                                <p>{{ $package->desc ?? '' }}</p>
                            </div>
                            <div class="price-plan">
                                <h2>{{ $package->unit ?? '' }}{{ $package->price ?? '' }}</h2>
                            </div>
                            <ul>
                                @foreach($package->features as $feature)
                                <li class="{{ $feature->status == '1' ? 'icon' : 'icon-2' }}">
                                    <i class="{{ $feature->status == '1' ? 'fas fa-check' : 'fas fa-times' }}"></i>
                                    {{ $feature->name ?? '' }}
                                </li>
                                @endforeach
                            </ul>
                            <form action="{{ route('checkout') }}" method="POST">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $package->id }}">
                                <button type="submit" class="theme-btn mt-5">Choose Package</button>
                            </form>

                            <!-- <form action="/test" method="POST">
                                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                                 <button href="#" class="theme-btn mt-5">Choose Package</button>
                            </form> -->
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="col-12 text-center">
                    <h1 style="color:#fff;">No packages found</h1>
                </div>
                @endif
            </div>
        </section>

