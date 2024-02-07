<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('frontend/img/fav.jpg') }}">

    <!-- Google font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- meta tags -->
    <meta name="description"
        content="Develop your professional &amp; personal skills through Rayhans ICT Institute. We provide Graphic Design, Web Design & Development,Office course, Digital Marketing, Automation Training etc affordable price. Phone + 880 1534-545945 ">
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
    <div class="modal fade" style="z-index: 1111" id="admissionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-uppercase" id="exampleModalLabel">Admission Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admissionPost') }}" method="post" class="text-start"
                        id="admissionForm">
                        @csrf
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                            <label for="name">Name</label>
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter E-mail">
                            <label for="email">Email</label>
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="number" class="form-control" name="number" id="number" placeholder="Enter Number">
                            <label for="number">Number</label>
                            <span class="text-danger error-text number_error"></span>
                        </div>
                        <div class="mt-3">
                            <select id="subject" name="course" class="form-select form-select-lg">
                                <option value="">Select Course</option>
                                @foreach ($course as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text course_error"></span>
                        </div>
                        <div class="form-floating mt-3">
                            <textarea name="massage" id="massage" class="form-control" placeholder="Enter Massage"></textarea>
                            <label for="massage">Message</label>
                            <span class="text-danger error-text massage_error"></span>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="form-control text-uppercase form-control-lg" name="submit">
                                <span class="loader"></span>
                                <span class="submit_btn">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" style="z-index: 1111" id="democlassMOdel" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-uppercase" id="exampleModalLabel">Demo Class Registation Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="text-start"
                        id="DemoclassForm">
                        @csrf
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                            <label for="name">Name</label>
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter E-mail">
                            <label for="email">Email</label>
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="number" class="form-control" name="number" id="number" placeholder="Enter Number">
                            <label for="number">Number</label>
                            <span class="text-danger error-text number_error"></span>
                        </div>
                        <div class="mt-3">
                            <select id="subject" name="course" class="form-select form-select-lg">
                                <option value="">Select Course</option>
                                @foreach ($course as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text course_error"></span>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
                            <label for="address">Address</label>
                            <span class="text-danger error-text address_error"></span>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="text" class="form-control" name="profession" id="profession" placeholder="Enter Current Profession">
                            <label for="profession">Current Profession</label>
                            <span class="text-danger error-text profession_error"></span>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="form-control text-uppercase form-control-lg" name="submit">
                                <span class="loader"></span>
                                <span class="submit_btn">Submit</span>
                            </button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script>
        new VenoBox({
            selector: '.RICT_Videos',
        });
    </script>
    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#admissionForm").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url:$(this).attr('action'),
                    method:$(this).attr('method'),
                    data:new FormData(this),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(document).find('span.error-text').text('');
                        $('.loader').addClass('spinner-border');
                        $('.submit_btn').hide('spinner-border');
                    },
                    success:function(data){
                        if(data.status == 0){
                            $.each(data.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                            $('.loader').removeClass('spinner-border');
                            $('.submit_btn').show('spinner-border');
                        }else{
                            $('#admissionForm')[0].reset();
                            Swal.fire({
                                icon: "success",
                                title: "Admission Successful",
                                showConfirmButton: false,
                                timer: 2500
                            })
                            $('#admissionModal').modal('hide');
                            $('.loader').removeClass('spinner-border');
                            $('.submit_btn').show('spinner-border');
                        }
                    }
                });

            });
        });
    </script>
</body>

</html>
