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
								<li class="breadcrumb-item active" aria-current="page">Contact Section</li>
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


                <form action="{{route('create_contact')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="row mb-3">
                       <label for="formFile" class="form-label">Top Contact Section Title</label>
                        <input class="form-control form-control-lg mb-3" name="top_title" type="text" value = "{{$contactData ? $contactData->top_title : ''}}" placeholder="Enter Top Contact Title" aria-label=".form-control-lg example">
				  </div>

                <div class="row mb-3">
                       <label for="formFile" class="form-label">Top Contact Section Subtitle</label>
                        <input class="form-control form-control-lg mb-3" name="top_subtitle" type="text" value = "{{$contactData ? $contactData->top_subtitle : ''}}" placeholder="Enter Top Contact Subtitle" aria-label=".form-control-lg example">
				   </div>


                   <div class="row mb-3">
                        <label for="formFile" class="form-label">Contact Image</label>
                        <div id="contactPreviewContainer">
                            <!-- Display the existing contact image if available -->
                            @if(!empty($contactData) && !empty($contactData->image))
                                <img id="contactPreview" src="{{ asset('/admin/contact_image/' .$contactData->image) }}" width="200" class="rounded-3">
                            @else
                                <!-- Default placeholder if no image exists -->
                                <img id="contactPreview" width="200" class="rounded-3">
                            @endif
                        </div>
                    </div>

                <div class="row mb-3">
                    <input type="file" name="contact_image" id="contactImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewContactImage(event)">
                </div>

               
                    

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Top Contact Description</label>
                       <textarea class="form-control" id="input47" name="top_desc" rows="5"  placeholder="Enter Top Contact Description">{{$contactData ? $contactData->top_desc : ''}}</textarea>
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Contact Title</label>
                        <input class="form-control form-control-lg mb-3" name="title"  type="text" value = "{{$contactData ? $contactData->title : ''}}" placeholder="Enter Title" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Contact Subtitle</label>
                        <input class="form-control form-control-lg mb-3" name="subtitle"  type="text" value = "{{$contactData ? $contactData->subtitle : ''}}" placeholder="Enter Subtitle" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Contact Email</label>
                        <input class="form-control form-control-lg mb-3" name="email"  type="text" value = "{{$contactData ? $contactData->email : ''}}" placeholder="Enter Email" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Contact Phone</label>
                        <input class="form-control form-control-lg mb-3" name="phone" value = "{{$contactData ? $contactData->phone : ''}}"  type="text" placeholder="Enter Phone" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Contact Address</label>
                        <input class="form-control form-control-lg mb-3" name="address" value = "{{$contactData ? $contactData->adress : ''}}"  type="text" placeholder="Enter Address" aria-label=".form-control-lg example">
					 </div>
                     
                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Contact Map Link</label>
                        <input class="form-control form-control-lg mb-3" name="map_link" value = "{{$contactData ? $contactData->map_link : ''}}" type="text" placeholder="Enter Map Link" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Contact Button Text</label>
                        <input class="form-control form-control-lg mb-3" name="button_text" value = "{{$contactData ? $contactData->button_text : ''}}" type="text"  placeholder="Enter Contact Button Text" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                        <label for="formFile" class="form-label">Contact Button Url</label>
                        <input class="form-control form-control-lg mb-3" name="button_url" type="text" value = "{{$contactData ? $contactData->button_url : ''}}"  placeholder="Enter Contact Button Url" aria-label=".form-control-lg example">
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