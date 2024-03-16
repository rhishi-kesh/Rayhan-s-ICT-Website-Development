<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Title -->
    <title>Dashbord - Rayhan's ICT</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('fav.jpg') }}" />
    <!-- Owl Carousel  -->

    <link rel="stylesheet" href="{{ asset('backend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/owl.theme.default.min.css') }}">

    <!-- Core Css -->
    <link  id="themeColors"  rel="stylesheet" href="{{ asset('backend/css/style.min.css') }}" />
    <style>
      .ck-editor__editable_inline {
          min-height: 140px;
      }
      .bg-light.active{
        background: #5D87FF !important;
      }
      </style>

  </head>
  <body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme"  data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->

      @include('backend.includes.sidebar')

      <!--  Sidebar End -->
      <!--  Main wrapper -->
      <div class="body-wrapper">
        <!--  Header Start -->

      @include('backend.includes.header')

        <!--  Header End -->
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
      <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>
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
    <script src=" {{ asset('backend/js/ckeditor (1).js') }}"></script>

    @yield('jss')
    @stack('jss')
  </body>
</html>
