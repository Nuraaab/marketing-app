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
								<li class="breadcrumb-item active" aria-current="page">Why Us Section</li>
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


                <form action="{{route('create_why')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="row mb-3">
                       <label for="formFile" class="form-label">Why Us Section Title</label>
                        <input class="form-control form-control-lg mb-3" name="why_title" type="text" value = "{{$staticSiteData ? $staticSiteData->why_choose_us_title : ''}}" placeholder="Enter Why Us Title" aria-label=".form-control-lg example">
								    
                </div>

                <div class="row mb-3">
                       <label for="formFile" class="form-label">Why Us Section Subtitle</label>
                        <input class="form-control form-control-lg mb-3" name="why_subtitle" type="text" value = "{{$staticSiteData ? $staticSiteData->why_choose_us_subtitle : ''}}" placeholder="Enter Why Us Subitle" aria-label=".form-control-lg example">
								    
                </div>

                <div class="row mb-3">
                       <label for="formFile" class="form-label">Why Us Section Description</label>
                       <textarea class="form-control" id="input47" name="why_desc" rows="5" placeholder="Enter Why us Description">{{ $staticSiteData ? $staticSiteData->why_choose_us_description : '' }}</textarea>
								    
                </div>


                <div class="row mb-3">
                        <label for="formFile" class="form-label">Why Us Image</label>
                        <div id="whyPreviewContainer">
                            <!-- Display the existing image if available -->
                            @if(!empty($staticSiteData) && !empty($staticSiteData->why_choose_us_image))
                                <img id="whyPreview" src="{{ asset('admin/why_image/' .$staticSiteData->why_choose_us_image) }}" width="200" class="rounded-3">
                            @else
                                <!-- Default placeholder if no image exists -->
                                <img id="whyPreview" width="200" class="rounded-3">
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <input type="file" name="why_image" id="aboutImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewWhy(event)">
                    </div>

                    <div class="row mb-3">
                        <label for="formFile" class="form-label">Why Us Icon</label>
                        <div id="whyIconPreviewContainer">
                            @if(!empty($whyUsData) && !empty($whyUsData->icon))
                                <img id="whyIconPreview" src="{{ asset('/admin/why_image/' .$whyUsData->icon) }}" width="200" class="rounded-3">
                            @else
                                <!-- Default placeholder if no image exists -->
                                <img id="whyIconPreview" width="200" class="rounded-3">
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <input type="file" name="icon" id="whyIconImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewWhyIcon(event)">
                    </div>

                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Why Us Section Name</label>
                        <input class="form-control form-control-lg mb-3" name="why_name"  type="text" placeholder="Enter Name" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Why Us Section Description</label>
                       <textarea class="form-control" id="input47" name="desc" rows="5" placeholder="Enter Description"></textarea>
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