@extends('layouts.adminMaster')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 text-uppercase">About us</h4>
            <form action="{{ route('aboutPost') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" value="{{ $about->id }}" name="id">
                    <div class="col-md-12 mb-3">
                        <label for="chooseUs" class="form-label">Why Choose Us</label>
                        <textarea class="form-control form-control-lg rounded-1 @error('chooseUs') is-invalid @enderror" name="chooseUs" id="chooseUs" placeholder="Why Choose Us" rows="5">{{ $about->chooseUs }}</textarea>
                        @error('chooseUs')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="chooseUsImage" class="form-label">Why Choose Us Image</label>
                        <input class="form-control form-control-lg rounded-1 @error('chooseUsImage') is-invalid @enderror" type="file" id="chooseUsImage" name="chooseUsImage">
                        @error('chooseUsImage')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <img id="chooseUsImage_p" src="{{ asset('storage/about/choose/'. $about->chooseUsImage) }}" alt="Image Preview" style="max-width: 200px; max-height: 100px;" class="mt-3">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="missionVision" class="form-label">Our Mission & Vision</label>
                        <textarea class="form-control form-control-lg rounded-1 @error('missionVision') is-invalid @enderror" name="missionVision" id="missionVision" placeholder="Our Mission & Vision" rows="5">{{ $about->missionVision }}</textarea>
                        @error('missionVision')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="missionVisionImage" class="form-label">Our Mission & Vision Image</label>
                        <input class="form-control form-control-lg rounded-1 @error('missionVisionImage') is-invalid @enderror" type="file" id="missionVisionImage" name="missionVisionImage">
                        @error('missionVisionImage')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <img id="missionVisionImage_p" src="{{ asset('storage/about/missionVision/'. $about->missionVisionImage) }}" alt="Image Preview" style="max-width: 200px; max-height: 100px;" class="mt-3">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="successfullStudent" class="form-label">Successful Student</label>
                        <input type="number" value="{{ $about->successfullStudent }}" class="form-control form-control-lg rounded-1 @error('successfullStudent') is-invalid @enderror" name="successfullStudent" id="successfullStudent"  placeholder="Successfull Student">
                        @error('successfullStudent')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="courseComplete" class="form-label">Course Completed</label>
                        <input type="number" value="{{ $about->courseComplete }}" class="form-control form-control-lg rounded-1 @error('courseComplete') is-invalid @enderror" name="courseComplete" id="courseComplete" placeholder="Course Complete">
                        @error('courseComplete')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="successRatio" class="form-label">Success Ratio</label>
                        <input type="text" value="{{ $about->successRatio }}" class="form-control form-control-lg rounded-1 @error('successRatio') is-invalid @enderror" name="successRatio" id="successRatio" placeholder="Success Ratio">
                        @error('successRatio')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
    @section('jss')
        <script>
            chooseUsImage.onchange = evt => {
            const [file] = chooseUsImage.files
            if (file) {
                chooseUsImage_p.src = URL.createObjectURL(file)
            }
        }
        </script>
        <script>
            missionVisionImage.onchange = evt => {
            const [file] = missionVisionImage.files
            if (file) {
                missionVisionImage_p.src = URL.createObjectURL(file)
            }
        }
        </script>
    @endsection
@endsection
