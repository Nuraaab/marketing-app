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
								<li class="breadcrumb-item active" aria-current="page">Blog Section</li>
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


                <form action="{{route('create_blog')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="row mb-3">
                       <label for="formFile" class="form-label">Blog Section Title</label>
                        <input class="form-control form-control-lg mb-3" name="blog_title" type="text" value = "{{$staticSiteData ? $staticSiteData->blog_title : ''}}" placeholder="Enter Blog Title" aria-label=".form-control-lg example">
				  </div>

                <div class="row mb-3">
                       <label for="formFile" class="form-label">Blog Section Subtitle</label>
                        <input class="form-control form-control-lg mb-3" name="blog_subtitle" type="text" value = "{{$staticSiteData ? $staticSiteData->blog_subtitle : ''}}" placeholder="Enter Blog Subtitle" aria-label=".form-control-lg example">
				   </div>


                

                   <div class="mb-4">
									<label for="single-select-clear-field" class="form-label">Blog Category</label>
									 <select class="form-select" name ="category" id="single-select-clear-field" data-placeholder="Choose one thing">
										 
										 <option>Reactive</option>
										 <option>Solution</option>
										 <option>Conglomeration</option>
										 <option>Algoritm</option>
										 <option>Holistic</option>
									 </select>
								 </div>




                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="text" name = "date" class="form-control datepicker">
                </div>
            
                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Author</label>
                        <input class="form-control form-control-lg mb-3" name="author"  type="text" placeholder="Enter Author" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Blog Title</label>
                        <input class="form-control form-control-lg mb-3" name="title"  type="text" placeholder="Enter Author" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Blog Description</label>
                       <textarea class="form-control" id="input47" name="desc" rows="5" placeholder="Enter Blog Description"></textarea>
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Blog Button Text</label>
                        <input class="form-control form-control-lg mb-3" name="button_text" type="text"  placeholder="Enter Blog Button Text" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                        <label for="formFile" class="form-label">Blog Button Url</label>
                        <input class="form-control form-control-lg mb-3" name="button_url" type="text"  placeholder="Enter Blog Button Url" aria-label=".form-control-lg example">
                        </div>

                        <div class="row mb-3">
                        <label for="formFile" class="form-label">Blog Image</label>
                            <div id="blogPreviewContainer">
                                    <img id="blogPreview" width="200" class="rounded-3">
                            </div>
                        </div>

                            <div class="row mb-3">
                                <input type="file" name="blog_image" id="blogImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" onchange="previewBlogImage(event)">
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