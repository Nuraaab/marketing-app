<section class="team-section section-padding fix">
            <div class="container">
                <div class="section-title">
                    <span class="wow fadeInUp">
                    {{!empty($siteData->team_title) ? $siteData->team_title :''}}
                    </span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                       {{!empty($siteData->team_subtitle) ? $siteData->team_subtitle : ''}}
                    </h2>
                </div>
                <div class="row">

                @if(isset($teams) && $teams->isNotEmpty())
                @foreach($teams as $team)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="single-team-style-1">
                            <div class="team-image ralt">
                                <img src="{{!empty($team->image) ? asset('admin/team_image/' . $team->image) : '' }}" alt="team-img">
                                <div class="icon-list">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-content center">
                                <h3>
                                    <a href="team-details.html">
                                    {{!empty($team->name) ? $team->name : ''}}
                                    </a>
                                </h3>
                                <p>
                                    {{!empty($team->role) ? $team->role : ''}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="col-12 text-center">
                    <h1 style ="color:#1c2539;">No team found</h1>
                </div>
                @endif
                </div>
            </div>
        </section>