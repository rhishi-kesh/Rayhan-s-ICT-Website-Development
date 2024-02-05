<footer class="pt-3 pt-lg-5">
    <div class="container">
        <div class="row justify-content-center pb-3 pb-lg-5 top-footer">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="text-uppercase fs-1 mb-0">Admission Is Going on</h2>
                        <p class="mt-1 lead">Enrollment is currently open, offering a professional pathway for individuals eager to embark on their educational journey.</p>
                    </div>
                </div>
                <div class="d-block d-md-flex justify-content-center mt-3 text-center">
                    <div class="mt-2 mt-md-0">
                        <a class="btn demo_class btn-lg" href="#">Apply For Demo Class</a>
                    </div>
                    <div class="ms-0 ms-md-3 mt-2 mt-md-0">
                        <a class="btn browse_course btn-lg" href="{{ route('course') }}">Browse Courses</a>
                    </div>
                    <div class="ms-0 ms-md-3 mt-2 mt-md-0">
                        <a class="btn free_seminer btn-lg" href="{{ route('seminer') }}">Join Free Seminar</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="footer-mid pt-3 pt-lg-5 pb-3 pb-lg-5 text-center text-lg-start">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-12 col-md-6 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo d-none d-md-block">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('storage/companyInformation/'. $companyInformation->logo) }}" alt="">
                            </a>
                        </div>
                        <div class="footer-text d-none d-md-block">
                            <p>{{ $companyInformation->footerAbout }}</p>
                        </div>
                        <div class="footer-social-icon">
                            <span>Follow us</span>
                            <a href="{{ $companyInformation->facebook }}" target="_blank">
                                <i class="fab fa-facebook-f facebook-bg"></i>
                            </a>
                            <a href="{{ $companyInformation->instragram }}" target="_blank">
                                <i class="fa-brands fa-instagram instagram-bg"></i>
                            </a>
                            <a href="{{ $companyInformation->linkedin }}" target="_blank">
                                <i class="fa-brands fa-linkedin-in linkedin-bg"></i>
                            </a>
                            <a href="{{ $companyInformation->youtube }}" target="_blank">
                                <i class="fa-brands fa-youtube youtube-bg"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 mt-4 mt-lg-0 col-12 col-md-6 mb-30">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Useful Links</h3>
                        </div>
                        <ul>
                            <li>
                                <a href="{{ route('about') }}">
                                    <i class="ti-angle-double-right d-none d-md-inline"></i>
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">
                                    <i class="ti-angle-double-right d-none d-md-inline"></i>
                                    Contact
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('success') }}">
                                    <i class="ti-angle-double-right d-none d-md-inline"></i>
                                    Success
                                </a>
                            </li>
                            <li>
                                <a href="http://apply.rayhansict.com/">
                                    <i class="ti-angle-double-right d-none d-md-inline"></i>
                                    Career
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('privacyPolicy') }}">
                                    <i class="ti-angle-double-right d-none d-md-inline"></i>
                                    Privacy Policy
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 mt-3 mt-lg-0 col-12 col-md-6 mb-50 d-none d-md-block">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Popular Courses</h3>
                        </div>
                        <ul>
                            @foreach ($course as $item)
                                <li>
                                    <a href="{{ route('singleCourse', $item->slug) }}">
                                        <i class="ti-angle-double-right"></i>
                                        {{ $item->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 mt-3 mt-lg-0 col-12 col-md-6 mb-50 contact">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Contact us</h3>
                        </div>
                        <ul>
                            <li>
                                <a href="tel:{{ $companyInformation->number }}" target="_blank">
                                    <i class="fa-solid fa-phone me-2 d-none d-md-inline"></i>
                                    <span class="mt-1">{{ $companyInformation->number }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{ $companyInformation->gmail }}" target="_blank">
                                    <i class="fa-solid fa-envelope me-2 d-none d-md-inline"></i>
                                    <span class="mt-1">{{ $companyInformation->gmail }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $companyInformation->locationLink }}" target="_blank">
                                    <i class="fa-solid fa-location-dot me-2 d-none d-md-inline"></i>
                                    <span class="mt-1">{{ $companyInformation->locationText }}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="footer-widget-heading">
                            <h3>Opening Hour</h3>
                            <p>
                                <i class="fa-solid fa-clock me-2 d-none d-md-inline"></i>
                                <small>{{ $companyInformation->openClose }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-text text-center">
                        <p class="mb-0 text-uppercase">E-TIN No: {{ $companyInformation->eTinNo }}</p>
                        <p class="mb-0 text-uppercase">Trade Licence No: {{ $companyInformation->tradeLienceNo }}</p>
                        <p class="mb-0 text-uppercase mt-2 mt-md-0"> Copyright © 2017 - {{ date('Y') }} DESIGN AND DEVELOPED BY <a href="http://www.creativesheba.com/" style="text-decoration: none; color: #fff;">CREATIVE SHEBA LIMITED</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
