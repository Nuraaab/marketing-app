<section class="contact-section section-padding pb-0 fix ralt">
            <div class="dot-shape">
                <img src="front/assets/img/contact/dot.png" alt="dot-img">
            </div>
            <div class="frame-shape">
                <img src="front/assets/img/contact/frame.png" alt="frame-img">
            </div>
            <div class="frame-shape-2">
                <img src="front/assets/img/contact/frame.png" alt="frame-img">
            </div>
            @if(isset($contacts))
            <div class="container">
                <div class="single-contact-us">
                    <div class="row justify-content-between">
                        <div class="col-xxl-5 col-xl-5 col-lg-6">
                            <div class="section-title-content">
                                <span class="wow fadeInLeft">
                                {{!empty($contacts->top_title) ? $contacts->top_title : ''}}
                                </span>
                                <h2 class="wow fadeInLeft" data-wow-delay=".2">
                                {{!empty($contacts->top_subtitle) ? $contacts->top_subtitle : ''}}
                                </h2>
                            </div>
                            <p class="wow fadeInLeft" data-wow-delay=".4">
                            {{!empty($contacts->top_desc) ? $contacts->top_desc : ''}}
                            </p>
                            <div class="contact-info-item d-flex align-items-center wow fadeInLeft" data-wow-delay=".2s">
                                <i class="far fa-envelope"></i>
                                <div class="content">
                                    <p>
                                        Email Us
                                    </p>
                                    <h3>
                                    {{!empty($contacts->email) ? $contacts->email : ''}}
                                    </h3>
                                </div>
                            </div>
                            <div class="contact-info-item d-flex align-items-center wow fadeInLeft" data-wow-delay=".4s">
                                <i class="far fa-phone-alt"></i>
                                <div class="content">
                                    <p>
                                        Call Us
                                    </p>
                                    <h3>
                                    {{!empty($contacts->phone) ? $contacts->phone : ''}}
                                    </h3>
                                </div>
                            </div>
                            <div class="contact-info-item d-flex align-items-center wow fadeInLeft" data-wow-delay=".6s">
                                <i class="far fa-map-marker-alt"></i>
                                <div class="content">
                                    <p>
                                        Location
                                    </p>
                                    <h3>
                                    {{!empty($contacts->adress) ? $contacts->adress : ''}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-7 col-lg-8 wow tpfadeRight" data-wow-delay=".8s">
                            <div class="contact-image">
                                <img src="{{!empty($contacts->image) ? asset('admin/contact_image/' . $contacts->image) : '' }}" alt="contact-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-12 text-center">
                <h1 style ="color:#000;">No contact info found</h1>
            </div>
            @endif
        </section>
         <section class="solar-contact-section fix section-padding">
            <div class="container">
                <div class="solar-contact-wrapper">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6"></div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-section">
                                <div class="section-title-content">
                                    <div class="section-both wow fadeInUp" data-wow-delay=".2s">
                                        <span>{{!empty($contacts->title) ? $contacts->title : ''}}</span>
                                    </div>
                                    <h2 class="wow fadeInUp" data-wow-delay=".4s">
                                    {{!empty($contacts->subtitle) ? $contacts->subtitle : ''}}
                                    </h2>
                                </div>
                                <div class="contact-right">
                                    <form>
                                        <div class="row g-4">
                                            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".2">
                                                <div class="form-clt">
                                                    <input type="text" name="name" id="name" placeholder="Full Name">
                                                    <div class="icon">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".4">
                                                <div class="form-clt">
                                                    <input type="text" name="email" id="email" placeholder="info@web">
                                                    <div class="icon">
                                                        <i class="fas fa-envelope-open"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".6">
                                                <div class="form-clt">
                                                    <input type="text" name="location" id="location" placeholder="Location">
                                                    <div class="icon">
                                                        <i class="fas fa-globe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".7">
                                                <div class="form-clt">
                                                    <select name="card1">
                                                        <option value="1">
                                                            Service Name
                                                        </option>
                                                        <option value="1">
                                                            Solar Service
                                                        </option>
                                                        <option value="1">
                                                            Solar Service
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 wow fadeInUp" data-wow-delay=".8">
                                                <div class="form-clt-big form-clt">
                                                    <textarea name="message" id="message" placeholder="Write Comments"></textarea>
                                                    <div class="icon">
                                                        <i class="fas fa-pencil"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <button type="submit" class="theme-btn">{{!empty($contacts->button_text) ? $contacts->button_text : ''}}<i class="fa-solid fa-angles-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="form-message"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map-item">
                <div class="google-map">
                    <iframe src="{{!empty($contacts->map_link) ? $contacts->map_link : ''}}" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>