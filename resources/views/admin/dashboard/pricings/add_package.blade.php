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
								<li class="breadcrumb-item active" aria-current="page">Package Section</li>
							</ol>
						</nav>
					</div>
				</div>


                <div class="card">
                <div class="card-body p-4">
                    
                <div class="d-flex align-items-start justify-content-between mb-3">
                  <div class="">
                    <h5 class="mb-0">Add Packages</h5>
                  </div>
                  <div class="dropdown">
                  <div class="col">
                  <div class="col">
                    <a href = "/view_package"type="button" class="btn btn-outline-primary btn-circle rounded-circle d-flex gap-2 wh-48"><i class="material-icons-outlined">remove_red_eye</i></a>
                  </div>
                  </div>
                  </div>
                </div>

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


                <form action="{{route('create_package')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="row mb-3">
                       <label for="formFile" class="form-label">Package Section Title</label>
                        <input class="form-control form-control-lg mb-3" name="package_title" type="text" value = "{{$staticSiteData ? $staticSiteData->package_title : ''}}" placeholder="Enter Package Title" aria-label=".form-control-lg example">
				  </div>

                <div class="row mb-3">
                       <label for="formFile" class="form-label">Package Section Subtitle</label>
                        <input class="form-control form-control-lg mb-3" name="package_subtitle" type="text" value = "{{$staticSiteData ? $staticSiteData->package_subtitle : ''}}"  placeholder="Enter Package Subtitle" aria-label=".form-control-lg example">
				   </div>


                <div class="row mb-3">
                    <label for="formFile" class="form-label">Package Icon</label>
                    <div id="packagePreviewContainer">
                            <img id="packagePreview" width="200" class="rounded-3">
                    </div>
                </div>

                <div class="row mb-3">
                    <input type="file" name="package_image" id="packageImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewPackageImage(event)">
                </div>

                <div class="row mb-3">
                       <label for="formFile" class="form-label">Package Name</label>
                        <input class="form-control form-control-lg mb-3" name="name" type="text"  placeholder="Enter Package Name" aria-label=".form-control-lg example">
				   </div>

                
                   <div class="mb-4">
                        <label for="package-select" class="form-label">Select Category</label>
                        <select class="form-select" name="category" id="package-select" data-placeholder="Choose one">
                            @foreach($catagories as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                   <div class="mb-4">
                    <label for="single-select-clear-field" class="form-label">Is This Package Popular?</label>
                        <select class="form-select" name ="is_popular" id="single-select-clear-field" data-placeholder="Choose one thing">
                            <option>No</option>
                            <option>Yes</option>
                        </select>
                    </div>

                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Package Description</label>
                       <textarea class="form-control" id="input47" name="desc" rows="5" placeholder="Enter Package Description"></textarea>
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Package Price</label>
                        <input class="form-control form-control-lg mb-3" name="price" type="number"  placeholder="Enter Package Price" aria-label=".form-control-lg example">
				   </div>

                   <div class="mb-4">
                    <label for="single-select-clear-field" class="form-label">Unit</label>
                        <select class="form-select" name ="unit" id="single-select-clear-field" data-placeholder="Choose one thing">
                            <option>USD($)</option>
                            <option>ETB</option>
                        </select>
                    </div>


                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Button Text</label>
                        <input class="form-control form-control-lg mb-3" name="button_text" type="text"  placeholder="Enter Button Name" aria-label=".form-control-lg example">
				   </div>

                   <div class="row mb-3">
                       <label for="formFile" class="form-label">Button Url</label>
                        <input class="form-control form-control-lg mb-3" name="button_url" type="text"  placeholder="Enter Button Url" aria-label=".form-control-lg example">
				   </div>


                     <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <div class="d-md-flex d-grid">
                            <button type="submit" style="color:white;" class="btn btn-grd-royal px-4">Update</button>
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