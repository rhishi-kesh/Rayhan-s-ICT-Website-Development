@extends('layouts.adminMaster')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 text-uppercase">About us</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="1uIy7RYtRQyMx9AouyeHRkdAj17QosUOhFot6gxm">
                <div class="row">
                    <input type="hidden" value="1" name="id">
                    <div class="col-md-12 mb-3">
                        <label for="why_choose_us" class="form-label">Why Choose Us</label>
                        <textarea class="form-control form-control-lg rounded-1 " name="why_choose_us" id="why_choose_us" placeholder="Why Choose Us" rows="5"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="choose_us_image" class="form-label">Select Why Choose Us Image</label>
                        <input class="form-control form-control-lg rounded-1  " type="file" id="choose_us_image" name="choose_us_image">
                        <img id="choose_us_image_p" src="" alt="Image Preview" style="max-width: 200px; max-height: 100px;" class="mt-3">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="mission" class="form-label">Our Mission</label>
                        <textarea class="form-control form-control-lg rounded-1 " name="mission" id="mission" placeholder="Our Mission" rows="5"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="mission_image" class="form-label">Our Mission Image</label>
                        <input class="form-control form-control-lg rounded-1  " type="file" id="mission_image"
                            name="mission_image">
                        <img id="mission_image_p" src="" alt="Image Preview" style="max-width: 200px; max-height: 100px;" class="mt-3">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="vision" class="form-label">Our Vision</label>
                        <textarea class="form-control form-control-lg rounded-1 " name="vision" id="our_vision" placeholder="Our Vision" rows="5"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="our_vision_image" class="form-label">Our Vision Image</label>
                        <input class="form-control form-control-lg rounded-1  " type="file" id="our_vision_image"
                            name="our_vision_image">
                        <img id="our_vision_image_p" src="" alt="Image Preview" style="max-width: 200px; max-height: 100px;" class="mt-3">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="project_c" class="form-label">Number Of Projects Completed</label>
                        <input type="text" value="" class="form-control form-control-lg rounded-1 "
                            name="project_c" id="project_c" placeholder="Projects Completed">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ongoing_p" class="form-label">Number Of Ongoing Projects</label>
                        <input type="text" value="" class="form-control form-control-lg rounded-1 "
                            name="ongoing_p" id="ongoing_p" placeholder="Ongoing Projects">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="employed" class="form-label">Number Of Work Employed</label>
                        <input type="text" value="" class="form-control form-control-lg rounded-1 " name="employed"
                            id="employed" placeholder="Work Employed">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="experiance" class="form-label">Number Of Years Experiance</label>
                        <input type="text" value="" class="form-control form-control-lg rounded-1 "
                            name="experiance" id="experiance" placeholder="Years Experiance">
                    </div>
                    <div class="col-12">
                        <div class="d-md-flex align-items-center mt-3">
                            <div class="ms-auto mt-3 mt-md-0">
                                <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-send me-2 fs-4"></i>
                                        Update
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
