@extends('layouts.frontendMaster')
@section('title',"$title")
@section('content')
    <section class="Course py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1 mb-0">{{ $departments->departmentName }}</h2>
                </div>
            </div>
            <div class="row course_items mt-4 justify-content-center">
                @forelse ($courses as $item)
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                   <div class="card">
                       <a href="{{ route('singleCourse',$item->slug) }}" class="img">
                           <img src="{{ asset('storage/CourseDetails/') }}/{{ $item->courseDetails->thumbnail }}" alt="" class="img-fluid">
                       </a>
                       <div class="card-body pb-2">
                            <h5>
                                <a href="{{ route('singleCourse',$item->slug) }}">{{ $item->name }}</a>
                            </h5>
                            <p><b>৳{{ $item->courseDetails->price }}</b></p>

                            <div class="row text-start other_detailes ps-2">
                                <div class="col-12 col-md-4 p-0">
                                    <p class="text-start text-md-center"><i class="ti-time me-2 mt-1"></i> <span class="font-paragraph">সময়কাল:</span> {{ $item->courseDetails->duration }} <span class="font-paragraph">মাস</span></p>
                                </div>
                                <div class="col-12 col-md-4 p-0">
                                    <p class="text-start text-md-center"><i class="ti-book me-2 mt-1"></i> <span class="font-paragraph">ক্লাস:</span> {{ $item->courseDetails->lecture }}</p>
                                </div>
                                @if(!empty($item->courseDetails->project))
                                    <div class="col-12 col-md-4 p-0">
                                        <p class="text-start"><i class="ti-target me-2 mt-1"></i> <span class="font-paragraph">প্রজেক্ট:</span> {{ $item->courseDetails->project }}+</p>
                                    </div>
                                @endif
                            </div>
                            <div class="d-block d-md-flex justify-content-between align-items-center text-center">
                                <p class="mb-1">
                                    <a href="{{ route('demoClass') }}" class="buy-btn">Apply For Demo Class</a>
                                </p>
                                <p class="mb-1">
                                    <a href="{{ route('singleCourse',$item->slug) }}" class="buy-btn">Details</a>
                                </p>
                            </div>
                        </div>
                   </div>
                </div>
                @empty
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    <div class="card text-center p-3 bg-light">
                        <p class="mb-0 text-danger">No Course Found</p>
                    </div>
                </div>
                @endforelse

            </div>
        </div>
    </section>
    <!-- Course-section-end -->
@endsection
