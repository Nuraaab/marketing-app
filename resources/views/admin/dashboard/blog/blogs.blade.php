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
								<li class="breadcrumb-item active" aria-current="page">Blogs</li>
							</ol>
						</nav>
					</div>
				</div>




                <div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
              <div class="card-body">
               <div class="d-flex align-items-start justify-content-between mb-3">
                  <div class="">
                    <h5 class="mb-0">Blogs</h5>
                
                  </div>
                  <div class="dropdown">
                  <div class="col">
                    <a href = "/blog_section" class="btn btn-dark px-4 mt-4 raised d-flex gap-2"><i class="material-icons-outlined" >add</i>Add New</a>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Description</th>
                            <th>Button Text</th>
                            <th>Button Url</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                        <td>
                              <div class="d-flex align-items-center gap-3">
                                 <div class="">
                                    <img src="{{ asset('admin/blog_image/' . $blog->image) }}" class="rounded-circle" width="50" height="50" alt="">
                                 </div>
                              </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$blog->title}}</p>
                                </div>
                            </td>
                           
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$blog->date}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$blog->author}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$blog->desc}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$blog->button_text}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$blog->button_url}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                        <span class="material-icons-outlined fs-5">more_vert</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBlog{{$blog->id}}">
                                                <span class="material-icons-outlined fs-5 me-2">edit</span>
                                                Edit
                                            </a>

                                        </li>
                                        <li>
                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');">
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
                        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBlog{{$blog->id}}">
                            <div class="offcanvas-header border-bottom h-70">
                                <div class="">
                                    <p class="mb-0">Edit Blog</p>
                                </div>
                                <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                                    <i class="material-icons-outlined">close</i>
                                </a>
                            </div>
                            <div class="offcanvas-body">
                            <form action="{{route('edit_blog', ['id' =>$blog->id])}}" method="POST" enctype="multipart/form-data">
                              @csrf
                             <!-- date -->
                             <div class="mb-3">
                                <label class="form-label">Date</label>
                                <input type="text" name = "date" value = "{{$blog->date}}" class="form-control datepicker">
                            </div>
                            
                            <!-- author -->
                            <div class="row mb-3">
                            <label for="formFile" class="form-label">Author</label>
                                <input class="form-control form-control-lg mb-3" name="author" value = "{{$blog->author}}" type="text" placeholder="Enter Author" aria-label=".form-control-lg example">
                            </div>

                            <!-- title -->
                            <div class="row mb-3">
                            <label for="formFile" class="form-label">Blog Title</label>
                                <input class="form-control form-control-lg mb-3" name="title" value = "{{$blog->title}}"  type="text" placeholder="Enter Author" aria-label=".form-control-lg example">
                            </div>

                            <!-- description -->
                            <div class="row mb-3">
                            <label for="formFile" class="form-label">Blog Description</label>
                            <textarea class="form-control" id="input47" name="desc" value = "{{$blog->desc}}" rows="5" placeholder="Enter Blog Description">{{$blog->desc}}</textarea>
                            </div>

                            <!-- button text -->

                            <div class="row mb-3">
                            <label for="formFile" class="form-label">Blog Button Text</label>
                                <input class="form-control form-control-lg mb-3" name="button_text" value ="{{$blog->button_text}}" type="text"  placeholder="Enter Blog Button Text" aria-label=".form-control-lg example">
                            </div>

                           
                            <!-- button url -->
                            <div class="row mb-3">
                            <label for="formFile" class="form-label">Blog Button Url</label>
                            <input class="form-control form-control-lg mb-3" name="button_url" value = "{{$blog->button_url}}" type="text"  placeholder="Enter Blog Button Url" aria-label=".form-control-lg example">
                            </div>

                             <!-- image -->
                             <div class="row mb-3">
                                <label for="formFile" class="form-label">Blog Image</label>
                                    <div id="blogPreviewContainer">
                                        @if(!empty($blog) && !empty($blog->image))
                                        <img id="blogPreview" src = "{{asset('admin/blog_image/'. $blog->image)}}" width="200" class="rounded-3">
                                        @else
                                        <img id="blogPreview" width="200" class="rounded-3">
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <input type="file" name="blog_image" id="blogImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" onchange="previewBlogImage(event)">
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