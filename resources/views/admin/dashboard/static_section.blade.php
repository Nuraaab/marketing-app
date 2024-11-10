@extends('admin.dashboard.layout')
@section('content')


  <!--start header-->
  @include('admin.partials.header')
  <!--end top header-->


   <!--start sidebar-->
   <aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div class="logo-icon">
      <img src="{{ !empty($siteData->header_logo) ? asset('/admin/logo/' . $siteData->header_logo) : '' }}" class="logo-img" alt="Logo" style="width:50px;">
      </div>
      <div class="logo-name flex-grow-1">
        <h5 class="mb-0">Marketing</h5>
      </div>
      <div class="sidebar-close">
        <span class="material-icons-outlined">close</span>
      </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
          <li>
            <a href="/dashboard">
              <div class="parent-icon"><i class="material-icons-outlined">home</i>
              </div>
              <div class="menu-title">Dashboard</div>
            </a>
        
          <li class="menu-label">Site UI</li>
          
          <li>
            <a href="/static_section">
              <div class="parent-icon"><i class="material-icons-outlined">view_agenda</i>
              </div>
              <div class="menu-title">Top Section</div>
            </a>
          
          </li>
          <li>
            <a href="/company_feature_section">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">Feature Section</div>
            </a>
           
          </li>
          <li>
            <a href="/about_section">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">About Section</div>
            </a>   
          </li>

          <li>
            <a href="/service_section">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">Service Section</div>
            </a>   
          
          </li>


          <li>
            <a href="/team_section">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">Team Section</div>
            </a>   
          </li>


          <li>
            <a href="/why_us">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">Why Choose Us</div>
            </a>   
          </li>

          <li>
            <a class="has-arrow" >
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">Portfolio Section</div>
            </a>  
            <ul>
              <li><a href="/view_project"><i class="material-icons-outlined">arrow_right</i>Projects</a>
              </li>
             
              <li><a href="/view_category"><i class="material-icons-outlined">arrow_right</i>Categories</a>
              </li>
             
            
            </ul> 
          </li>

          <li>
            <a href="/faq_section">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">FAQ Section</div>
            </a>   
          </li>

          <li>
            <a href="/counter_section">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">Counter Section</div>
            </a>   
          </li>

          <li>
            <a href="/testimonial_section">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">Testimonial Section</div>
            </a>   
          </li>

          <li>
            <a href="/blog_section">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">Blog Section</div>
            </a>   
          </li>

          <li>
            <a href="/brand_section">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">Brand Section</div>
            </a>   
          </li>

          <li>
            <a  class="has-arrow">
              <div class="parent-icon"><i class="material-icons-outlined">sports_football</i>
              </div>
              <div class="menu-title">Pricing</div>
            </a>
            <ul>
              <li><a href="/view_package"><i class="material-icons-outlined">arrow_right</i>Packages</a>
              </li>
             
              <li><a href="/view_feature"><i class="material-icons-outlined">arrow_right</i>Features</a>
              </li>
              <li><a href="/package_cat"><i class="material-icons-outlined">arrow_right</i>Category</a>
              </li>
            
            </ul>
          </li>
          
          <li>
            <a href="/contact_section">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">Contact Section</div>
            </a>   
          </li>

         
          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
              </div>
              <div class="menu-title">Footer Section</div>
            </a>   
            <ul>
              <li><a href="icons-line-icons.html"><i class="material-icons-outlined">arrow_right</i>Footer Info</a>
              </li>
              <li><a href="icons-boxicons.html"><i class="material-icons-outlined">arrow_right</i>Footer Links</a>
              </li>
              <li><a href="icons-boxicons.html"><i class="material-icons-outlined">arrow_right</i>Footer Services</a>
              </li>
              <li><a href="icons-boxicons.html"><i class="material-icons-outlined">arrow_right</i>Footer Social Network</a>
              </li>
            </ul>
          </li>

          <li class="menu-label">Setting</li>
          <li>
            <a  href="javascript:;">
              <div class="parent-icon"><i class="material-icons-outlined">toc</i>
              </div>
              <div class="menu-title">Color Settings</div>
            </a>
          
          </li>
         </ul>
        <!--end navigation-->
    </div>
  </aside>
<!--end sidebar-->

  <!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Dashboard</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Top Section</li>
							</ol>
						</nav>
					</div>
				</div>

        
        <div class="card">
						<div class="card-body p-4">
            @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="{{ route('create_top_data') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <h6 class="mb-0 text-uppercase">Banner Section</h6>
              <hr>
              <div class="row mb-3">
                        <label for="formFile" class="form-label">Header Logo</label>
                        <div id="imagePreviewContainer">
                            <!-- Display the existing quote image if available -->
                            @if(!empty($staticSiteData) && !empty($staticSiteData->header_logo))
                                <img id="imagePreview" src="{{ asset('admin/logo/' .$staticSiteData->header_logo) }}" width="200" class="rounded-3">
                            @else
                                <!-- Default placeholder if no image exists -->
                                <img id="imagePreview" width="200" class="rounded-3">
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <input type="file" name="logo" id="quoteImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewLogo(event)">
                    </div>


                  <div class="row mb-3">
                       <label for="formFile" class="form-label">Banner Section Title</label>
                        <input class="form-control form-control-lg mb-3" name="banner_title" type="text" value = "{{$staticSiteData ? $staticSiteData->banner_title : ''}}" placeholder="Title" aria-label=".form-control-lg example">
								    
										</div>

                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Banner Section Subtitle</label>
                        <input class="form-control form-control-lg mb-3" name="banner_subtitle" type="text" placeholder="Enter Subtitle" value = "{{$staticSiteData ? $staticSiteData->banner_sub_title : ''}}" aria-label=".form-control-lg example">
								  
										</div>

                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Banner Section Button Name</label>
                        <input class="form-control form-control-lg mb-3" name="banner_button_name" value = "{{$staticSiteData ? $staticSiteData->banner_button_name : ''}}" type="text" placeholder="Enter Button Name" aria-label=".form-control-lg example">
								  
										</div>

                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Banner Section Button Url</label>
                        <input class="form-control form-control-lg mb-3" name="banner_button_url" value = "{{$staticSiteData ? $staticSiteData->banner_button_url : ''}}" type="text" placeholder="Enter Button Url" aria-label=".form-control-lg example">
								  
										</div>
								
                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Banner Section Video Button Name</label>
                        <input class="form-control form-control-lg mb-3" name="banner_video_button_name" value = "{{$staticSiteData ? $staticSiteData->banner_video_button : ''}}" type="text" placeholder="Enter Button Name" aria-label=".form-control-lg example">
										</div>

                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Banner Section Video Button Url</label>
                        <input class="form-control form-control-lg mb-3" name="banner_video_button_url" value = "{{$staticSiteData ? $staticSiteData->banner_video_url : ''}}" type="text" placeholder="Enter Button Url" aria-label=".form-control-lg example">
										</div>



                    <div class="row mb-3">
                      <label for="formFile" class="form-label">Banner Section Images</label>
                      <div id="bannerPreviewContainer" class="d-flex flex-wrap">
                          <!-- Display the existing images if available -->
                          @if($images && $images->isNotEmpty())
                              @foreach($images as $image)
                                  <img id="bannerPreview_{{ $loop->index }}" src="{{ asset('admin/banner/' . $image->banner_image) }}" width="150" height="150" class="rounded-3 m-2" alt="Banner Image">
                              @endforeach
                          @else
                              <!-- Default placeholder if no banner exists -->
                              <img id="bannerPreview" width="200" class="rounded-3" style="display:none;" alt="Banner Image">
                          @endif
                      </div>
                  </div>

                  <div class="row mb-3">
                      <input type="file" id="image-input" name="banner" accept=".jpg, .png, image/jpeg, image/png" multiple class="form-control" onchange="previewBanner(event)">
                  </div>
                  <h6 class="mb-0 text-uppercase">Call To Action Section</h6>
                  <hr>

                  <div class="row mb-3">
                       <label for="formFile" class="form-label">Call To Action Title</label>
                        <input class="form-control form-control-lg mb-3" name="cta_title" type="text" value = "{{$staticSiteData ? $staticSiteData->cta_title : ''}}" placeholder="Call To Action Title" aria-label=".form-control-lg example">
								    
										</div>

                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Call To Action Subtitle</label>
                        <input class="form-control form-control-lg mb-3" name="cta_subtitle" type="text" value = "{{$staticSiteData ? $staticSiteData->cta_subtitle : ''}}" placeholder="Call To Action Subtitle" aria-label=".form-control-lg example">
								    
										</div>

                    <div class="row mb-3">
                        <label for="formFile" class="form-label">Call To Action Image</label>
                        <div id="ctaPreviewContainer">
                            <!-- Display the existing quote cta if available -->
                            @if(!empty($staticSiteData) && !empty($staticSiteData->cta_image))
                                <img id="ctaPreview" src="{{ asset('admin/cta_image/' .$staticSiteData->cta_image) }}" width="200" class="rounded-3">
                            @else
                                <!-- Default placeholder if no cta exists -->
                                <img id="ctaPreview" width="200" class="rounded-3">
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <input type="file" name="cta_image" id="imageCtaInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewCta(event)">
                    </div>

                    <h6 class="mb-0 text-uppercase">Social Midea Links</h6>
                    <hr>

                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Facebook Link</label>
                        <input class="form-control form-control-lg mb-3" name="facebook_url" type="text" value = "{{$staticSiteData ? $staticSiteData->facebook_url : ''}}" placeholder="Facebook Link" aria-label=".form-control-lg example">
								    
										</div>


                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Youtube Link</label>
                        <input class="form-control form-control-lg mb-3" name="youtube_url" type="text" value = "{{$staticSiteData ? $staticSiteData->youtube_url : ''}}" placeholder="Youtube Link" aria-label=".form-control-lg example">
								    
										</div>

                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Twitter Link</label>
                        <input class="form-control form-control-lg mb-3" name="twitter_url" type="text" value = "{{$staticSiteData ? $staticSiteData->twitter_url : ''}}" placeholder="Twitter Link" aria-label=".form-control-lg example">
								    
										</div>

                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Linkedin Link</label>
                        <input class="form-control form-control-lg mb-3" name="linkden_url" type="text" value = "{{$staticSiteData ? $staticSiteData->linkden_url : ''}}" placeholder="Linkedin Link" aria-label=".form-control-lg example">
								    
										</div>


                    <h6 class="mb-0 text-uppercase">Footer Data</h6>
                    <hr>


                    <div class="row mb-3">
                        <label for="formFile" class="form-label">Footer Logo</label>
                        <div id="footerLogoPreviewContainer">
                            <!-- Display the existing quote footerLogo if available -->
                            @if(!empty($staticSiteData) && !empty($staticSiteData->footer_logo))
                                <img id="footerLogoPreview" src="{{ asset('admin/logo/' .$staticSiteData->footer_logo) }}" width="200" class="rounded-3">
                            @else
                                <!-- Default placeholder if no footerLogo exists -->
                                <img id="footerLogoPreview" width="200" class="rounded-3">
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <input type="file" name="footer_logo" id="imagefooterLogoInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml"  onchange="previewFooterLogo(event)">
                    </div>


                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Footer Description</label>
                        <input class="form-control form-control-lg mb-3" name="footer_desc" type="text" value = "{{$staticSiteData ? $staticSiteData->footer_desc : ''}}" placeholder="Footer Description" aria-label=".form-control-lg example">
								    
										</div>


                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Newsletter Title</label>
                        <input class="form-control form-control-lg mb-3" name="newsletter_title" type="text" value = "{{$staticSiteData ? $staticSiteData->newsletter_title : ''}}" placeholder="Newsletter Title" aria-label=".form-control-lg example">
								    
										</div>


                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Newsletter Subtitle</label>
                        <input class="form-control form-control-lg mb-3" name="newsletter_subtitle" type="text" value = "{{$staticSiteData ? $staticSiteData->newsletter_subtitle : ''}}" placeholder="Newsletter Subtitle" aria-label=".form-control-lg example">
								    
										</div>

                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Copy Right Text</label>
                        <input class="form-control form-control-lg mb-3" name="copyright_text" type="text" value = "{{$staticSiteData ? $staticSiteData->copyright_text : ''}}" placeholder="Copy Right Text" aria-label=".form-control-lg example">
								    
										</div>

										<div class="row">
											<label class="col-sm-3 col-form-label"></label>
											<div class="col-sm-9">
												<div class="d-md-flex d-grid">
													<button type="submit" style="color:white;" class="btn btn-grd-royal px-4">Update</button>
												</div>
											</div>
										</div>
									</div>
								</div>  
                </form>

</div>
</div>
                
    </div>
  </main>
  <!--end main wrapper-->

  <!--start overlay-->
     <div class="overlay btn-toggle"></div>
  <!--end overlay-->

   <!--start footer-->
  @include('admin.partials.footer')
  <!--end footer-->

  <!--start cart-->

  <!--end cart-->



  <!--start switcher-->
 @include('admin.partials.theme_switcher')
  <!--start switcher-->

  <!--bootstrap js-->
 @endsection