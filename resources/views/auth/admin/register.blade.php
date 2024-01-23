<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Title -->
    <title>Dashbord - Rayhan's ICT</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('fav.jpg') }}" />
    <!-- Owl Carousel  -->

    <link rel="stylesheet" href="{{ asset('backend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/owl.theme.default.min.css') }}">

    <!-- Core Css -->
    <link  id="themeColors"  rel="stylesheet" href="{{ asset('backend/css/style.min.css') }}" />
  </head>
  <body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
              <div class="card mb-0">
                <div class="card-body pt-0">
                    <span class="text-nowrap logo-img text-center d-block py-4 w-100">
                        <img src="{{ asset('logo.png') }}" style="max-width: 24%" alt="">
                    </span>
                  <form method="post" action="">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Enter Name" id="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Name" required id="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Role" class="form-label">Role</label>
                        <select class="form-control @error('Role') is-invalid @enderror" name="role" required id="Role">
                            <option value="">Select Role</option>
                            <option value="0">Admin</option>
                            <option value="1">User</option>
                        </select>
                          @error('Role')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="mb-4">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" required id="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                      <label for="Cpassword" class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password" required id="Cpassword">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-8 mb-2 rounded-2">Register</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-dark w-100 py-8 mb-4 rounded-2">Back</a>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--  Import Js Files -->
    <script src=" {{ asset('backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src=" {{ asset('backend/libs/simplebar/dist/simplebar.min.') }}"></script>
    <script src=" {{ asset('backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src=" {{ asset('backend/js/app.min.js') }}"></script>
    <script src=" {{ asset('backend/js/app.init.js') }}"></script>
    <script src=" {{ asset('backend/js/app-style-switcher.js') }}"></script>
    <script src=" {{ asset('backend/js/sidebarmenu.js') }}"></script>
    <script src=" {{ asset('backend/js/custom.js') }}"></script>
    <!--  current page js files -->
    <script src=" {{ asset('backend/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src=" {{ asset('backend/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src=" {{ asset('backend/js/dashboard.js') }}"></script>
    @yield('jss')
    </body>
</html>
