@extends('layouts.frontendMaster')
@section('title','{{ $courses->name }}')
@section('content')
    <div class="single_course_header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 text-center text-md-start">
                    <span class="category mb-1">{{ $courses->department->departmentName }}</span>
                    <h3 class="fs-2 mb-3">{{ $courses->name }}</h3>
                    <div class="banner d-block d-md-none">
                        <img src="assets/img/banner.jpg" alt="" class="img-fluid">
                        <a href="https://youtu.be/GogcDtMpgMc" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
                            <svg width="100" height="100" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                                <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                                <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                            </svg>
                        </a>
                    </div>
                    <div class="d-flex justify-content-between my-3 pe-0 pe-md-4 pe-lg-5">
                        <h5 class="fw-bold d-none d-md-block">Course Fee:</h5>
                        <h5 class="fw-bold">৳{{ $courses->courseDetails->price }}</h5>
                    </div>
                    <p class="pe-0 pe-md-4 lead course_des">{{ $courses->courseDetails->description }}</p>
                    <div class="row text-start d-block d-md-none d-xxl-flex">
                        <div class="col-7 col-md-4">
                            <p class="fw-bold text-start"><i class="ti-time me-2 mt-1"></i> Duration: {{ $courses->courseDetails->duration }} Month</p>
                        </div>
                        <div class="col-5 col-md-3">
                            <p class="fw-bold text-start"><i class="ti-book me-2 mt-1"></i> Lectures: {{ $courses->courseDetails->lecture }}</p>
                        </div>
                        <div class="col-12 col-md-3">
                            <p class="fw-bold text-srart"><i class="ti-target me-2 mt-1"></i> Projects: {{ $courses->courseDetails->project }}+</p>
                        </div>
                    </div>
                    <div class="row text-center text-md-start d-none d-md-flex d-xxl-none">
                        <div class="d-flex justify-content-start gap-3">
                            <div>
                                <p class="fw-bold"><i class="ti-time me-2 mt-1"></i> Duration: {{ $courses->courseDetails->duration }} Month</p>
                            </div>
                            <div>
                                <p class="fw-bold"><i class="ti-book me-2 mt-1"></i> Lectures: {{ $courses->courseDetails->lecture }}</p>
                            </div>
                            <div>
                                <p class="fw-bold"><i class="ti-target me-2 mt-1"></i> Projects: {{ $courses->courseDetails->project }}+</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-block d-md-flex btns">
                        <a href="#admissionModal" data-bs-toggle="modal" class="admit_btn mt-2 mt-md-3">
                            <i class="ti-crown fw-bold"></i>
                            Admission
                        </a>
                        <a href="#admissionModal" data-bs-toggle="modal" class="free_seminer mt-1 mt-md-3 ms-0 ms-md-3">
                            Apply For Demo Class
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 align-self-center mt-4 mt-lg-0">
                    <div class="banner d-none d-md-block">
                        <img src="{{ asset('storage/CourseDetails/'. $courses->CourseDetails->thumbnail) }}" alt="" class="img-fluid">
                        <a href="{{ $courses->courseDetails->video }}" data-autoplay="true" data-vbtype="video" class="RICT-Videos">
                            <svg width="100" height="100" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                                <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                                <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single_course_header-end -->
    <section class="course_detailes py-4 pt-md-0">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <ul class="nav navtabs d-inline">
                        <div class="bg-white py-2 py-md-4">
                            <li class="nav-item d-inline-block">
                                <a class="nav-link active" href="#Course_Details">Course Details</a>
                            </li>
                            <li class="nav-item d-inline-block">
                                <a class="nav-link" href="#Modules">Class Modules</a>
                            </li>
                            <li class="nav-item d-inline-block mt-2 mt-md-0">
                                <a class="nav-link" href="#Instructor">Instructor</a>
                            </li>
                        </div>
                    </ul>
                    <div class="content text-start text-md-center">
                        <div id="Course_Details" class="sec">
                            <h2 class="top text-center">What will you learn from this course?</h2>
                            <div class="card text-start">
                                <ul class="ps-0 mb-0">
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">HTML5, CSS3, Bootstrap 4</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">Modern JavaScript Programming</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">React with Redux</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">React Native</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">Python</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">SQL</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">AWS</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">Docker</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">Django</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">REST API</p>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="mt-3 text-center">The course is for those</h2>
                            <div class="card text-start">
                                <ul class="ps-0 mb-0">
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">Any background student or graduate</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">Interested in freelancing</p>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="mt-3 text-center">You will get all the benefits</h2>
                            <div class="card text-start">
                                <ul class="ps-0 mb-0">
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">Career support</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">Freelancing support</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">Project and portfolio support</p>
                                    </li>
                                    <li class="d-flex justify-content-start align-items-start">
                                        <img src="assets/img/check.png" alt="" style="width: 25px; object-fit: contain;">
                                        <p class="mb-0 ms-1">Content created by industry experts</p>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="mt-3 creative_project text-center">Some of the Creative Projects Done by Our Students</h2>
                            <div class="card text-start" id="demo-carosel">
                                <div class="owl-carousel owl-theme demo-carosel">
                                    <div class="demo-item">
                                        <img src="assets/img/img-1.png" alt="" class="img-fluid">
                                    </div>
                                    <div class="demo-item">
                                        <img src="assets/img/img-2.png" alt="" class="img-fluid">
                                    </div>
                                    <div class="demo-item">
                                        <img src="assets/img/img-3.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <!-- <h2 class="mt-3">Our Facebook Review</h2>
                            <div class="card text-start" id="demo-carosel">
                                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid021xsrNTKkawuFqfDtPfV9wZsgm83YD96K5uYjNAUEHgSviJhXxP7BeBeFKhExyxC9l%26id%3D61550744917164&show_text=true&width=500" width="500" height="342" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div>
                            <h2 class="mt-3">Our Google Review</h2>
                            <div class="card text-start" id="demo-carosel">
                                <div id="reviews-container"></div>
                            </div> -->
                        </div>
                        <div id="Modules" class="sec">
                            <h2 class="top mb-4 text-center">Class Modules</h2>
                            <div class="accordion text-start" id="accordionExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                  <button class="accordion-button collapsed shadow-none fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    Class-1
                                  </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <ul class="ps-0">
                                       <li class="d-flex justify-content-start align-items-start">
                                            <img src="assets/img/check.png" alt="" style="width: 15px; margin-top: 5px; object-fit: contain;">
                                            <p class="mb-0 ms-1">HTML5, CSS3, Bootstrap 4</p>
                                        </li>
                                        <li class="d-flex justify-content-start align-items-start">
                                            <img src="assets/img/check.png" alt="" style="width: 15px; margin-top: 5px; object-fit: contain;">
                                            <p class="mb-0 ms-1">Modern JavaScript Programming</p>
                                        </li>
                                        <li class="d-flex justify-content-start align-items-start">
                                            <img src="assets/img/check.png" alt="" style="width: 15px; margin-top: 5px; object-fit: contain;">
                                            <p class="mb-0 ms-1">Modern JavaScript Programming</p>
                                        </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                  <button class="accordion-button collapsed shadow-none fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" >
                                    Class-2
                                  </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <ul class="ps-0">
                                       <li class="d-flex justify-content-start align-items-start">
                                            <img src="assets/img/check.png" alt="" style="width: 15px; margin-top: 5px; object-fit: contain;">
                                            <p class="mb-0 ms-1">HTML5, CSS3, Bootstrap 4</p>
                                        </li>
                                        <li class="d-flex justify-content-start align-items-start">
                                            <img src="assets/img/check.png" alt="" style="width: 15px; margin-top: 5px; object-fit: contain;">
                                            <p class="mb-0 ms-1">Modern JavaScript Programming</p>
                                        </li>
                                        <li class="d-flex justify-content-start align-items-start">
                                            <img src="assets/img/check.png" alt="" style="width: 15px; margin-top: 5px; object-fit: contain;">
                                            <p class="mb-0 ms-1">Modern JavaScript Programming</p>
                                        </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                  <button class="accordion-button collapsed shadow-none fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Class-3
                                  </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <ul class="ps-0">
                                       <li class="d-flex justify-content-start align-items-start">
                                            <img src="assets/img/check.png" alt="" style="width: 15px; margin-top: 5px; object-fit: contain;">
                                            <p class="mb-0 ms-1">HTML5, CSS3, Bootstrap 4</p>
                                        </li>
                                        <li class="d-flex justify-content-start align-items-start">
                                            <img src="assets/img/check.png" alt="" style="width: 15px; margin-top: 5px; object-fit: contain;">
                                            <p class="mb-0 ms-1">Modern JavaScript Programming</p>
                                        </li>
                                        <li class="d-flex justify-content-start align-items-start">
                                            <img src="assets/img/check.png" alt="" style="width: 15px; margin-top: 5px; object-fit: contain;">
                                            <p class="mb-0 ms-1">Modern JavaScript Programming</p>
                                        </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div id="Instructor" class="sec">
                            <h2 class="top mb-4 text-center">Course Instructor</h2>
                            <div class="card border-0">
                                <div class="d-flex justify-content-start gap-4 px-3 px-md-4 mb-0 pt-3">
                                    <div class="img-part">
                                        <img src="assets/img/rhishi.jpeg" alt="">
                                    </div>
                                    <div class="text-start align-self-center">
                                        <h3 class="mb-0">Rhishi kesh</h3>
                                        <p class="mb-0">Web developer at Rayhan's ICT</p>
                                    </div>
                                </div>
                                <hr>
                                <p class="px-3 px-md-4 pb-3 m-0 text-start">Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Voluptates accusantium nemo tempora nobis nisi dolores doloremque ea doloribus labore omnis sed error, quis, explicabo maxime est quam quasi ipsa odit, ut veritatis inventore facilis atque! Optio vero facilis corporis ipsa repellat aut velit beatae laborum dolorem corrupti blanditiis reiciendis, sit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="faq faq_single_course mt-4">
                        <h2 class="top text-center">FAQ</h2>
                        <div class="accordion" id="accordionExample">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-bs-expanded="false" aria-bs-controls="collapseOne">
                                                    What is Lorem Ipsum?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-bs-parent="#accordionExample">
                                            <div class="card-body">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo" aria-bs-expanded="false" aria-bs-controls="collapseTwo">
                                                    Where does it come from?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-bs-parent="#accordionExample">
                                            <div class="card-body">
                                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree" aria-bs-expanded="false" aria-bs-controls="collapseThree">
                                                   Why do we use it?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-bs-parent="#accordionExample">
                                            <div class="card-body">
                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse4" aria-bs-expanded="false" aria-bs-controls="collapseThree">
                                                    Where can I get some?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse4" class="collapse" data-bs-parent="#accordionExample">
                                            <div class="card-body">
                                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- course_detailes -->
@endsection
