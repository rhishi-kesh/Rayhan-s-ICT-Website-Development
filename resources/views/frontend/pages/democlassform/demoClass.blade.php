@extends('layouts.frontendMaster')
@section('title','Apply For Demo Class')
@section('content')
<section class="py-5 my-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h2 class="text-uppercase mb-5 fw-bold demoClassTitle">Register For Free Demo Class</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{ route('applyForDemoClassPost') }}" method="post" enctype="multipart/form-data" class="text-start" id="DemoclassForm">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control shadow-none" name="name" id="name" placeholder="Enter Name">
                        <label for="name">Name</label>
                        <span class="text-danger error-text name_errorD"></span>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="email" class="form-control shadow-none" name="email" id="email" placeholder="Enter E-mail">
                        <label for="email">Email</label>
                        <span class="text-danger error-text email_errorD"></span>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="number" class="form-control shadow-none" name="number" id="number" placeholder="Enter Number">
                        <label for="number">Number</label>
                        <span class="text-danger error-text number_errorD"></span>
                    </div>
                    <div class="mt-3">
                        <select id="subject" name="course" class="form-select form-select-lg shadow-none">
                            <option value="">Select Course</option>
                            @foreach ($course as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text course_errorD"></span>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="text" class="form-control shadow-none" name="address" id="address" placeholder="Enter Address">
                        <label for="address">Address</label>
                        <span class="text-danger error-text address_errorD"></span>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="text" class="form-control shadow-none" name="profession" id="profession" placeholder="Enter Current Profession">
                        <label for="profession">Current Profession</label>
                        <span class="text-danger error-text profession_errorD"></span>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="submit_btn shadow-none form-control text-uppercase form-control-lg" name="submit">
                            <span class="loader text-dark"></span>
                            <span class="submit_btn_text">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
