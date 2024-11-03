@extends('admin.dashboard.layout')
@section('content')


  <!--start header-->
  @include('admin.partials.header')
  <!--end top header-->


   <!--start sidebar-->
 @include('admin.partials.sidebar')
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