<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Title -->
    <title>Mordenize</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" />
    <!-- Owl Carousel  -->

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    
    <!-- Core Css -->
    <link  id="themeColors"  rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}" />
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
    <script src=" {{ asset('frontend/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src=" {{ asset('frontend/libs/simplebar/dist/simplebar.min.') }}"></script>
    <script src=" {{ asset('frontend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src=" {{ asset('frontend/js/app.min.js') }}"></script>
    <script src=" {{ asset('frontend/js/app.init.js') }}"></script>
    <script src=" {{ asset('frontend/js/app-style-switcher.js') }}"></script>
    <script src=" {{ asset('frontend/js/sidebarmenu.js') }}"></script>
    <script src=" {{ asset('frontend/js/custom.js') }}"></script>
    <!--  current page js files -->
    <script src=" {{ asset('frontend/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src=" {{ asset('frontend/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src=" {{ asset('frontend/js/dashboard.js') }}"></script>
  </body>
</html>