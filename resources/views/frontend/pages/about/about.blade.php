@extends('layouts.frontendMaster')
@section('title','About Us')
@section('content')
    <section class="about pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 align-self-center">
                    <h1 class="text-uppercase fs-1">Why Choose Us</h1>
                    <p class="mt-4 mb-0">{{ $about->chooseUs }}</p>
                    <div class="d-flex justify-content-start gap-1 gap-md-5 mt-4">
                        <div class="project_complete">
                            <h2>
                                <span class="ti ti-briefcase icon"></span>
                                <span class="time">{{ $about->successfullStudent }}+</span>
                            </h2>
                            <hr class="my-2 d-block">
                            <span>Successfull Student</span>
                        </div>
                        <div class="project_complete">
                            <h2>
                                <span class="ti ti-cup icon"></span>
                                <span class="time">{{ $about->courseComplete }}+</span>
                            </h2>
                            <hr class="my-2 d-block">
                            <span>Courses Complated</span>
                        </div>
                        <div class="project_complete">
                            <h2>
                                <span class="ti-medall-alt icon"></span>
                                <span class="time">{{ $about->successRatio }}%</span>
                            </h2>
                            <hr class="my-2 d-block">
                            <span>Success Ratio</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-5 text-center align-self-center d-none d-lg-block">
                    <img src="{{ asset("storage/about/choose/". $about->chooseUsImage) }}" alt="" class="img-fluid" style="max-width: 350px; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>
    <!-- about-section-end -->
    <section class="about missionVision py-2 py-md-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 order-2 text-end align-self-center">
                    <h1 class="text-uppercase fs-1">Our Mission & Vision</h1>
                    <p class="mt-4 mb-0">{{ $about->missionVision }}</p>
                </div>
                <div class="col-12 col-md-4 col-lg-5 text-center align-self-center d-none d-lg-block order-1 ">
                    <img src="{{ asset("storage/about/missionVision/". $about->missionVisionImage) }}" alt="" class="img-fluid" style="max-width: 350px; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>
    {{-- missionVision-section-end --}}
    <section class="courses py-3 pb-md-0 pt-md-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1 mb-0">Our Departments</h2>
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
    <!-- courses-section-end -->
    <section class="workshop py-3 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1 mb-4">Our Workspace</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row wokspece_img">
                        @forelse ($workSpaceImage as $item)
                        <div class="col">
                            <div class="wokspece_img_item">
                                <img class="img-fluid" src="{{  asset('storage/WorkSpace/'. $item->image)  }}" alt="rict office" style="width: 100%; height: 450px; object-fit: cover;">
                            </div>
                        </div>
                        @empty
                        <div class="col">
                            <p class="text-danger">No Department Found</p>
                        </div>
                        @endforelse
                    </div>
                    <div class="row wokspece_navs">
                        @forelse ($workSpaceImage as $item)
                        <div class="wokspece_navs_item">
                            <img class="img-fluid w-100" src="{{  asset('storage/WorkSpace/'. $item->image)  }}" alt="rict office" style="width: 100%; height: 70px; object-fit: cover;">
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
    <!-- mentors-end -->
    <section class="mentors py-3 py-lg-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1 mb-4">Meet Our Mentors</h2>
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
                            <div class="title">{{ $item->designation }}</div>
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
@endsection
