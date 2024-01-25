@extends('layouts.frontendMaster')
@section('content')
    <section class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 align-self-center">
                    <h1 class="text-uppercase fs-1">Why Choose Us</h1>
                    <p class="mt-4 mb-0">Interior Bangladesh has been doing attractive and quality interior work for more than 6 years.We believe that every client has some dreams and ensure maximum commitment and punctuality to fulfill those dreams. So put your trust and faith in Interior Bangladesh to make your dreams come true.</p>
                    <div class="d-flex justify-content-start gap-1 gap-md-5 mt-4">
                        <div class="project_complete">
                            <h2>
                                <span class="ti ti-briefcase icon"></span>
                                <span class="time">370+</span>
                            </h2>
                            <hr class="my-2 d-block">
                            <span>Successfull Student</span>
                        </div>
                        <div class="project_complete">
                            <h2>
                                <span class="ti ti-cup icon"></span>
                                <span class="time">370+</span>
                            </h2>
                            <hr class="my-2 d-block">
                            <span>Courses Complated</span>
                        </div>
                        <div class="project_complete">
                            <h2>
                                <span class="ti-medall-alt icon"></span>
                                <span class="time">370+</span>
                            </h2>
                            <hr class="my-2 d-block">
                            <span>Success Ratio</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-5 text-center align-self-center d-none d-lg-block">
                    <img src="{{ asset('frontend/img/about.gif') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- about-section-end -->
    <section class="about missionVision py-2 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 order-2 text-end align-self-center">
                    <h1 class="text-uppercase fs-1">Our Mission & Vision</h1>
                    <p class="mt-4 mb-0">Interior Bangladesh has been doing attractive and quality interior work for more than 6 years.We believe that every client has some dreams and ensure maximum commitment and punctuality to fulfill those dreams. So put your trust and faith in Interior Bangladesh to make your dreams come true.</p>
                </div>
                <div class="col-12 col-md-4 col-lg-5 text-center align-self-center d-none d-lg-block order-1 ">
                    <img src="{{ asset('frontend/img/about.gif') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    {{-- missionVision-section-end --}}
    <section class="courses py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1 mb-0">Our Departments</h2>
                    <span></span>
                    <p class="mt-1 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas rerum veniam.</p>
                </div>
            </div>
            <div class="justify-content-center gap-3 d-none d-md-flex">
                <div class="card">
                    <a href="single_department.html">
                        <img src="assets/img/basic.png" alt="">
                        <h6>Computer Fundamental</h6>
                    </a>
                </div>
                <div class="card">
                    <a href="single_department.html">
                        <img src="assets/img/basic.png" alt="">
                        <h6>Computer Fundamental</h6>
                    </a>
                </div>
                <div class="card">
                    <a href="single_department.html">
                        <img src="assets/img/basic.png" alt="">
                        <h6>Computer Fundamental</h6>
                    </a>
                </div>
                <div class="card">
                    <a href="single_department.html">
                        <img src="assets/img/basic.png" alt="">
                        <h6>Computer Fundamental</h6>
                    </a>
                </div>
                <div class="card">
                    <a href="single_department.html">
                        <img src="assets/img/basic.png" alt="">
                        <h6>Computer Fundamental</h6>
                    </a>
                </div>
            </div>
            <div class="row d-flex d-md-none">
                <div class="col-6 col-md-2 mt-3">
                    <div class="card">
                        <a href="single_department.html">
                            <img src="assets/img/basic.png" alt="">
                            <h6>Computer Fundamental</h6>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-2 mt-3">
                    <div class="card">
                        <a href="single_department.html">
                            <img src="assets/img/basic.png" alt="">
                            <h6>Computer Fundamental</h6>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-2 mt-3">
                    <div class="card">
                        <a href="single_department.html">
                            <img src="assets/img/basic.png" alt="">
                            <h6>Computer Fundamental</h6>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-2 mt-3">
                    <div class="card">
                        <a href="single_department.html">
                            <img src="assets/img/basic.png" alt="">
                            <h6>Computer Fundamental</h6>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-2 mt-3">
                    <div class="card">
                        <a href="single_department.html">
                            <img src="assets/img/basic.png" alt="">
                            <h6>Computer Fundamental</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- courses-section-end -->
    <section class="workshop py-3 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1 mb-0">Our Workspace</h2>
                    <span></span>
                    <p class="mt-1 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas rerum veniam.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row wokspece_img">
                        <div class="col">
                            <div class="wokspece_img_item">
                                <img class="img-fluid w-100" src="https://rayhansict.com/wp-content/uploads/2022/02/9.jpeg" alt="Our Infrastructure">
                            </div>
                        </div>
                        <div class="col">
                            <div class="wokspece_img_item">
                               <img class="img-fluid w-100" src="https://rayhansict.com/wp-content/uploads/2022/02/back-view.jpeg" alt="Our Infrastructure">
                            </div>
                        </div>
                         <div class="col">
                            <div class="wokspece_img_item">
                                <img class="img-fluid w-100" src="https://rayhansict.com/wp-content/uploads/2021/06/8.jpg" alt="Our Infrastructure">
                            </div>
                        </div>
                        <div class="col">
                            <div class="wokspece_img_item">
                               <img class="img-fluid w-100" src="https://rayhansict.com/wp-content/uploads/2020/08/2-1.jpg" alt="Our Infrastructure">
                            </div>
                        </div>
                    </div>
                    <div class="row wokspece_navs">
                        <div class="wokspece_navs_item">
                            <img class="img-fluid w-100" src="https://rayhansict.com/wp-content/uploads/2022/02/9.jpeg" alt="Our Infrastructure">
                        </div>
                        <div class="wokspece_navs_item">
                            <img class="img-fluid w-100" src="https://rayhansict.com/wp-content/uploads/2022/02/back-view.jpeg" alt="Our Infrastructure">
                        </div>
                        <div class="wokspece_navs_item">
                            <img class="img-fluid w-100" src="https://rayhansict.com/wp-content/uploads/2021/06/8.jpg" alt="Our Infrastructure">
                        </div>
                        <div class="wokspece_navs_item">
                            <img class="img-fluid w-100" src="https://rayhansict.com/wp-content/uploads/2020/08/2-1.jpg" alt="Our Infrastructure">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- mentors-end -->
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
                                <img class="profile" src="assets/img/rhishi.jpeg" alt="">
                            </div>
                            <h2 class="name">Reshi Kash</h2>
                            <div class="title">Web Developer</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="mentor-bg" style="background-image: url('https://www.creativeitinstitute.com/images/course/course_1665409737.jpg');">
                                <img class="profile" src="assets/img/rhishi.jpeg" alt="">
                            </div>
                            <h2 class="name">Reshi Kash</h2>
                            <div class="title">Web Developer</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="mentor-bg" style="background-image: url('https://www.creativeitinstitute.com/images/course/course_1665409737.jpg');">
                                <img class="profile" src="assets/img/rhishi.jpeg" alt="">
                            </div>
                            <h2 class="name">Reshi Kash</h2>
                            <div class="title">Web Developer</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="mentor-bg" style="background-image: url('https://www.creativeitinstitute.com/images/course/course_1665409737.jpg');">
                                <img class="profile" src="assets/img/rhishi.jpeg" alt="">
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
@endsection
