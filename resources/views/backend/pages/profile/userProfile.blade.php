@extends('layouts.adminMaster')
@section('content')
    <style>
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }

        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input+label {
            display: inline-block;
            width: 45px;
            height: 45px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input+label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input+label:after {
            content: "";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .imageUpload i {
            margin-top: 10px;
            font-size: 22px;
        }
    </style>
    <div class="card overflow-hidden">
        <div class="card-body p-0">
            <img src="{{ url('backend/images/breadcrumb/profilebg.jpg') }}" alt="" class="img-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 order-lg-1 order-2">
                </div>
                <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                    <div class="mt-n5">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 110px; height: 110px;" ;="">
                                <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                    style="width: 100px; height: 100px;" ;="">
                                    <img style="object-fit: cover"
                                        src="{{ empty(Auth::user()->profile) ? url('profile.jpeg') : url('storage/profile/') . '/' . Auth::user()->profile }}"
                                        alt="" class="w-100 h-100">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="fs-5 fw-semibold">{{ $adminData->name}}</h5>
                            <h5 class="fs-5 fw-semibold">{{ $adminData->email}}</h5>
                            <h5 class="fs-5 fw-semibold">{{ $adminData->position }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
    <div id="successMessage" class="alert bg-success text-white alert-dismissible border-0 fade show" role="alert">
     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
     {{ Session::get('success') }}
    </div>
  @endif
  @if(Session::has('error'))
    <div id="errorMessage" class="alert bg-danger text-white alert-dismissible border-0 fade show" role="alert">
     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
     {{ Session::get('error') }}
    </div>
   @endif
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow-none border">
                <div class="card-body">
                    <h5 class="mb-3">Update Image</h5>
                    <form action="{{ route('profileImagae') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="avatar-upload text-center">
                            <input type="hidden" name="id" value="">
                            <div class="avatar-edit">
                                <input type='file' name="profile_image"
                                    class="@error('client_logo') is-invalid @enderror" id="imageUpload"
                                    accept=".png, .jpg, .jpeg" />
                                @error('profile_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="imageUpload" class="imageUpload">
                                    <i class="fa fa-camera upload-button"></i>
                                </label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url({{ empty(Auth::user()->profile) ? url('profile.jpeg') : url('storage/profile/') . '/' . Auth::user()->profile }});"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="img_submit" class="btn btn-info d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                    <path d="M7 9l5 -5l5 5"></path>
                                    <path d="M12 4l0 12"></path>
                                </svg>
                                <span class="ms-2">Upload</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @section('jss')
                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                                $('#imagePreview').hide();
                                $('#imagePreview').fadeIn(650);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $("#imageUpload").change(function() {
                        readURL(this);
                    });
                </script>
            @endsection
        </div>
        <div class="col-lg-8">
            <div class="card shadow-none border">
                <div class="card-body">
                    <h5 class="mb-3">Update Profile Information</h5>
                    <form action="{{ route('profileEdit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" value="{{ $adminData->name }}"
                                        class="form-control @error('name') is-invalid @enderror" id="tb-fname"
                                        placeholder="Enter Your Name">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="tb-fname">Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" value="{{ $adminData->email }}"
                                        class="form-control @error('email') is-invalid @enderror" id="tb-email"
                                        placeholder="Enter Your Email">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="tb-email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="position" value="{{ $adminData->position }}"
                                        class="form-control @error('position') is-invalid @enderror" id="position"
                                        placeholder="Enter Your Position">
                                    @error('position')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="tb-fname">Position</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-md-flex align-items-center mt-3">
                                    <div class="ms-auto mt-3 mt-md-0">
                                        <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit-circle" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z">
                                                    </path>
                                                    <path d="M16 5l3 3"></path>
                                                    <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                                                </svg>
                                                <span class="ms-2">Update</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card shadow-none border">
                <div class="card-body">
                    <h5 class="mb-3">Change Password</h5>
                    <form action="{{ route('updatePassword')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input value="{{ old('current_password') }}" name="current_password" type="password"
                                        class="form-control @error('current_password') is-invalid @enderror @if (Session::has('old')) is-invalid @endif"
                                        id="tb-cpwd" placeholder="Old Password">
                                    @error('current_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @if (Session::has('old'))
                                        <div class="alert alert-danger">{{ Session::get('old') }}</div>
                                    @endif
                                    <label for="tb-cpwd">Current Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input value="{{ old('password') }}" name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" id="tb-cpwd"
                                        placeholder="New Password">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="tb-cpwd">New Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input value="{{ old('password_confirmation') }}" name="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror" id="tb-cpwd"
                                        placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="tb-cpwd">Confirm Password</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-md-flex align-items-center mt-3">
                                    <div class="ms-auto mt-3 mt-md-0">
                                        <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit-circle" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z">
                                                    </path>
                                                    <path d="M16 5l3 3"></path>
                                                    <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                                                </svg>
                                                <span class="ms-2">Update</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.setTimeout("document.getElementById('successMessage').style.display='none';", 2000);
        window.setTimeout("document.getElementById('errorMessage').style.display='none';", 2000);
    </script>
@endsection
