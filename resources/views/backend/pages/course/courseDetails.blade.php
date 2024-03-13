@extends('layouts.adminMaster')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 text-uppercase">Course Details</h4>
            @if(Session::has('success'))
                <div class="alert bg-success text-white alert-dismissible border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert bg-danger text-white alert-dismissible border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ Session::get('error') }}
                </div>
            @endif
            <form action="{{ route('courseDetailesEdit',$courseDetails->course_id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mt-4">
                        <label for="price">Price</label>
                        <input type="number" id="price" value="{{ $courseDetails->price }}" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Price">
                        @error('price','insert')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-4">
                        <label for="project">Project</label>
                        <input type="number" id="project" value="{{ $courseDetails->project }}"  class="form-control @error('project') is-invalid @enderror" name="project" placeholder="Number of Project">
                        @error('project','insert')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-4">
                        <label for="duration">Duration(month)</label>
                        <input type="number" value="{{ $courseDetails->duration }}"  id="duration" class="form-control @error('duration') is-invalid @enderror" name="duration" placeholder="Duration (month)">
                        @error('duration','insert')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-4">
                        <label for="lectur">Lecture</label>
                        <input type="number" value="{{ $courseDetails->lecture }}"  id="lectur" class="form-control @error('lecture') is-invalid @enderror" name="lecture" placeholder="Lecture">
                        @error('lecture','insert')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-4">
                        <label for="video">Video Link</label>
                        <input type="url" value="{{ $courseDetails->video }}"  id="video" class="form-control @error('video') is-invalid @enderror" name="video" placeholder="Video Link">
                        @error('video','insert')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-4">
                        <label for="mentor_id">Select Mentor</label>
                        <select name="mentor_id" id="mentor_id" class="form-select @error('mentor_id') is-invalid @enderror">
                            <option value="">Select Mentor</option>
                            @foreach ($mentors as $item_ment)
                                <option value="{{ $item_ment->id }}" @if($item_ment->id == $courseDetails->mentor_id) selected @endif>{{ $item_ment->name }}</option>
                            @endforeach
                        </select>
                        @error('mentor_id','insert')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 mt-4">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description">{{ $courseDetails->description }}</textarea>
                        @error('description','insert')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-4">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                        @error('thumbnail','insert')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <img src="{{ asset('storage/CourseDetails/') }}/{{ $courseDetails->thumbnail }}" class="img-fluid rounded-top" id="thumbnail_preview" alt="image Preview" width="50" height="50" />
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
                                <a href="{{ route('courses') }}" class="btn btn-dark font-medium rounded-pill px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('jss')
        <script>
            thumbnail.onchange = evt => {
            const [file] = thumbnail.files
            if (file) {
                thumbnail_preview.src = URL.createObjectURL(file)
            }
        }
        </script>
    @endsection
@endsection
