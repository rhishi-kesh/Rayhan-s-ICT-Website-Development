@extends('layouts.frontendMaster')
@section('title','Admission')
@section('content')
<section class="py-5 my-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h2 class="text-uppercase mb-2 fw-bold admissionTitle">Admission Form</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="http://127.0.0.1:8000/api/admission" method="post" enctype="multipart/form-data" class="text-start" id="admissionForm">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-none" name="name" id="name" placeholder="Enter Name">
                                <label for="name">Name</label>
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="number" class="form-control shadow-none" name="mobileNumber" id="mobileNumber" placeholder="Enter Number">
                                <label for="mobileNumber">Number</label>
                                <span class="text-danger error-text mobileNumber_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-none" name="fatherName" id="fatherName" placeholder="Enter Father Name">
                                <label for="fatherName">Father Name</label>
                                <span class="text-danger error-text fatherName_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-none" name="motherName" id="motherName" placeholder="Enter Mother Name">
                                <label for="motherName">Mother Name</label>
                                <span class="text-danger error-text motherName_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="email" class="form-control shadow-none" name="email" id="email" placeholder="Enter E-mail">
                                <label for="email">Email</label>
                                <span class="text-danger error-text email_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-none" name="address" id="address" placeholder="Enter Address">
                                <label for="address">Address</label>
                                <span class="text-danger error-text address_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="date" class="form-control shadow-none" name="date" id="date">
                                <label for="date">Date</label>
                                <span class="text-danger error-text date_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-none" name="qualification" id="qualification" placeholder="Enter Qualification">
                                <label for="qualification">Qualification</label>
                                <span class="text-danger error-text qualification_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-none" name="profession" id="profession" placeholder="Enter Profession">
                                <label for="profession">Profession</label>
                                <span class="text-danger error-text profession_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-none" name="gMobile" id="gMobile" placeholder="Enter Guardian Mobile">
                                <label for="gMobile">Guardian Mobile</label>
                                <span class="text-danger error-text gMobile_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div>
                                <select id="subject" name="course" class="form-select shadow-none form-select-lg">
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text course_error"></span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="shadow-none submit_btn form-control text-uppercase form-control-lg" name="submit">
                                <span class="loader text-dark"></span>
                                <span class="submit_btn_text">Submit</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- form-end -->
@endsection
