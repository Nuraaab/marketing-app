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
								<li class="breadcrumb-item active" aria-current="page">Features</li>
							</ol>
						</nav>
					</div>
				</div>




                <div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
              <div class="card-body">
               <div class="d-flex align-items-start justify-content-between mb-3">
                  <div class="">
                    <h5 class="mb-0">Features</h5>
               
                  </div>
                  <div class="dropdown">
                  <div class="col">
                    <button  class="btn btn-dark px-4 mt-4 raised d-flex gap-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFeature"><i class="material-icons-outlined" >add</i>Add New</button>
                  </div>
                 


                <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasFeature">
                            <div class="offcanvas-header border-bottom h-70">
                                <div class="">
                                    <p class="mb-0">Create New feature</p>
                                </div>
                                <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                                    <i class="material-icons-outlined">close</i>
                                </a>
                            </div>
                            <div class="offcanvas-body">
                                <form action="{{route('create_feature')}}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="formFile" class="form-label">Feature Name</label>
                                            <input class="form-control form-control-lg mb-3" name="name" type="text"  placeholder="Enter Feature Name" aria-label=".form-control-lg example">
                                    </div>
                                    <div class="mb-4">
                                        <label for="package-select" class="form-label">Select Package</label>
                                        <select class="form-select" name="package" id="package-select" data-placeholder="Choose one">
                                            @foreach($packages as $package)
                                            <option value="{{$package->id}}">{{$package->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="status-select" class="form-label">Select Status</label>
                                        <select class="form-select" name="status" id="status-select" data-placeholder="Choose one">
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>
                                        </select>
                                    </div>

                                    <button class="btn btn-outline-primary position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2" type="submit">
                                        <i class="material-icons-outlined">add</i>Add
                                    </button>
                                </form>
                            </div>
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
                            <th>Feature Name</th>
                            <th>Package Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($features as $feature)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$feature->name}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">
                                        {{-- Check if the feature has an associated package --}}
                                        {{ $feature->package ? $feature->package->name : 'No Package Assigned' }}
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$feature->status == '1' ? 'Active' : "Not Active"}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                        <span class="material-icons-outlined fs-5">more_vert</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFeature{{$feature->id}}">
                                                <span class="material-icons-outlined fs-5 me-2">edit</span>
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                        <form action="{{ route('feature.destroy', $feature->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this feature?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type = "submit" class="dropdown-item d-flex align-items-center" href="javascript:;">
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
                              <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasFeature{{$feature->id}}">
                                    <div class="offcanvas-header border-bottom h-70">
                                        <div class="">
                                            <p class="mb-0">Edit Feature</p>
                                        </div>
                                        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                                            <i class="material-icons-outlined">close</i>
                                        </a>
                                    </div>
                                    <div class="offcanvas-body">
                                    <form action="{{route('edit_feature', ['id' =>$feature->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- name start -->
                                    <div class="row mb-3">
                                    <label for="formFile" class="form-label">Feature Name</label>
                                        <input class="form-control form-control-lg mb-3" name="name" value = "{{$feature->name}}" type="text"  placeholder="Enter Feature Name" aria-label=".form-control-lg example">
                                    </div> 
                                        <!-- name end -->


                                        <!-- package start -->
                                        <div class="mb-4">
                                        <label for="package-select{{$feature->id}}" class="form-label">Select Package</label>
                                        <select class="form-select" name="package" id="package-select{{$feature->id}}" data-placeholder="Choose one">
                                            @foreach($packages as $package)
                                            <option value="{{$package->id}}" {{$package->id == $feature->package_id ? 'selected' : ''}}>{{$package->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        <!-- package end -->
                                        

                                        <!-- status start -->
                                        <div class="mb-4">
                                        <label for="status-select" class="form-label">Select Status</label>
                                        <select class="form-select" name="status" id="status-select" data-placeholder="Choose one">
                                            <option value="1" {{$feature->status == '1' ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$feature->status == '0' ? 'selected' : ''}}>Not Active</option>
                                        </select>
                                          </div>
                                        <!-- status end -->

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