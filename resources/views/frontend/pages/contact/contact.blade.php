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
                    <div class="card py-4 px-5 text-center text-md-start">
                        <h3 class="text-uppercase h2 fw-bold">You Can Contact us directly at :</h3>
                        <p class="lead my-2 mb-0 mail">
                            <b>Email:</b>
                            <a href="mailto:{{ $companyInformation->gmail }}">{{ $companyInformation->gmail }}</a>
                        </p>
                        <p class="lead mb-0 mail">
                            <b>Help Line:</b>
                            <a href="tel:{{ $companyInformation->number }}">{{ $companyInformation->number }}</a>
                        </p>
                        <p class="lead mb-2 mail">
                            <b>FrontDesk:</b>
                            <a href="tel:{{ $companyInformation->fontdesk }}">{{ $companyInformation->fontdesk }}</a>
                        </p>
                        <p class="lead mb-1 small-title">Or You write us via the contact form. We will answer as quick as possible</p>
                        <div class="d-flex justify-content-center justify-content-md-start mt-1">
                            <div class="d-flex justify-content-start gap-4 w-50 socal-icon">
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
                                    <select id="subject" class="form-select shadow-none form-select-lg" name="course" >
                                        <option  id="subject" value="">Select</option>
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
                                    <button type="submit" class="shadow-none submit_btn form-control text-uppercase form-control-lg" name="submit">
                                        <span class="loader text-dark"></span>
                                        <span class="submit_btn_text">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        {!! $companyInformation->googlemap !!}
                    </div>
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
                        $('.submit_btn_text').hide('spinner-border');
                        $('.submit_btn').attr('disabled', true);
                    },
                    success:function(data){
                        if(data.status == 0){
                            $.each(data.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                            $('.loader').removeClass('spinner-border');
                            $('.submit_btn_text').show('spinner-border');
                            $('.submit_btn').removeAttr('disabled');
                        }else{
                            $('#ContactUs')[0].reset();
                            Swal.fire({
                                icon: "success",
                                title: "Admission Successful",
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $('#admissionModal').modal('hide');
                            $('.loader').removeClass('spinner-border');
                            $('.submit_btn_text').show('spinner-border');
                            $('.submit_btn').removeAttr('disabled');
                        }
                    }
                });

            });
            });
    </script>
@endpush
@endsection
