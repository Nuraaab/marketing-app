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
								<li class="breadcrumb-item active" aria-current="page">Package Features Section</li>
							</ol>
						</nav>
					</div>
				</div>


                <div class="card">
                <div class="card-body p-4">
                <div class="d-flex align-items-start justify-content-between mb-3">
                  <div class="">
                    <h5 class="mb-0">Add Features</h5>
                  </div>
                  <div class="dropdown">
                  <div class="col">
                  <div class="col">
                    <a href = "/view_feature"type="button" class="btn btn-outline-primary btn-circle rounded-circle d-flex gap-2 wh-48"><i class="material-icons-outlined">remove_red_eye</i></a>
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


                <form action="{{route('create_feature')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="row mb-3">
                       <label for="formFile" class="form-label">Feature Name</label>
                        <input class="form-control form-control-lg mb-3" name="name" type="text"  placeholder="Enter Feature Name" aria-label=".form-control-lg example">
			     	  </div> 

                    <div class="mb-4">
                        <label for="package-select{{$feature->id}}" class="form-label">Select Package</label>
                        <select class="form-select" name="package" id="package-select{{$feature->id}}" data-placeholder="Choose one">
                            @foreach($packages as $package)
                            <option value="{{$package->id}}">{{$package->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="status-select{{$feature->id}}" class="form-label">Select Status</label>
                        <select class="form-select" name="status" id="status-select{{$feature->id}}" data-placeholder="Choose one">
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select>
                    </div>
                    <!-- Pass the correct feature ID -->
                    <input type="hidden" name="feature" value="{{$feature->id}}">

                    <button class="btn btn-outline-primary position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2" type="submit">
                        <i class="material-icons-outlined">assignment</i>Assign
                    </button>
        


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