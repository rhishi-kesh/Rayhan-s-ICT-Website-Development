@extends('layouts.frontendMaster')
@section('title','Our Course')
@section('content')
    <section class="Course pb-5">
        <div class="container">
            @forelse ($course as $data)
                <div class="row justify-content-center mt-5">
                    <div class="col-12 col-md-8 text-center section-head">
                        <h2 class="text-uppercase fs-1">{{ $data->department->departmentName }}</h2>
                    </div>
                </div>
                <div class="row course_items justify-content-center">
                    <div class="col-12 col-md-6 col-lg-4 mt-4">
                        <div class="card">
                            <a href="{{ route('singleCourse',$data->slug) }}" class="img">
                                <img src="{{ asset('storage/CourseDetails/'. $data->CourseDetails->thumbnail) }}" alt="" class="img-fluid">
                            </a>
                            <div class="card-body pb-2">
                                <h5>
                                    <a href="{{ route('singleCourse',$data->slug) }}">{{ $data->name }}</a>
                                </h5>
                                <p class="mt-2">By: <a href="" class="mentor">Rayhanul islam</a></p>
                                <div class="d-flex justify-content-between align-items-center mt-5">
                                    <p>
                                        <a href="{{ route('singleCourse',$data->slug) }}" class="buy-btn">Learn More</a>
                                    </p>
                                    <p><b>৳15000</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p class="text-danger">No Data Found</p>
                </div>
            @endforelse
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
