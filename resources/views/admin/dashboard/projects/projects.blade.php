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
								<li class="breadcrumb-item active" aria-current="page">Projects</li>
							</ol>
						</nav>
					</div>
				</div>




            <div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
              <div class="card-body">
               <div class="d-flex align-items-start justify-content-between mb-3">
                  <div class="">
                    <h5 class="mb-0">Projects</h5>
                  </div>
                  <div class="dropdown">
                  <div class="col">
                    <a href="/portfolio_section" class="btn btn-dark px-4 mt-4 raised d-flex gap-2"><i class="material-icons-outlined">add</i>Add New</a>
                  </div>
                  </div>
                </div>
                <div class="order-search position-relative my-3">
                  <input class="form-control rounded-5 px-5" type="text" placeholder="Search">
                  <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                 
                </div>
                 <div class="table-responsive">
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
                     <table class="table align-middle">
                       <thead>
                        <tr>
                          <th>Project Name</th>
                          <th>Description</th>
                          <th>Client</th>
                          <th>Address</th>
                          <th>Category</th>
                          <th>Button Text</th>
                          <th>Button Url</th>
                          <th>Action</th>
                        </tr>
                       </thead>
                        <tbody>
                        @foreach($projects as $project)
                          <tr>
                            <td>
                              <div class="d-flex align-items-center gap-3">
                                 <div class="">
                                    <img src="{{ asset('/admin/portfolio_image/' .$project->icon) }}" class="rounded-circle" width="50" height="50" alt="">
                                 </div>
                                 <p class="mb-0">{{$project->name}} </p>
                              </div>
                            </td>
                            <td>{{ \Illuminate\Support\Str::limit($project->desc, 50, '') }}...</td>
                            <td>{{$project->client}}</td>
                            <td>{{$project->address}}</td>
                            <td>{{$project->category}}</td>
                            <td>{{$project->button_text}}</td>
                            <td>{{$project->button_url}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                        <span class="material-icons-outlined fs-5">more_vert</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasProject{{$project->id}}">
                                                <span class="material-icons-outlined fs-5 me-2">edit</span>
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                        <form action="{{ route('project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type ="submit" class="dropdown-item d-flex align-items-center" href="javascript:;">
                                                <span class="material-icons-outlined fs-5 me-2">delete</span>
                                                Delete
                                            </button>
                                        </form>
                                        </li>

                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasProjectImages{{$project->id}}">
                                                <span class="material-icons-outlined fs-5 me-2">edit</span>
                                                Project Images
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>

                              <!-- edit start -->
                              <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasProjectImages{{$project->id}}">
                                <div class="offcanvas-header border-bottom h-70">
                                    <div class="">
                                        <p class="mb-0">Edit Project</p>
                                    </div>
                                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                                        <i class="material-icons-outlined">close</i>
                                    </a>
                                </div>
                                <div class="offcanvas-body">
                                <!-- table -->
                                 
                                <div class="row mb-3">
                                  <label for="formFile" class="form-label">{{$project->projectImage->isNotEmpty() ? 'Project Images' : ''}}</label>
                                  <div id="bannerPreviewContainer" class="d-flex flex-wrap position-relative">
                                
                                  @if($project->projectImage && $project->projectImage->isNotEmpty())
                                  @foreach($project->projectImage as $image)
                                      <div id="imageContainer_{{ $loop->index }}" class="m-2 position-relative">
                                          <!-- Image -->
                                          <img id="bannerPreview_{{ $loop->index }}" src="{{ asset('admin/portfolio_image/' . $image->image) }}" width="150" height="150" class="rounded-3" alt="Banner Image">
                                          
                                          <!-- Buttons -->
                                          <div class="position-absolute top-0 end-0 d-flex me-2 mt-2 gap-2">
                                             
                                              <!-- Close Button -->
                                              <form action="{{ route('project_image.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project image?');">
                                              @csrf
                                              @method('DELETE')
                                              <input type="hidden" name="project_id" value = "{{$project->id}}">
                                              <button type="submit" class="btn btn-danger btn-sm deleteImageButton" data-image-id="{{ $image->id }}">
                                                  <span class="material-icons-outlined fs-6">close</span>
                                              </button>
                                              </form>
                                          </div>
                                      </div>
                                  @endforeach
                              @else
                                  <!-- Default placeholder if no banner exists -->
                                  <img id="bannerPreview" width="200" class="rounded-3" style="display:none;" alt="Banner Image">
                              @endif

                                  </div>
                                  <form action="{{route('create_project_image')}}"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="project_id" value = "{{$project->id}}">
                                  <div class="row mb-3">
                                      <label for="formFile" class="form-label">Add New Images</label>
                                      <div id="portfolioPreviewContainer" class="d-flex flex-wrap"></div> 
                                  </div>

                                  <div class="row mb-3">
                                      <input type="file" name="portfolio_images[]" id="portfolioImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewPortfolioImages(event)">
                                  </div>
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
                            </div>


                            <!-- edit start -->
                                <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasProject{{$project->id}}">
                                <div class="offcanvas-header border-bottom h-70">
                                    <div class="">
                                        <p class="mb-0">Edit Project</p>
                                    </div>
                                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                                        <i class="material-icons-outlined">close</i>
                                    </a>
                                </div>
                                <div class="offcanvas-body">
                                <form action="{{route('edit_project', ['id' =>$project->id])}}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                 <!-- icon start -->
                                 <div class="row mb-3">
                                  <label for="formFile" class="form-label">Portfolio Icon</label>
                                  <div id="portfolioIconPreviewContainer">
                                    @if(!empty($project) && !empty($project->icon))
                                    <img id="portfolioIconPreview" src = "{{asset('admin/portfolio_image/'. $project->icon)}}" width="200" class="rounded-3">
                                    @else
                                    <img id="portfolioIconPreview" width="200" class="rounded-3">
                                    @endif
                                  </div>
                              </div>

                              <div class="row mb-3">
                                  <input type="file" name="portfolio_icon" id="portfolioIconInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewPortfolioIcon(event)">
                              </div>
                              <!-- icon end -->

                              <!-- name start -->
                              <div class="row mb-3">
                                  <label for="formFile" class="form-label">Portfolio Name</label>
                                    <input class="form-control form-control-lg mb-3" name="project_name" value = "{{$project->name}}"  type="text" placeholder="Enter Portfolio Name" aria-label=".form-control-lg example">
                              </div>
                              <!-- name end -->

                              <!-- content start -->
                              <div class="row mb-3">
                                  <label for="formFile" class="form-label">Portfolio Content</label>
                                  <textarea class="form-control" id="input47" name="content" value = "{{$project->desc}}" rows="5" placeholder="Enter Portfolio Content">{{$project->desc}}</textarea>
                            </div>
                            <!-- content end -->

                            <!-- category start -->
                            <div class="mb-4">
                              <label for="package-select" class="form-label">Select Category</label>
                              <select class="form-select" name="category" id="package-select" data-placeholder="Choose one">
                                  @foreach($categories as $category)
                                      <option value="{{ $category->category }}" {{ $category->category == $project->category ? 'selected' : '' }}>
                                          {{ $category->category }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>

                            <!-- category end -->

                                <!-- client start -->
                                <div class="row mb-3">
                                    <label for="formFile" class="form-label">Client Name</label>
                                      <input class="form-control form-control-lg mb-3" name="client_name" value = "{{$project->client}}"  type="text" placeholder="Enter Client Name" aria-label=".form-control-lg example">
                              </div>
                              <!-- client end -->

                              <!-- project link start -->
                              <div class="row mb-3">
                                    <label for="formFile" class="form-label">Project Link</label>
                                      <input class="form-control form-control-lg mb-3" name="link" value = "{{$project->project_url}}"  type="text" placeholder="Enter Project Link" aria-label=".form-control-lg example">
                                </div>
                                <!-- project link end -->

                                <!-- deadline start -->
                                <div class="mb-3">
                                    <label class="form-label">Project Deadline</label>
                                    <input type="text" name = "date" value = "{{$project->project_date}}" class="form-control datepicker">
                                </div>
                                <!-- deadline end -->

                                <!-- address start -->
                                <div class="row mb-3">
                                      <label for="formFile" class="form-label">Address</label>
                                        <input class="form-control form-control-lg mb-3" name="address" value = "{{$project->address}}"  type="text" placeholder="Enter Address" aria-label=".form-control-lg example">
                                </div>
                                <!-- address end -->

                                <!-- button text start -->
                                <div class="row mb-3">
                                    <label for="formFile" class="form-label">Portfolio Button Text</label>
                                      <input class="form-control form-control-lg mb-3" name="button_text" value = "{{$project->button_text}}" type="text"  placeholder="Enter Portfolio Button Text" aria-label=".form-control-lg example">
                              </div>
                              <!-- button text end -->

                              <!-- button url start -->
                              <div class="row mb-3">
                              <label for="formFile" class="form-label">Portfolio Button Url</label>
                              <input class="form-control form-control-lg mb-3" name="button_url" value ="{{$project->button_url}}" type="text"  placeholder="Enter Portfolio Button Url" aria-label=".form-control-lg example">
                              </div>
                              <!-- button url end -->

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

                          </tr>
                       
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