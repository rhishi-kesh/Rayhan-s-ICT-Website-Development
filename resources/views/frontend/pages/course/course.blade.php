@extends('layouts.frontendMaster')
@section('title','Our Course')
@section('content')
    <section class="Course pb-5">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1">Populer Course</h2>
                </div>
            </div>
            <div class="row course_items justify-content-center">
                @foreach ($courses as $data)
                    <div class="col-12 col-md-6 col-lg-4 mt-4">
                        <div class="card">
                            <a href="{{ route('singleCourse',$data->slug) }}" class="img">
                                <img src="{{ asset('storage/CourseDetails/'. $data->CourseDetails->thumbnail) }}" alt="" class="img-fluid">
                            </a>
                            <div class="card-body pb-2">
                                <h5>
                                    <a href="{{ route('singleCourse',$data->slug) }}">{{ $data->name }}</a>
                                </h5>
                                <p><b>৳{{ $data->courseDetails->price }}</b></p>

                                <div class="row text-start other_detailes ps-2">
                                    <div class="col-12 col-md-4 p-0">
                                        <p class="text-start text-md-center"><i class="ti-time me-2 mt-1"></i> <span class="font-paragraph">সময়কাল:</span> {{ $data->courseDetails->duration }} <span class="font-paragraph">মাস</span></p>
                                    </div>
                                    <div class="col-12 col-md-4 p-0">
                                        <p class="text-start text-md-center"><i class="ti-book me-2 mt-1"></i> <span class="font-paragraph">ক্লাস:</span> {{ $data->courseDetails->lecture }}</p>
                                    </div>
                                    @if(!empty($data->courseDetails->project))
                                        <div class="col-12 col-md-4 p-0">
                                            <p class="text-start"><i class="ti-target me-2 mt-1"></i> <span class="font-paragraph">প্রজেক্ট:</span> {{ $data->courseDetails->project }}+</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-block d-md-flex justify-content-between align-items-center text-center">
                                    <p class="mb-1">
                                        <a href="{{ route('demoClass') }}" class="buy-btn">Apply For Demo Class</a>
                                    </p>
                                    <p class="mb-1">
                                        <a href="{{ route('singleCourse',$data->slug) }}" class="buy-btn">Details</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- courses-section-end -->
    <section class="Reviews py-3 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1 mb-4">What People Think About Us</h2>
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
@endsection
