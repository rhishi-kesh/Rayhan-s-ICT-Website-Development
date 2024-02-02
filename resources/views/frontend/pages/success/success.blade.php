@extends('layouts.frontendMaster')
@section('title','Success')
@section('content')
    <section class="success_story py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1 mb-0">Success Stories</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($successStorys as $item)
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
                @endforeach
            </div>
        </div>
    </section>
    <!-- success_story-end -->
    <section class="Reviews py-3 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center section-head">
                    <h2 class="text-uppercase fs-1 mb-4">What People Think About Us</h2>
                </div>
            </div>
            <div class="review reviewSuccess">
                @foreach ($reviews as $item)
                <div class="reviewSuccessItem">
                    <div class="card border-0">
                        {!! $item->review !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Reviews-end -->
@endsection
