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
								<li class="breadcrumb-item active" aria-current="page">About Section</li>
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


                <form action="{{route('create_about')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="row mb-3">
                       <label for="formFile" class="form-label">About Section Title</label>
                        <input class="form-control form-control-lg mb-3" name="about_title" type="text" value = "{{$staticSiteData ? $staticSiteData->about_title : ''}}" placeholder="Enter About Title" aria-label=".form-control-lg example">
								    
                </div>


                <div class="row mb-3">
                        <label for="formFile" class="form-label">About Image</label>
                        <div id="aboutPreviewContainer">
                            <!-- Display the existing image if available -->
                            @if(!empty($aboutData) && !empty($aboutData->about_image))
                                <img id="aboutPreview" src="{{ asset('admin/about_image/' .$aboutData->about_image) }}" width="200" class="rounded-3">
                            @else
                                <!-- Default placeholder if no image exists -->
                                <img id="aboutPreview" width="200" class="rounded-3">
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <input type="file" name="about_image" id="aboutImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewAbout(event)">
                    </div>

                    <div class="row mb-3">
                        <label for="formFile" class="form-label">About Quote Image</label>
                        <div id="quotePreviewContainer">
                            <!-- Display the existing quote image if available -->
                            @if(!empty($aboutData) && !empty($aboutData->quote_image))
                                <img id="quotePreview" src="{{ asset('/admin/about_image/' .$aboutData->quote_image) }}" width="200" class="rounded-3">
                            @else
                                <!-- Default placeholder if no image exists -->
                                <img id="quotePreview" width="200" class="rounded-3">
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <input type="file" name="about_quote_image" id="quoteImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewQuote(event)">
                    </div>





                    <div class="row mb-3">
                       <label for="formFile" class="form-label">About Section Subtitle</label>
                        <input class="form-control form-control-lg mb-3" name="about_subtitle" value = "{{$aboutData ? $aboutData->subtitle : ''}}" type="text" placeholder="Enter Subtitle" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">About Section Normal Text</label>
                        <input class="form-control form-control-lg mb-3" name="normal_text" type="text" value = "{{$aboutData ? $aboutData->normal_text : ''}}" placeholder="Enter About Normal Text" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">About Section Highlighted Text</label>
                        <input class="form-control form-control-lg mb-3" name="highlighted_text" type="text" value = "{{$aboutData ? $aboutData->highlighted_text : ''}}" placeholder="Enter About Highlighted Text" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                        <label for="formFile" class="form-label">About Section Content</label>
                        <textarea class="form-control" id="input47" name="about_content" rows="5" placeholder="Enter About Content">{{ $aboutData ? $aboutData->content : '' }}</textarea>
                        </div>


                     <div class="row mb-3">
                       <label for="formFile" class="form-label">About Section Button Name</label>
                        <input class="form-control form-control-lg mb-3" name="about_button_name" value = "{{$aboutData ? $aboutData->about_button_name : ''}}" type="text" placeholder="Enter About Button Name" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">About Section Button Url</label>
                        <input class="form-control form-control-lg mb-3" name="about_button_url" value = "{{$aboutData ? $aboutData->about_button_url : ''}}" type="text" placeholder="Enter About Button Url" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">About Section Completed Project</label>
                        <input class="form-control form-control-lg mb-3" name="completed_project" value = "{{$aboutData ? $aboutData->project_completed : ''}}" type="text" placeholder="Enter Completed Project" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">About Section Years Of Experiance</label>
                        <input class="form-control form-control-lg mb-3" name="years_of_experiance" type="text" value = "{{$aboutData ? $aboutData->years_of_experience : ''}}" placeholder="Enter Years Of Experiance" aria-label=".form-control-lg example">
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