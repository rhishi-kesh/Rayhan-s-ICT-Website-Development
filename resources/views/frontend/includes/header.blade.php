<div class="py-2 top-nav d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7">
                <ul class="contact-content justify-content-start d-block d-md-flex ps-0 mb-0 text-center text-md-start">
                    <li class="text-white d-block">
                        <a class="tel-no me-4" href="tel:{{ $companyInformation->number }}">
                            <i class="fa-solid fa-phone me-1"></i>
                            {{ $companyInformation->number }}
                        </a>
                    </li>
                    <li class="text-white ml-4 d-block">
                        <a href="mailto:{{ $companyInformation->gmail }}">
                            <i class="fa-solid fa-envelope me-2"></i>{{ $companyInformation->gmail }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-5">
                <div class="ttm-social-links-wrapper list-inline top-lan-icon py-1 py-md-0">
                    <ul class="social-icons d-flex justify-content-center justify-content-md-end mb-0 ps-0">
                        <li class="ms-2">
                            <a href="{{ $companyInformation->facebook }}" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </li>
                        <li class="ms-2">
                            <a href="{{ $companyInformation->instragram }}" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                        <li class="ms-2">
                            <a href="{{ $companyInformation->linkedin }}" target="_blank">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        </li>
                        <li class="ms-2">
                            <a href="{{ $companyInformation->youtube }}" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- top-nav -->
<nav>
    <div class="container">
        <div class="nav-bar">
          <i class='ti-menu  sidebarOpen' ></i>
          <span class="logo navLogo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('storage/companyInformation/'. $companyInformation->logo) }}" alt="img-not found">
            </a>
          </span>

          <div class="menu">
              <div class="logo-toggle">
                    <a href="{{ route('index') }}">
                       <img src="{{ asset('storage/companyInformation/'. $companyInformation->logo) }}" alt="img-not found">
                   </a>
                    <i class='ti-close siderbarClose'></i>
                </div>

                <ul class="nav-links mb-0">
                  <li><a href="{{ route('index') }}">Home</a></li>
                  <li><a href="{{ route('about') }}">About</a></li>
                  <li><a href="{{ route('course') }}">Course</a></li>
                  <li><a href="{{ route('success') }}" class="nav_success_btn">Success</a></li>
                  <li><a href="http://apply.rayhansict.com/" target="_blank">Career</a></li>
                  <li><a href="{{ route('contact') }}">Contact</a></li>
                  <li>
                    <a href="#admissionModal" data-bs-toggle="modal" class="admit_btn">
                        <i class="ti-crown fw-bold"></i>
                        Admission
                    </a>
                  </li>
                </ul>
          </div>
        </div>
    </div>
</nav>
