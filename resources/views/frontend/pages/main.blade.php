@extends('layouts.frontendMaster')
@section('content')
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 text-center text-lg-start">
                <h1 class="display-5"><span class="text-brand-1">Rayhan's ICT</span> dolor amet consectetur adipisicing elit. Et?</h1>
                <p class="mt-3 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas rerum veniam consequuntur enim. Nemo nostrum, autem architecto consequuntur.</p>
                <div class="btns mt-4">
                    <a href="about.html">
                        About Us
                    </a>
                    <a href="course.html" class="ms-3">
                        Browse Course
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-6 text-center text-lg-start mt-4 mt-lg-0 align-self-center">
                <div class="banner">
                    <img src="{{ asset('frontend/img/banner.jpg') }}" alt="" class="img-fluid">
                    <a href="https://youtu.be/GogcDtMpgMc" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
                        <svg width="100" height="100" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                            <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                            <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="row owl-carousel owl-theme courses courses-department">
            <div class="col">
                <a href="single_department.html">
                    <img src="{{ asset('frontend/img/basic.png') }}" alt="">
                    <h6>Computer Fundamental</h6>
                </a>
            </div>
            <div class="col">
                <a href="single_department.html">
                    <img src="{{ asset('frontend/img/graphych.png') }}" alt="">
                    <h6>Graphics Design</h6>
                </a>
            </div>
            <div class="col">
                <a href="single_department.html">
                    <img src="{{ asset('frontend/img/web.png') }}" alt="">
                    <h6>Web & Software Development</h6>
                </a>
            </div>
            <div class="col">
                <a href="single_department.html">
                    <img src="{{ asset('frontend/img/web.png') }}" alt="">
                    <h6>Digital Marketing</h6>
                </a>
            </div>
            <div class="col">
                <a href="single_department.html">
                    <img src="{{ asset('frontend/img/web.png') }}" alt="">
                    <h6>English Language</h6>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- hero-end -->
<section class="success_story py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0">Success Stories</h2>
                <span></span>
                <p class="mt-1 lead">The presence of our students in the ever expanding IT industry motivates us, drives us to guide more people towards a sustainable future.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mt-4">
                <div class="banner">
                    <img src="{{ asset('frontend/img/success-story.jpg') }}" alt="" class="img-fluid">
                    <a href="https://youtu.be/nyiJ3WHNrB4?si=cnCrfoANMzHrmOLJ" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
                        <svg width="80" height="80" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                            <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                            <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-4">
                <div class="banner">
                    <img src="{{ asset('frontend/img/success-story.jpg') }}" alt="" class="img-fluid">
                    <a href="https://youtu.be/nyiJ3WHNrB4?si=cnCrfoANMzHrmOLJ" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
                        <svg width="80" height="80" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                            <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                            <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-4">
                <div class="banner">
                    <img src="{{ asset('frontend/img/success-story.jpg') }}" alt="" class="img-fluid">
                    <a href="https://youtu.be/nyiJ3WHNrB4?si=cnCrfoANMzHrmOLJ" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
                        <svg width="80" height="80" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                            <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                            <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-4">
                <div class="banner">
                    <img src="{{ asset('frontend/img/success-story.jpg') }}" alt="" class="img-fluid">
                    <a href="https://youtu.be/nyiJ3WHNrB4?si=cnCrfoANMzHrmOLJ" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
                        <svg width="80" height="80" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                            <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                            <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-4">
                <div class="banner">
                    <img src="{{ asset('frontend/img/success-story.jpg') }}" alt="" class="img-fluid">
                    <a href="https://youtu.be/nyiJ3WHNrB4?si=cnCrfoANMzHrmOLJ" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
                        <svg width="80" height="80" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                            <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                            <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-4">
                <div class="banner">
                    <img src="{{ asset('frontend/img/success-story.jpg') }}" alt="" class="img-fluid">
                    <a href="https://youtu.be/nyiJ3WHNrB4?si=cnCrfoANMzHrmOLJ" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
                        <svg width="80" height="80" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                            <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                            <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="row btn-section">
            <div class="col-12 mt-4">
                <p class="mb-0">
                    <a href="success_story.html" class="seeMore">See More</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- success_story-end -->
<section class="Course py-3 py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0">Our Course</h2>
                <span></span>
                <p class="mt-1 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas rerum veniam.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <ul class="nav nav-tabs justify-content-center owl-carousel owl-theme course-carosel" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#basic" type="button" role="tab">Computer Fundamental</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#graphic" type="button" role="tab">Graphics Design</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab">English Language</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#marketing" type="button" role="tab">Digital Marketing</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#web" type="button" role="tab">Web & Software Development</button>
                    </li>
                </ul>
                <div class="tab-content course_items" id="myTabContent">
                    <div class="tab-pane fade show active" id="basic" role="tabpanel">
                       <div class="row">
                           <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Admit Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Admit Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Admit Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="graphic" role="tabpanel">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Admit Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Admit Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Admit Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="english" role="tabpanel">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Enroll Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Enroll Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Enroll Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="marketing" role="tabpanel">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Enroll Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Enroll Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Enroll Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="web" role="tabpanel">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Enroll Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Enroll Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-4 mt-4">
                               <div class="card">
                                   <a href="single_course.html" class="img">
                                       <img src="https://www.creativeitinstitute.com/images/course/course_1665409737.jpg" alt="">
                                   </a>
                                   <div class="card-body pb-2">
                                       <h5>
                                           <a href="single_course.html">Microsoft Office</a>
                                       </h5>
                                       <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                       <div class="d-flex justify-content-between mt-5">
                                           <p>
                                               <a href="single_course.html" class="buy-btn">Enroll Now</a>
                                           </p>
                                           <p><b>৳15000</b></p>
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
<!-- end-course -->
<section class="Reviews py-3 py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0">Why People Choose Us</h2>
                <span></span>
                <p class="mt-1 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas rerum veniam.</p>
            </div>
        </div>
        <div class="row review">
            <div class="owl-carousel owl-theme review-carosel">
                <div class="col">
                    <div class="card">
                        <div class="text px-3 pt-3">
                            <div class="mb-2 d-flex justify-content-start">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 20 30"><path fill="#2C347E" d="M10.699 10.753c1.019-1.82 2.871-3.777 6.021-5.642.88-.5 1.436-1.41 1.436-2.366 0-1.957-2.038-3.322-3.89-2.503C8.938 2.562 0 8.342 0 20.308 0 25.677 4.4 30 9.819 30c5.419 0 9.865-4.323 9.865-9.692 0-5.005-3.937-9.1-8.985-9.555z"></path></svg>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 20 30"><path fill="#2C347E" d="M10.699 10.753c1.019-1.82 2.871-3.777 6.021-5.642.88-.5 1.436-1.41 1.436-2.366 0-1.957-2.038-3.322-3.89-2.503C8.938 2.562 0 8.342 0 20.308 0 25.677 4.4 30 9.819 30c5.419 0 9.865-4.323 9.865-9.692 0-5.005-3.937-9.1-8.985-9.555z"></path></svg>
                                </div>
                            </div>
                            <p>অফলাইনে শেখার মত সময় হয়ে উঠছিল না তাই অনলাইন কোর্স কে বেছে নেওয়া । কোর্সটিতে খুব সুন্দর করে হরফ তানভীন মাদ পড়ানো হয়েছে । খুব সহজেই প্রতিদিন প্র্যাকটিস করে খুব দ্রুত শুদ্ধ তেলাওয়াত আয়ত্ত করতে পেরেছি।</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center p-3">
                            <div class="imgNamePosition d-flex justify-content-start  align-items-center">
                                <div class="img">
                                    <img src="{{ asset('frontend/img/rhishi.jpeg') }}" alt="">
                                </div>
                                <div class="n%p ms-2 mt-1">
                                    <h6 class="mb-0">Zakirul Islam</h6>
                                    <small>Businessman</small>
                                </div>
                            </div>
                            <div class="video-review p-3">
                                <a href="">
                                    <div class="play">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <p class="mb-0 ms-3">Watch Review</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="text px-3 pt-3">
                            <div class="mb-2 d-flex justify-content-start">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 20 30"><path fill="#2C347E" d="M10.699 10.753c1.019-1.82 2.871-3.777 6.021-5.642.88-.5 1.436-1.41 1.436-2.366 0-1.957-2.038-3.322-3.89-2.503C8.938 2.562 0 8.342 0 20.308 0 25.677 4.4 30 9.819 30c5.419 0 9.865-4.323 9.865-9.692 0-5.005-3.937-9.1-8.985-9.555z"></path></svg>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 20 30"><path fill="#2C347E" d="M10.699 10.753c1.019-1.82 2.871-3.777 6.021-5.642.88-.5 1.436-1.41 1.436-2.366 0-1.957-2.038-3.322-3.89-2.503C8.938 2.562 0 8.342 0 20.308 0 25.677 4.4 30 9.819 30c5.419 0 9.865-4.323 9.865-9.692 0-5.005-3.937-9.1-8.985-9.555z"></path></svg>
                                </div>
                            </div>
                            <p>অফলাইনে শেখার মত সময় হয়ে উঠছিল না তাই অনলাইন কোর্স কে বেছে নেওয়া । কোর্সটিতে খুব সুন্দর করে হরফ তানভীন মাদ পড়ানো হয়েছে । খুব সহজেই প্রতিদিন প্র্যাকটিস করে খুব দ্রুত শুদ্ধ তেলাওয়াত আয়ত্ত করতে পেরেছি।</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center p-3">
                            <div class="imgNamePosition d-flex justify-content-start  align-items-center">
                                <div class="img">
                                    <img src="{{ asset('frontend/img/rhishi.jpeg') }}" alt="">
                                </div>
                                <div class="n%p ms-2 mt-1">
                                    <h6 class="mb-0">Zakirul Islam</h6>
                                    <small>Businessman</small>
                                </div>
                            </div>
                            <div class="video-review p-3">
                                <a href="">
                                    <div class="play">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <p class="mb-0 ms-3">Watch Review</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="text px-3 pt-3">
                            <div class="mb-2 d-flex justify-content-start">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 20 30"><path fill="#2C347E" d="M10.699 10.753c1.019-1.82 2.871-3.777 6.021-5.642.88-.5 1.436-1.41 1.436-2.366 0-1.957-2.038-3.322-3.89-2.503C8.938 2.562 0 8.342 0 20.308 0 25.677 4.4 30 9.819 30c5.419 0 9.865-4.323 9.865-9.692 0-5.005-3.937-9.1-8.985-9.555z"></path></svg>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 20 30"><path fill="#2C347E" d="M10.699 10.753c1.019-1.82 2.871-3.777 6.021-5.642.88-.5 1.436-1.41 1.436-2.366 0-1.957-2.038-3.322-3.89-2.503C8.938 2.562 0 8.342 0 20.308 0 25.677 4.4 30 9.819 30c5.419 0 9.865-4.323 9.865-9.692 0-5.005-3.937-9.1-8.985-9.555z"></path></svg>
                                </div>
                            </div>
                            <p>অফলাইনে শেখার মত সময় হয়ে উঠছিল না তাই অনলাইন কোর্স কে বেছে নেওয়া । কোর্সটিতে খুব সুন্দর করে হরফ তানভীন মাদ পড়ানো হয়েছে । খুব সহজেই প্রতিদিন প্র্যাকটিস করে খুব দ্রুত শুদ্ধ তেলাওয়াত আয়ত্ত করতে পেরেছি।</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center p-3">
                            <div class="imgNamePosition d-flex justify-content-start  align-items-center">
                                <div class="img">
                                    <img src="{{ asset('frontend/img/rhishi.jpeg') }}" alt="">
                                </div>
                                <div class="n%p ms-2 mt-1">
                                    <h6 class="mb-0">Zakirul Islam</h6>
                                    <small>Businessman</small>
                                </div>
                            </div>
                            <div class="video-review p-3">
                                <a href="">
                                    <div class="play">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <p class="mb-0 ms-3">Watch Review</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="text px-3 pt-3">
                            <div class="mb-2 d-flex justify-content-start">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 20 30"><path fill="#2C347E" d="M10.699 10.753c1.019-1.82 2.871-3.777 6.021-5.642.88-.5 1.436-1.41 1.436-2.366 0-1.957-2.038-3.322-3.89-2.503C8.938 2.562 0 8.342 0 20.308 0 25.677 4.4 30 9.819 30c5.419 0 9.865-4.323 9.865-9.692 0-5.005-3.937-9.1-8.985-9.555z"></path></svg>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 20 30"><path fill="#2C347E" d="M10.699 10.753c1.019-1.82 2.871-3.777 6.021-5.642.88-.5 1.436-1.41 1.436-2.366 0-1.957-2.038-3.322-3.89-2.503C8.938 2.562 0 8.342 0 20.308 0 25.677 4.4 30 9.819 30c5.419 0 9.865-4.323 9.865-9.692 0-5.005-3.937-9.1-8.985-9.555z"></path></svg>
                                </div>
                            </div>
                            <p>অফলাইনে শেখার মত সময় হয়ে উঠছিল না তাই অনলাইন কোর্স কে বেছে নেওয়া । কোর্সটিতে খুব সুন্দর করে হরফ তানভীন মাদ পড়ানো হয়েছে । খুব সহজেই প্রতিদিন প্র্যাকটিস করে খুব দ্রুত শুদ্ধ তেলাওয়াত আয়ত্ত করতে পেরেছি।</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center p-3">
                            <div class="imgNamePosition d-flex justify-content-start  align-items-center">
                                <div class="img">
                                    <img src="{{ asset('frontend/img/rhishi.jpeg') }}" alt="">
                                </div>
                                <div class="n%p ms-2 mt-1">
                                    <h6 class="mb-0">Zakirul Islam</h6>
                                    <small>Businessman</small>
                                </div>
                            </div>
                            <div class="video-review p-3">
                                <a href="">
                                    <div class="play">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <p class="mb-0 ms-3">Watch Review</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Reviews-end -->
<section class="mentors py-3 py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0">Meet Our Mentors</h2>
                <span></span>
                <p class="mt-1 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas rerum veniam.</p>
            </div>
        </div>
        <div class="row mentor">
            <div class="owl-carousel owl-theme mentor-carosel">
                <div class="col">
                    <div class="card">
                        <div class="mentor-bg" style="background-image: url('https://www.creativeitinstitute.com/images/course/course_1665409737.jpg');">
                            <img class="profile" src="{{  asset('frontend/img/rhishi.jpeg')  }}" alt="">
                        </div>
                        <h2 class="name">Reshi Kash</h2>
                        <div class="title">Web Developer</div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="mentor-bg" style="background-image: url('https://www.creativeitinstitute.com/images/course/course_1665409737.jpg');">
                            <img class="profile" src="{{  asset('frontend/img/rhishi.jpeg')  }}" alt="">
                        </div>
                        <h2 class="name">Reshi Kash</h2>
                        <div class="title">Web Developer</div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="mentor-bg" style="background-image: url('https://www.creativeitinstitute.com/images/course/course_1665409737.jpg');">
                            <img class="profile" src="{{  asset('frontend/img/rhishi.jpeg')  }}" alt="">
                        </div>
                        <h2 class="name">Reshi Kash</h2>
                        <div class="title">Web Developer</div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="mentor-bg" style="background-image: url('https://www.creativeitinstitute.com/images/course/course_1665409737.jpg');">
                            <img class="profile" src="{{  asset('frontend/img/rhishi.jpeg')  }}" alt="">
                        </div>
                        <h2 class="name">Reshi Kash</h2>
                        <div class="title">Web Developer</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- mentors-end -->
<section class="brands py-3 py-lg-5">
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0">we are authorised by</h2>
                <span></span>
                <p class="mt-1 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas rerum veniam.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="row justify-content-center">
                    <div class="col-6 col-md-4 align-self-center text-center mt-4 mt-md-0">
                        <img src="{{ asset('frontend/img/1.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-4 align-self-center text-center mt-4 mt-md-0">
                        <img src="{{ asset('frontend/img/2.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-4 align-self-center text-center mt-4 mt-md-0">
                        <img src="{{ asset('frontend/img/3.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Brands-end -->
<section class="faq py-3 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0">Frequently Asked Questions</h2>
                <span></span>
                <p class="mt-1 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas rerum veniam.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="accordion" id="accordionExample">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
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
                        <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse5" aria-bs-expanded="false" aria-bs-controls="collapseOne">
                                            What is Lorem Ipsum?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse5" class="collapse" data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse6" aria-bs-expanded="false" aria-bs-controls="collapseTwo">
                                            Where does it come from?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse6" class="collapse" data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse7" aria-bs-expanded="false" aria-bs-controls="collapseThree">
                                            Why do we use it?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse7" class="collapse" data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse8" aria-bs-expanded="false" aria-bs-controls="collapseThree">
                                            Where can I get some?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse8" class="collapse" data-bs-parent="#accordionExample">
                                    <div class="card-body">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Faq-End -->
@endsection
