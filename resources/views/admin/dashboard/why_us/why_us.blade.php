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
								<li class="breadcrumb-item active" aria-current="page">Choose Us</li>
							</ol>
						</nav>
					</div>
				</div>




                <div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
              <div class="card-body">
               <div class="d-flex align-items-start justify-content-between mb-3">
                  <div class="">
                    <h5 class="mb-0">Choose Us</h5>
                
                  </div>
                  <div class="dropdown">
                  <div class="col">
                    <a href = "/why_us" class="btn btn-dark px-4 mt-4 raised d-flex gap-2"><i class="material-icons-outlined" >add</i>Add New</a>
                  </div>
                  </div>
                </div>
                <div class="order-search position-relative my-3">
                  <input class="form-control rounded-5 px-5" type="text" placeholder="Search">
                  <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
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
                </div>
                 <div class="table-responsive">
                 <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Feature Icon</th>
                            <th>Package Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($why_us as $why)
                        <tr>
                        <td>
                              <div class="d-flex align-items-center gap-3">
                                 <div class="">
                                    <img src="{{ asset('admin/why_image/' . $why->icon) }}" class="rounded-circle" width="50" height="50" alt="">
                                 </div>
                              </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$why->title}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$why->desc}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                        <span class="material-icons-outlined fs-5">more_vert</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWhy{{$why->id}}">
                                                <span class="material-icons-outlined fs-5 me-2">edit</span>
                                                Edit
                                            </a>

                                        </li>
                                        <li>
                                        <form action="{{ route('why_us.destroy', $why->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this data?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type ="submit" class="dropdown-item d-flex align-items-center" href="javascript:;" style ="border:none">
                                                <span class="material-icons-outlined fs-5 me-2">delete</span>
                                                Delete
                                            </button>
                                        </form>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </td>
                        </tr>
                            <!-- edit start -->
                        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWhy{{$why->id}}">
                            <div class="offcanvas-header border-bottom h-70">
                                <div class="">
                                    <p class="mb-0">Edit Choose us</p>
                                </div>
                                <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                                    <i class="material-icons-outlined">close</i>
                                </a>
                            </div>
                            <div class="offcanvas-body">
                            <form action="{{route('edit_why_us', ['id' =>$why->id])}}" method="POST" enctype="multipart/form-data">
                              @csrf
                               <!-- icon start -->
                               <div class="row mb-3">
                                    <label for="formFile" class="form-label">Why Us Icon</label>
                                    <div id="whyIconPreviewContainer">
                                        @if(!empty($why) && !empty($why->icon))
                                        <img id="whyIconPreview" src = "{{asset('admin/why_image/'. $why->icon)}}" width="200" class="rounded-3">
                                        @else
                                        <img id="whyIconPreview" width="200" class="rounded-3">
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <input type="file" name="icon" id="whyIconImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewWhyIcon(event)">
                                </div>
                                <!-- icon end -->


                                <!-- name start -->
                                <div class="row mb-3">
                                <label for="formFile" class="form-label">Why Us Section Name</label>
                                    <input class="form-control form-control-lg mb-3" name="why_name" value = "{{$why->title}}"  type="text" placeholder="Enter Name" aria-label=".form-control-lg example">
                                </div>
                                <!-- name end -->
                                

                                <!-- description start -->
                                <div class="row mb-3">
                                <label for="formFile" class="form-label">Why Us Section Description</label>
                                <textarea class="form-control" id="input47" name="desc" value = "{{$why->desc}}" rows="5" placeholder="Enter Description">{{$why->desc}}</textarea>
                                </div>
                                <!-- description end -->

                                <!-- button start -->
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <div class="d-md-flex d-grid">
                                            <button type="submit" style="color:white;" class="btn btn-grd-royal px-4">Update</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- button end -->
                        </form>
                        </div>
                        </div>
                        <!-- edit end -->
                        @endforeach
                    </tbody>
                </table>
                 </div>
              </div>
            </div>
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