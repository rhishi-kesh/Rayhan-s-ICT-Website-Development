@extends('layouts.frontendMaster')
@section('title','Professional IT Training Institute in Mirpur 10')
@section('content')
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 align-self-center">
                <h1 class="display-5 font-heding">{!! $heroInformations->title !!}</h1>
                <p class="mt-3 lead font-paragraph">{{ $heroInformations->description }}</p>
                <div class="btns mt-4 d-flex justify-content-start">
                    <a href="{{ route('about') }}">
                        <i class="fa-solid fa-users"></i>
                        About Us
                    </a>
                    <a href="{{ route('course') }}" class="ms-3">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Our Course
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-6 text-center text-lg-start mt-4 mt-lg-0 align-self-center">
                <div class="banner">
                    <img src="{{ asset('storage/heroInformation/'. $heroInformations->thumbnail) }}" alt="" class="img-fluid">
                    <a href="{{ $heroInformations->video }}" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
                        <svg width="100" height="100" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                            <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                            <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel owl-theme courses courses-department">
                @forelse ($departments as $item)
                <a href="{{ route('singleDepartment', $item->slug) }}">
                    <div class="col">
                        <div class="d-flex justify-content-center align-item-center">
                            <img src="{{ asset('storage/department/'. $item->image) }}" alt="" class="d-block">
                        </div>
                        <h6>{{ $item->departmentName }}</h6>
                    </div>
                </a>
                @empty
                <div class="col">
                    <p class="text-danger">No Department Found</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
<!-- hero-end -->
<section class="success_story py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0 font-heding">সফলতার গল্প</h2>
                <span></span>
                <p class="mt-1 lead font-paragraph">আমাদের কোর্সের শিক্ষার্থীরা কোর্স শেষ করে সফলতার সাথে বিভিন্ন জায়গায় কাজ করছেন। তাদের এই সফলতা আমাদেরকে অনুপ্রানিত করে।</p>
            </div>
        </div>
        <div class="row">
            @forelse ($successStorys as $item)
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    <div class="banner">
                        <img src="{{ asset('storage/SuccessStory/'. $item->thumbnail) }}" alt="" class="img-fluid">
                        <a href="{{ $item->video_link }}" data-autoplay="true" data-vbtype="video" class="RICT_Videos">
                            <svg width="80" height="80" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="32.5" cy="32.5" r="32.5" fill="white" fill-opacity="0.5"/>
                                <ellipse cx="32.4991" cy="32.5011" rx="20.546" ry="20.546" fill="white"/>
                                <path d="M41.0035 32.128C41.2901 32.2935 41.2901 32.7072 41.0035 32.8727L28.5673 40.0527C28.2807 40.2182 27.9223 40.0114 27.9223 39.6803L27.9223 25.3203C27.9223 24.9893 28.2807 24.7824 28.5673 24.9479L41.0035 32.128Z" fill="#E16127"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
            <div class="col">
                <p class="text-danger">No Department Found</p>
            </div>
            @endforelse
        </div>
        <div class="row btn-section">
            <div class="col-12 mt-4">
                <p class="mb-0">
                    <a href="{{ route('success') }}" class="seeMore"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> See More</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- success_story-end -->
<section class="Course py-4 py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0">Populer Course</h2>
                <span></span>
                <p class="mt-1 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas rerum veniam.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-2">
                <ul class="nav d-flex justify-content-center align-items-center courseDepartment">
                    @forelse ($departments as $item)
                        <li class="nav-item d-flex justify-content-center mt-4" role="presentation">
                            <button class="nav-link px-0 fw-bold" type="button">{{ $item->departmentName }}</button>
                        </li>
                    @empty
                        <div class="col">
                            <p class="text-danger">No Department Found</p>
                        </div>
                    @endforelse
                </ul>
                <div class="course_items CoursesUnderDepartment">
                    @forelse ($departments as $data)
                        <div class="row">
                            <div class="course_category_slider">
                                @foreach ($courses->where('department_id',$data->id) as $item)
                                    <div class="col mt-4 mx-2">
                                        <div class="card">
                                            <a href="{{ route('singleCourse',$item->slug) }}" class="img">
                                                <img src="{{ asset('storage/CourseDetails/'. $item->courseDetails->thumbnail) }}" alt="">
                                            </a>
                                            <div class="card-body pb-2">
                                                <h5>
                                                    <a href="{{ route('singleCourse',$item->slug) }}">{{ $item->name }}</a>
                                                </h5>
                                                <p class="mt-2">By: <span class="mentor">{{ $item->courseDetails->mentor->name }}</span></p>
                                                <div class="d-flex justify-content-between mt-5 align-items-center">
                                                    <p>
                                                        <a href="{{ route('singleCourse',$item->slug) }}" class="buy-btn">Learn More</a>
                                                    </p>
                                                    <p><b>৳{{ $item->courseDetails->price }}</b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="col">
                            <p class="text-danger">No Department Found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end-course -->
<section class="Reviews py-4 py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0">What People Think <b class="text-brand-1">About Us?</b></h2>
                <span></span>
                <p class="mt-1 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas rerum veniam.</p>
            </div>
        </div>
        <div class="row review">
            <div class="owl-carousel owl-theme review-carosel">
                @forelse ($reviews as $item)
                <div class="col">
                    <div class="card border-0">
                        {!! $item->review !!}
                    </div>
                </div>
                @empty
                <div class="col">
                    <p class="text-danger">No Department Found</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
<!-- Reviews-end -->
<section class="mentors py-4 py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0">Meet Our Mentors</h2>
                <span></span>
                <p class="mt-1 lead">Introducing our accomplished mentors, a dedicated team of experts ready to guide and inspire you on your professional journey.</p>
            </div>
        </div>
        <div class="row mentor">
            <div class="owl-carousel owl-theme mentor-carosel">
                @forelse ($mentor as $item)
                <div class="col">
                    <div class="card">
                        <div class="mentor-bg" style='background-image: url({{ asset("storage/mentors/thumbnail/". $item->thumbnail) }})'>
                            <img class="profile" src="{{ asset("storage/mentors/image/". $item->image) }}" alt="">
                        </div>
                        <h2 class="name">{{ $item->name }}</h2>
                        <div class="title mb-0">{{ $item->designation }}</div>
                        <div class="department text-center mb-3">
                            <span>{{ $item->department->departmentName }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col">
                    <p class="text-danger">No Department Found</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
<!-- mentors-end -->
<section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <img src="{{ asset('bteb.png') }}" alt="bteb" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section class="brands py-4 py-lg-5">
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0">we are authorised by</h2>
                <span></span>
                <p class="mt-1 lead">We are officially authorized, signifying our commitment to professionalism and adherence to recognized standards.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="row justify-content-center">
                    @forelse ($auth_logo as $item)
                        <div class="col-6 col-md-4 align-self-center text-center mt-4 mt-md-0">
                            <img src="{{ asset("storage/authorisedby/". $item->image) }}" alt="" class="img-fluid">
                        </div>
                    @empty
                    <div class="col-12 col-md-6 col-lg-4 mt-4">
                        <div class="card text-center p-3 bg-light">
                            <p class="mb-0 text-danger">No Data Found</p>
                        </div>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Brands-end -->
<section class="faq py-4 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 text-center section-head">
                <h2 class="text-uppercase fs-1 mb-0 font-heding">সচরাচর জিজ্ঞাসিত প্রশ্ন</h2>
                <span></span>
                <p class="mt-1 lead font-paragraph">আপনি যে বিষয়গুলো সম্পর্কে জানতে চান তা আমাদের সাথে শেয়ার করুন। আমরা আপনাদের সহযোগিতা করার জন্য সর্বদা প্রস্তুত</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="accordion" id="accordionExample">
                    <div class="row">
                        @forelse ($faq as $item)
                        <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="font-paragraph btn btn-link collapsed" type="button" data-bs-toggle="collapse"
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
                        </div>
                        @empty
                        <div class="col-12 col-md-6 col-lg-4 mt-4">
                            <div class="card text-center p-3 bg-light">
                                <p class="mb-0 text-danger">No Data Found</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Faq-End -->
<!-- pop up Modal -->
@if(!empty($popup->id))
<div class="modal fade" id="popupadvirtise" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="top: 50%; transform: translateY(-50%) !important;">
      <div class="modal-content">
        <div class="modal-body p-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <img src="{{ asset("storage/PopUp/". $popup->image) }}" alt="" class="w-100">
        </div>
      </div>
    </div>
  </div>
@endif
@endsection
