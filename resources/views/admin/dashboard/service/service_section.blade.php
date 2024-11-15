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
								<li class="breadcrumb-item active" aria-current="page">Service Section</li>
							</ol>
						</nav>
					</div>
				</div>


                <div class="card">
                <div class="card-body p-4">

                <div class="d-flex align-items-start justify-content-between mb-3">
                  <div class="">
                    <h5 class="mb-0">Add Project</h5>
                  </div>
                  <div class="dropdown">
                  <div class="col">
                  <div class="col">
                    <a href = "/view_services"type="button" class="btn btn-outline-primary btn-circle rounded-circle d-flex gap-2 wh-48"><i class="material-icons-outlined">remove_red_eye</i></a>
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


                <form action="{{route('create_service')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="row mb-3">
                       <label for="formFile" class="form-label">Service Section Title</label>
                        <input class="form-control form-control-lg mb-3" name="service_title" type="text" value = "{{$staticSiteData ? $staticSiteData->service_title : ''}}" placeholder="Enter Service Title" aria-label=".form-control-lg example">
				  </div>

                <div class="row mb-3">
                       <label for="formFile" class="form-label">Service Section Subtitle</label>
                        <input class="form-control form-control-lg mb-3" name="service_subtitle" type="text" value = "{{$staticSiteData ? $staticSiteData->service_subtitle : ''}}" placeholder="Enter Service Subtitle" aria-label=".form-control-lg example">
				   </div>


                <div class="row mb-3">
                    <label for="formFile" class="form-label">Service Image</label>
                    <div id="servicePreviewContainer">
                            <img id="servicePreview" width="200" class="rounded-3">
                    </div>
                </div>

                <div class="row mb-3">
                    <input type="file" name="service_image" id="serviceImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewServiceImage(event)">
                </div>

                <div class="row mb-3">
                    <label for="formFile" class="form-label">Service Icon</label>
                    <div id="serviceIconPreviewContainer">
                            <img id="serviceIconPreview" width="200" class="rounded-3">
                    
                    </div>
                </div>

                <div class="row mb-3">
                    <input type="file" name="service_icon" id="serviceIconInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewServiceIcon(event)">
                </div>
                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Service Name</label>
                        <input class="form-control form-control-lg mb-3" name="name"  type="text" placeholder="Enter Service Name" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Service Content</label>
                       <textarea class="form-control" id="input47" name="content" rows="5" placeholder="Enter Service Content"></textarea>
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Service Button Text</label>
                        <input class="form-control form-control-lg mb-3" name="button_text" type="text"  placeholder="Enter Service Button Text" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                        <label for="formFile" class="form-label">Service Button Url</label>
                        <input class="form-control form-control-lg mb-3" name="button_url" type="text"  placeholder="Enter Service Button Url" aria-label=".form-control-lg example">
                        </div>
                     <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <div class="d-md-flex d-grid">
                            <button type="submit" style="color:white;" class="btn btn-grd-royal px-4">Add</button>
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