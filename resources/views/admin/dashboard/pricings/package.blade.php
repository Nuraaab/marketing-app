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
								<li class="breadcrumb-item active" aria-current="page">Packages</li>
							</ol>
						</nav>
					</div>
				</div>




                <div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
              <div class="card-body">
               <div class="d-flex align-items-start justify-content-between mb-3">
                  <div class="">
                    <h5 class="mb-0">Packages</h5>
                  </div>
                  <div class="dropdown">
                  <div class="col">
                    <a href="/package_section" class="btn btn-dark px-4 mt-4 raised d-flex gap-2"><i class="material-icons-outlined">add</i>Add New</a>
                  </div>
                  </div>
                </div>
                <div class="order-search position-relative my-3">
                  <input class="form-control rounded-5 px-5" type="text" placeholder="Search">
                  <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                </div>
                 <div class="table-responsive">
                     <table class="table align-middle">
                       <thead>
                        <tr>
                          <th>Package Name</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Unit</th>
                          <th>Action</th>
                        </tr>
                       </thead>
                        <tbody>
                        @foreach($packages as $package)
                          <tr>
                            
                            <td>
                              <div class="d-flex align-items-center gap-3">
                                 <div class="">
                                    <img src="{{ asset('/admin/package_image/' .$package->icon) }}" class="rounded-circle" width="50" height="50" alt="">
                                 </div>
                                 <p class="mb-0">{{$package->name}} </p>
                              </div>
                            </td>
                            <td>{{$package->desc}}</td>
                            <td>{{$package->price}}</td>
                            <td>{{$package->unit}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                        <span class="material-icons-outlined fs-5">more_vert</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;">
                                                <span class="material-icons-outlined fs-5 me-2">edit</span>
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;">
                                                <span class="material-icons-outlined fs-5 me-2">delete</span>
                                                Delete
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFeature{{$package->id}}">
                                                <span class="material-icons-outlined fs-5 me-2">inventory_2</span>
                                                Feature
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            
                          </tr>
                          <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasFeature{{$package->id}}">
    <div class="offcanvas-header border-bottom h-70">
        <div class="">
            <p class="mb-0">Assign this feature to a Package</p>
        </div>
        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
            <i class="material-icons-outlined">close</i>
        </a>
    </div>
    <div class="offcanvas-body">
        <!-- Loop through the features array -->
        @foreach($features as $feature)
        <div class="d-flex align-items-center justify-content-between mb-3">
            <!-- Display feature name -->
            <div class="d-flex align-items-center gap-3">
                <p class="mb-0">{{ $feature->name }}</p>
            </div>
            
            <div class="d-flex align-items-center gap-2">
                <div class="col">
                    <a href="/view_feature" type="button" class="btn btn-outline-primary btn-circle rounded-circle d-flex gap-2 wh-35">
                        <i class="material-icons-outlined">add</i>
                    </a>
                </div>
                <div class="form-check form-switch form-check-success">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheck{{$feature->id}}" checked>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

                          <!-- <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasFeature{{$package->id}}">
                            <div class="offcanvas-header border-bottom h-70">
                                <div class="">
                                    <p class="mb-0">Assign this feature to a Package</p>
                                </div>
                                <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                                    <i class="material-icons-outlined">close</i>
                                </a>
                            </div>
                            <div class="offcanvas-body">
                               
                            
                            </div>
                        </div> -->
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