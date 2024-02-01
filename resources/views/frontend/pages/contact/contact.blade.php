@extends('layouts.frontendMaster')
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
                        <form action="" method="" class="text-start">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control shadow-none" id="name" placeholder="Your Name">
                                </div>
                                <div class="mt-3 mt-lg-0 col-12 col-lg-6">
                                    <input type="email" class="form-control shadow-none" id="email" placeholder="Your E-mail">
                                </div>
                                <div class="mt-3 col-12 col-lg-6">
                                    <input type="number" class="form-control shadow-none" id="number" placeholder="Enter Number">
                                </div>
                                <div class="mt-3 col-12 col-lg-6">
                                    <select name="subject" id="subject" class="form-select shadow-none form-select-lg">
                                        <option value="Select One">Select</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <textarea name="massage" id="massage" class="form-control shadow-none" placeholder="Your Massage"></textarea>
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
@endsection
