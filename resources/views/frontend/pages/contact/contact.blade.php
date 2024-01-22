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
                <div class="col-12 col-md-6">
                    <div class="card socal-card text-center">
                        <div class="text-center mb-2">
                            <img src="assets/img/call.gif" alt="" >
                        </div>
                        <h3 class="text-uppercase h2 fw-bold">You Can Contact us directly at :</h3>
                        <p class="lead my-2 mail">
                            <a href="mailto:ictrayhans@gmail.com">contact@rayhansict.com</a>
                        </p>
                        <p class="lead mb-0 small-title">Or You write us via the contact form</p>
                        <p class="lead small-title">We answer as quick as possible</p>
                        <div class="d-flex justify-content-center">
                            <div class="d-flex justify-content-around w-50 socal-icon">
                                <p class="lead">
                                    <a href="">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                </p>
                                <p class="lead">
                                    <a href="">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </p>
                                <p class="lead">
                                    <a href="">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </p>
                                <p class="lead">
                                    <a href="">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-4 mt-md-0">
                    <div class="card contact-card">
                        <form action="" method="" class="text-start">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-none" id="name" placeholder="Enter Name">
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating mt-3">
                                <input type="email" class="form-control shadow-none" id="email" placeholder="Enter E-mail">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mt-3">
                                <input type="number" class="form-control shadow-none" id="number" placeholder="Enter Number">
                                <label for="number">Number</label>
                            </div>
                            <div class="mt-3">
                                <select name="subject" id="subject" class="form-select shadow-none form-select-lg">
                                    <option value="Select One">Select</option>
                                </select>
                            </div>
                            <div class="form-floating mt-3">
                                <textarea name="massage" id="massage" class="form-control shadow-none" placeholder="Enter Massage"></textarea>
                                <label for="massage">Message</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.3263834967843!2d90.36703137417396!3d23.806990286603614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1f95d0e1503%3A0x5882b8ecae1a5a0c!2sRayhan&#39;s%20ICT!5e0!3m2!1sen!2sbd!4v1705235099844!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-section -->
@endsection
