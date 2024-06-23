<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('frontend/img/fav.jpg') }}">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- meta tags -->
    <meta name="description" content="Best institute of Mirpur. Develop your professional &amp; personal skills through Rayhans ICT Institute. We provide Graphic Design, Web Design & Development, Office course, Digital Marketing, Automation Training etc affordable price. Phone + 880 1534-545945">
    <meta property="og:image" content="https://rayhansict.com/wp-content/uploads/2021/09/rayhasnsict.jpg">

    <!-- links -->
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    @stack('css')
</head>
<body>
    @include('frontend/includes/header')
    <!-- navbar -->
    @yield('content')
    @include('frontend/includes/footer')
    <!-- Footer End -->
    <!-- modal-end -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    @stack('jss')
    <script>
        new VenoBox({
            selector: '.RICT_Videos',
        });
    </script>
    <script>
        var topbannerbtn = document.getElementById("topbannerbtn");
        var top_advirtised = document.getElementById("top_advirtised");
        var display = document.getElementById("display");
        // console.log(topbannerbtn);
        topbannerbtn.onclick = function(){
            top_advirtised.style.display = "none";
            display.classList.add("d-md-block");
        }
    </script>
</body>
</html>
