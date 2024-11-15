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
								<li class="breadcrumb-item active" aria-current="page">Team Section</li>
							</ol>
						</nav>
					</div>
				</div>


                <div class="card">
                <div class="card-body p-4">

                
                <div class="d-flex align-items-start justify-content-between mb-3">
                  <div class="">
                    <h5 class="mb-0">Add Team</h5>
                  </div>
                  <div class="dropdown">
                  <div class="col">
                  <div class="col">
                    <a href = "/view_team"type="button" class="btn btn-outline-primary btn-circle rounded-circle d-flex gap-2 wh-48"><i class="material-icons-outlined">remove_red_eye</i></a>
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


                <form action="{{route('create_team')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="row mb-3">
                       <label for="formFile" class="form-label">Team Section Title</label>
                        <input class="form-control form-control-lg mb-3" name="team_title" type="text" value = "{{$staticSiteData ? $staticSiteData->team_title : ''}}" placeholder="Team Title" aria-label=".form-control-lg example">
								    
                </div>

                <div class="row mb-3">
                       <label for="formFile" class="form-label">Team Section Subtitle</label>
                        <input class="form-control form-control-lg mb-3" name="team_subtitle" type="text" value = "{{$staticSiteData ? $staticSiteData->team_subtitle : ''}}" placeholder="Team Subtitle" aria-label=".form-control-lg example">
								    
                </div>


                <div class="row mb-3">
                    <label for="formFile" class="form-label">Team Image</label>
                    <div id="teamPreviewContainer">
                            <img id="teamPreview" width="200" class="rounded-3">
                    </div>
                </div>

                <div class="row mb-3">
                    <input type="file" name="team_image" id="teamImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewTeamImage(event)">
                </div>

              



                    <div class="row mb-3">
                       <label for="formFile" class="form-label">Team Name</label>
                        <input class="form-control form-control-lg mb-3" name="name"  type="text" placeholder="Enter Name" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                       <label for="formFile" class="form-label">Team Role</label>
                        <input class="form-control form-control-lg mb-3" name="role" type="text"  placeholder="Enter Role" aria-label=".form-control-lg example">
					 </div>

                     <div class="row mb-3">
                        <label for="formFile" class="form-label">Team Facebook Url</label>
                        <input class="form-control form-control-lg mb-3" name="facebook_url" type="text"  placeholder="Enter Facebook Url" aria-label=".form-control-lg example">
                     </div>


                     <div class="row mb-3">
                        <label for="formFile" class="form-label">Team Twitter Url</label>
                        <input class="form-control form-control-lg mb-3" name="twitter_url" type="text"  placeholder="Enter Twitter Url" aria-label=".form-control-lg example">
                     </div>

                     <div class="row mb-3">
                        <label for="formFile" class="form-label">Team Linkedin Url</label>
                        <input class="form-control form-control-lg mb-3" name="linkedin_url" type="text"  placeholder="Enter Linkedin Url" aria-label=".form-control-lg example">
                     </div>

                     <div class="row mb-3">
                        <label for="formFile" class="form-label">Team Github Url</label>
                        <input class="form-control form-control-lg mb-3" name="github_url" type="text"  placeholder="Enter Github Url" aria-label=".form-control-lg example">
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