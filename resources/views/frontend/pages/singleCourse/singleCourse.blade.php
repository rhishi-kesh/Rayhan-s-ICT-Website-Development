@extends('layouts.frontendMaster')
@section('title',"$title")
@section('content')
    <div class="single_course_header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 text-center text-md-start">
                    <span class="category mb-1">{{ $courses->department->departmentName }}</span>
                    <h3 class="fs-2 mb-3">{{ $courses->name }}</h3>
                    <div class="banner d-block d-md-none">
                        <img src="{{ asset('storage/CourseDetails/'. $courses->CourseDetails->thumbnail) }}" alt="" class="img-fluid">
                        <a href="{{ $courses->courseDetails->video }}" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
                            <svg width="100" height="100" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                                <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                                <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                            </svg>
                        </a>
                    </div>
                    <div class="d-flex justify-content-between my-3 pe-0 pe-md-4 pe-lg-5 fee">
                        <h5 class="fw-bold d-none d-md-block fee-text font-paragraph">কোর্স ফিঃ</h5>
                        <h5 class="fw-bold">৳{{ $courses->courseDetails->price }}</h5>
                    </div>
                    <p class="pe-0 pe-md-4 lead course_des font-paragraph">{{ $courses->courseDetails->description }}</p>
                    <div class="row text-start d-block d-md-none d-xxl-flex other_detailes">
                        <div class="col-12 col-md-4">
                            <p class="fw-bold text-start"><i class="ti-time me-2 mt-1"></i> <span class="font-paragraph">সময়কাল:</span> {{ $courses->courseDetails->duration }} <span>মাস</span></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <p class="fw-bold text-start"><i class="ti-book me-2 mt-1"></i> <span class="font-paragraph">ক্লাস:</span> {{ $courses->courseDetails->lecture }}</p>
                        </div>
                        @if(!empty($courses->courseDetails->project))
                            <div class="col-12 col-md-3">
                                <p class="fw-bold text-srart"><i class="ti-target me-2 mt-1"></i> <span class="font-paragraph">প্রজেক্ট:</span> {{ $courses->courseDetails->project }}+</p>
                            </div>
                        @endif
                    </div>
                    <div class="row text-center text-md-start d-none d-md-flex d-xxl-none">
                        <div class="d-flex justify-content-start gap-3 other_detailes">
                            <div>
                                <p class="fw-bold"><i class="ti-time me-2 mt-1"></i> <span class="font-paragraph">সময়কাল:</span> {{ $courses->courseDetails->duration }} <span class="font-paragraph">মাস</span></p>
                            </div>
                            <div>
                                <p class="fw-bold"><i class="ti-book me-2 mt-1"></i> <span class="font-paragraph">ক্লাস:</span> {{ $courses->courseDetails->lecture }}</p>
                            </div>
                            @if(!empty($courses->courseDetails->project))
                            <div>
                                <p class="fw-bold"><i class="ti-target me-2 mt-1"></i> <span class="font-paragraph">প্রজেক্ট:</span> {{ $courses->courseDetails->project }}+</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="d-block d-md-flex btns">
                        <a href="{{ route('admission') }}" class="admit_btn mt-2 mt-md-3">
                            <i class="ti-crown fw-bold"></i>
                            Admission
                        </a>
                        <a href="{{ route('demoClass') }}" class="free_seminer mt-1 mt-md-3 ms-0 ms-md-3"> <i class="fa-solid fa-photo-film"></i>
                            Apply For Demo Class
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 align-self-center mt-4 mt-lg-0">
                    <div class="banner d-none d-md-block">
                        <img src="{{ asset('storage/CourseDetails/'. $courses->CourseDetails->thumbnail) }}" alt="" class="img-fluid">
                        <a href="{{ $courses->courseDetails->video }}" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
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
                                <a class="nav-link active" href="#Course_Details">
                                    <i class="fa-solid fa-circle-info"></i>
                                    Course Details
                                </a>
                            </li>
                            <li class="nav-item d-inline-block">
                                <a class="nav-link" href="#Modules">
                                    <i class="fa-solid fa-cubes"></i>
                                    Class Modules
                                </a>
                            </li>
                            <li class="nav-item d-inline-block mt-2 mt-md-0">
                                <a class="nav-link" href="#Instructor">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    Instructor
                                </a>
                            </li>
                        </div>
                    </ul>
                    <div class="content text-start text-md-center">
                        <div id="Course_Details" class="sec">
                            <h2 class="top text-center font-heding">এই কোর্স থেকে কি কি শিখবেন?</h2>
                            <div class="card text-start">
                                <ul class="ps-0 mb-0 learning">
                                    @forelse ($courses->courseLearnings as $item)
                                        <li class="d-flex justify-content-start align-items-start">
                                            <img src="{{ asset('storage/Learnings/'. $item->image) }}" alt="" style="width: 30px; object-fit: cover;">
                                            <p class="ms-3">{{ $item->content }}</p>
                                        </li>
                                    @empty
                                        <div class="col">
                                            <p class="text-danger">No Data Found</p>
                                        </div>
                                    @endforelse
                                </ul>
                            </div>
                            <h2 class="mt-3 text-center font-heding">কোর্সটি কাদের জন্য?</h2>
                            <div class="card text-start">
                                <ul class="ps-0 mb-0">
                                    @forelse ($courses->courseForThoose as $item)
                                        <li class="d-flex justify-content-start align-items-start">
                                            <img src="{{ asset('storage/courseThose/'. $item->image) }}" alt="" style="width: 30px; object-fit: cover;">
                                            <p class="ms-3 font-paragraph">{{ $item->content }}</p>
                                        </li>
                                    @empty
                                        <div class="col">
                                            <p class="text-danger">No Data Found</p>
                                        </div>
                                    @endforelse
                                </ul>
                            </div>
                            <h2 class="mt-3 text-center font-heding">আপনি যে সুবিধা গুলো পাবেন?</h2>
                            <div class="card text-start">
                                <ul class="ps-0 mb-0">
                                    @forelse ($courses->courseBenifits as $item)
                                        <li class="d-flex justify-content-start align-items-start">
                                            <img src="{{ asset('storage/benefitsOfCourse/'. $item->image) }}" alt="" style="width: 30px; object-fit: cover;">
                                            <p class="ms-3 font-paragraph">{{ $item->content }}</p>
                                        </li>
                                    @empty
                                        <div class="col">
                                            <p class="text-danger">No Data Found</p>
                                        </div>
                                    @endforelse
                                </ul>
                            </div>
                            @if(!$courses->coursestudentprojects->isEmpty())
                            <h2 class="mt-3 creative_project text-center font-heding">আমাদের স্টুডেন্টদের করা কিছু ক্রিয়েটিভ প্রজেক্ট সমূহ</h2>
                            <div class="card text-start" id="demo-carosel">
                                <div class="owl-carousel owl-theme demo-carosel">
                                    @forelse ($courses->coursestudentprojects as $item)
                                    <div class="demo-item">
                                        <img src="{{ asset('storage/creativeProject/'. $item->image) }}" alt="" class="img-fluid">
                                    </div>
                                    @empty
                                        <div class="col">
                                            <p class="text-danger">No Data Found</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            @endif
                        </div>
                        <div id="Modules" class="sec">
                            <h2 class="top mb-4 text-center font-heding">কোর্স মডিউল</h2>
                            <div class="accordion text-start" id="accordionExample">
                                @forelse ($courses->courseModuls as $item)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                      <button class="accordion-button collapsed shadow-none fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}">
                                        {{ $item->class_no }}
                                      </button>
                                    </h2>
                                    <div id="collapse{{ $item->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">
                                        {!! $item->class_topics !!}
                                      </div>
                                    </div>
                                  </div>
                                @empty
                                    <div class="col">
                                        <p class="text-danger">No Data Found</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div id="Instructor" class="sec">
                            <h2 class="top mb-4 text-center font-heding">কোর্স ইন্সট্রাকটর</h2>
                            <div class="card border-0">
                                <div class="d-flex justify-content-start gap-4 px-3 px-md-4 mb-0 pt-3">
                                    <div class="img-part">
                                        <img src="{{ asset('storage/mentors/image/'. $courses->courseDetails->mentor->image) }}" alt="">
                                    </div>
                                    <div class="text-start align-self-center">
                                        <h3 class="mb-0">{{ $courses->courseDetails->mentor->name }}</h3>
                                        <p class="mb-0">{{ $courses->courseDetails->mentor->designation }}</p>
                                    </div>
                                </div>
                                <hr>
                                <p class="px-3 px-md-4 pb-3 m-0 text-start mentor_description">{{ $courses->courseDetails->mentor->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="faq faq_single_course mt-4">
                        <h2 class="top text-center font-heding">কোর্স সম্পর্কিত সাধারণ প্রশ্নসমূহ</h2>
                        <div class="accordion" id="accordionExample">
                            <div class="row">
                                <div class="col-12">
                                    @forelse ($courses->courseFaq as $item)
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed font-paragraph" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne{{ $item->id }}" aria-bs-expanded="false" aria-bs-controls="collapseOne">
                                                    {{ $item->question }}
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne{{ $item->id }}" class="collapse" data-bs-parent="#accordionExample">
                                            <div class="card-body font-paragraph">
                                                {{ $item->answer }}
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <div class="col">
                                            <p class="text-danger">No Data Found</p>
                                        </div>
                                    @endforelse
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
