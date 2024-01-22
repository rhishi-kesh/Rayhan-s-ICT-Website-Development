<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Professional IT Training Institute in Mirpur 10</title>
	<link rel="icon" href="{{ asset('frontend/img/fav.jpg') }}">

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<!-- meta tags -->
	<meta name="description" content="Develop your professional &amp; personal skills through Rayhans ICT Institute. We provide Graphic Design, Web Design & Development,Office course, Digital Marketing, Automation Training etc affordable price. Phone + 880 1534-545945 ">
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
</head>
<body>
    @include('frontend/includes/header')
    <!-- navbar -->
    @yield('content')
    @include('frontend/includes/footer')
    <!-- Footer End -->
    <div class="modal fade" id="admissionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 text-uppercase" id="exampleModalLabel">Admission Form</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="" class="text-start">
                <div class="form-floating">
                    <input type="text" class="form-control" id="name" placeholder="Enter Name">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mt-3">
                    <input type="email" class="form-control" id="email" placeholder="Enter E-mail">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mt-3">
                    <input type="number" class="form-control" id="number" placeholder="Enter Number">
                    <label for="number">Number</label>
                </div>
                <div class="mt-3">
                    <select name="subject" id="subject" class="form-select form-select-lg">
                        <option value="Select One">Select</option>
                    </select>
                </div>
                <div class="form-floating mt-3">
                    <textarea name="massage" id="massage" class="form-control" placeholder="Enter Massage"></textarea>
                    <label for="massage">Message</label>
                </div>
                <div class="mt-3">
                    <input type="submit" class="form-control form-control-lg" value="SUBMIT" name="submit">
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- modal-end -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script>
        new VenoBox({
            selector: '.RICT_Videos',
        });
    </script>
</body>
</html>
