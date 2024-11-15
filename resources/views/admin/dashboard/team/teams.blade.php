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
								<li class="breadcrumb-item active" aria-current="page">Teams</li>
							</ol>
						</nav>
					</div>
				</div>




                <div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
              <div class="card-body">
               <div class="d-flex align-items-start justify-content-between mb-3">
                  <div class="">
                    <h5 class="mb-0">Teams</h5>
                
                  </div>
                  <div class="dropdown">
                  <div class="col">
                    <a href = "/team_section" class="btn btn-dark px-4 mt-4 raised d-flex gap-2"><i class="material-icons-outlined" >add</i>Add New</a>
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
                            <th>Team</th>
                            <th>Role</th>
                            <th>facebook</th>
                            <th>Twitter</th>
                            <th>Linkedin</th>
                            <th>Github</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teams as $team)
                        <tr>
                           <td>
                              <div class="d-flex align-items-center gap-3">
                                 <div class="">
                                    <img src="{{asset('admin/team_image/'. $team->image)}}" class="rounded-circle" width="50" height="50" alt="">
                                 </div>
                                 <p class="mb-0">{{$team->name}}</p>
                              </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$team->role}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$team->facebook_url}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$team->twitter_url}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$team->linkedin_url}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0">{{$team->github_url}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                        <span class="material-icons-outlined fs-5">more_vert</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTeam{{$team->id}}">
                                                <span class="material-icons-outlined fs-5 me-2">edit</span>
                                                Edit
                                            </a>

                                        </li>
                                        <li>
                                        <form action="{{ route('team.destroy', $team->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this team?');">
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
                        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasTeam{{$team->id}}">
                            <div class="offcanvas-header border-bottom h-70">
                                <div class="">
                                    <p class="mb-0">Edit Team</p>
                                </div>
                                <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                                    <i class="material-icons-outlined">close</i>
                                </a>
                            </div>
                            <div class="offcanvas-body">
                            <form action="{{route('edit_team', ['id' =>$team->id])}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <!-- image start -->
                              <div class="row mb-3">
                                    <label for="formFile" class="form-label">Team Image</label>
                                    <div id="teamPreviewContainer">
                                        @if(!empty($team) && !empty($team->image))
                                        <img id="teamPreview" src ="{{asset('admin/team_image/'. $team->image)}}" width="200" class="rounded-3">
                                        @else
                                        <img id="teamPreview" width="200" class="rounded-3">
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <input type="file" name="team_image" id="teamImageInput" accept=".jpg, .png, .svg, image/jpeg, image/png, image/svg+xml" multiple onchange="previewTeamImage(event)">
                                </div>
                                <!-- image end -->


                                <!-- name start -->
                                <div class="row mb-3">
                                <label for="formFile" class="form-label">Team Name</label>
                                    <input class="form-control form-control-lg mb-3" name="name" value ="{{$team->name}}"  type="text" placeholder="Enter Name" aria-label=".form-control-lg example">
                                </div>
                                <!-- name end -->

                                <!-- role start -->
                                <div class="row mb-3">
                                <label for="formFile" class="form-label">Team Role</label>
                                    <input class="form-control form-control-lg mb-3" name="role" value = "{{$team->role}}" type="text"  placeholder="Enter Role" aria-label=".form-control-lg example">
                                </div>
                                <!-- role end -->

                                 <!-- facebook start -->
                                <div class="row mb-3">
                                    <label for="formFile" class="form-label">Team Facebook Url</label>
                                    <input class="form-control form-control-lg mb-3" name="facebook_url" value = "{{$team->facebook_url}}" type="text"  placeholder="Enter Facebook Url" aria-label=".form-control-lg example">
                                </div>
                                <!-- facebook end -->

                                <!-- twitter start -->
                                <div class="row mb-3">
                                    <label for="formFile" class="form-label">Team Twitter Url</label>
                                    <input class="form-control form-control-lg mb-3" name="twitter_url" value ="{{$team->twitter_url}}" type="text"  placeholder="Enter Twitter Url" aria-label=".form-control-lg example">
                                </div>
                                <!-- twitter  end -->

                                <!-- linkedin start -->
                                <div class="row mb-3">
                                    <label for="formFile" class="form-label">Team Linkedin Url</label>
                                    <input class="form-control form-control-lg mb-3" name="linkedin_url" value = "{{$team->linkedin_url}}" type="text"  placeholder="Enter Linkedin Url" aria-label=".form-control-lg example">
                                </div>
                                
                                <!-- linkedin end -->

                                <!-- github start -->
                                <div class="row mb-3">
                                    <label for="formFile" class="form-label">Team Github Url</label>
                                    <input class="form-control form-control-lg mb-3" name="github_url" value = "{{$team->github_url}}" type="text"  placeholder="Enter Github Url" aria-label=".form-control-lg example">
                                </div>
                                <!-- github end -->

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