@extends('layouts.frontendMaster')
@section('title','Contact')
@section('content')
    <div class="contact py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1 mb-3 mb-md-5 text-center">Contact Us</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="card py-5 px-5 text-center text-md-start">
                        <h3 class="text-uppercase h2 fw-bold">You Can Contact us directly at :</h3>
                        <p class="lead my-2 mail">
                            <a href="mailto:{{ $companyInformation->gmail }}">{{ $companyInformation->gmail }}</a>
                        </p>
                        <p class="lead mb-3 small-title">Or You write us via the contact form. We will answer as quick as possible</p>
                        <div class="d-flex justify-content-center justify-content-md-start mt-1">
                            <div class="d-flex justify-content-around w-50 socal-icon">
                                <p class="lead">
                                    <a href="{{ $companyInformation->facebook }}">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                </p>
                                <p class="lead">
                                    <a href="{{ $companyInformation->instragram }}">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </p>
                                <p class="lead">
                                    <a href="{{ $companyInformation->linkedin }}">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </p>
                                <p class="lead">
                                    <a href="{{ $companyInformation->youtube }}">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 mt-4 mt-md-0">
                    <div class="card p-5">
                        <form action="{{ route('ContactPost') }}" method="post" enctype="multipart/form-data" id="ContactUs" class="text-start">
                            @csrf
                             
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control shadow-none" name="name" id="name" placeholder="Your Name">
                                   <span class="text-danger error-text name_error"></span>

                                </div>
                                <div class="mt-3 mt-lg-0 col-12 col-lg-6">
                                    <input type="email" class="form-control shadow-none" name="email" id="email" placeholder="Your E-mail">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="mt-3 col-12 col-lg-6">
                                    <input type="number" class="form-control shadow-none" name="number" id="number" placeholder="Enter Number">
                                    <span class="text-danger error-text number_error"></span>
                                </div>
                                <div class="mt-3 col-12 col-lg-6">
                                    <select name="course" id="subject" class="form-select shadow-none form-select-lg">
                                        <option  id="subject" value="Select One">Select</option>
                                        @foreach ($course as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text course_error"></span>

                                </div>
                                <div class="mt-3">
                                    <textarea name="massage" id="massage" class="form-control shadow-none" placeholder="Your Massage"></textarea>
                                    <span class="text-danger error-text massage_error"></span>
                                </div>
                                <div class="mt-4">
                                    <button class="form-control text-uppercase contact_btn" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5">
                    {!! $companyInformation->googlemap !!}
                </div>
            </div>
        </div>
    </div>
    <!-- contact-section -->
@push('jss')
    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#ContactUs").on('submit', function(e) {
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
                            $('#ContactUs')[0].reset();
                            Swal.fire({
                                icon: "success",
                                title: "Admission Successful",
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $('.loader').removeClass('spinner-border');
                            $('.submit_btn').show('spinner-border');
                        }
                    }
                });

            });
            });
    </script>
@endpush
@endsection
