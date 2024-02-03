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
                           <p class="mt-2">By: <span class="mentor">{{ $item->courseDetails->mentor->name }}</span></p>
                           <div class="d-flex justify-content-between align-items-center mt-5">
                               <p>
                                   <a href="{{ route('singleCourse',$item->slug) }}" class="buy-btn">Learn More</a>
                               </p>
                               <p><b>৳{{ $item->courseDetails->price }}</b></p>
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
