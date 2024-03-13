@extends('layouts.frontendMaster')
@section('title','Admission')
@section('content')
<section class="py-5 my-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h2 class="text-uppercase mb-5 fw-bold admissionTitle">Admission Form</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{ route('admissionPost') }}" method="post" enctype="multipart/form-data" class="text-start" id="admissionForm">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control shadow-none" name="name" id="name" placeholder="Enter Name">
                        <label for="name">Name</label>
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="email" class="form-control shadow-none" name="email" id="email" placeholder="Enter E-mail">
                        <label for="email">Email</label>
                        <span class="text-danger error-text email_error"></span>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="number" class="form-control shadow-none" name="number" id="number" placeholder="Enter Number">
                        <label for="number">Number</label>
                        <span class="text-danger error-text number_error"></span>
                    </div>
                    <div class="mt-3">
                        <select id="subject" name="course" class="form-select shadow-none form-select-lg">
                            <option value="">Select Course</option>
                            @foreach ($course as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text course_error"></span>
                    </div>
                    <div class="form-floating mt-3">
                        <textarea name="massage" id="massage" class="form-control shadow-none" placeholder="Enter Massage"></textarea>
                        <label for="massage">Message</label>
                        <span class="text-danger error-text massage_error"></span>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="shadow-none submit_btn form-control text-uppercase form-control-lg" name="submit">
                            <span class="loader text-dark"></span>
                            <span class="submit_btn_text">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- form-end -->
@endsection
