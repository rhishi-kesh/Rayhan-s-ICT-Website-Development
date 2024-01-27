@extends('layouts.adminMaster')
@section('content')
    <div class="card">
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert bg-success text-white alert-dismissible border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ Session::get('success') }}
                </div>
            @endif
            <h4 class="mb-3 text-uppercase">Hero</h4>
            <form action="{{ route('heroPost') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" value="{{ $heroInformation->id }}" name="id">
                    <div class="col-md-12">
                        <label for="title" class="form-label">Hero Title</label>
                        <textarea rows="2" class="form-control form-control-lg rounded-1 @error('title') is-invalid @enderror" name="title" id="title" placeholder="title">{{ $heroInformation->title }}</textarea>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="description" class="form-label">Hero Description</label>
                        <textarea rows="3" class="form-control form-control-lg rounded-1 @error('description') is-invalid @enderror" name="description" id="description" placeholder="Description">{{ $heroInformation->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="video" class="form-label">Hero Video Url</label>
                        <input type="url" value="{{ $heroInformation->video }}" class="form-control form-control-lg rounded-1 @error('video') is-invalid @enderror" name="video" id="video" placeholder="Video url">
                        @error('video')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="thumbnail" class="form-label">Hero Thumbnail</label>
                        <input type="file" class="mt-2 form-control form-control-lg rounded-1 @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail" placeholder="thumbnail url">
                        @error('thumbnail')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <img src="{{ asset('storage/heroInformation/'. $heroInformation->thumbnail) }}" alt="" width="180" id="thumbnail_image">
                        @section('jss')
                            <script>
                                thumbnail.onchange = evt => {
                                const [file] = thumbnail.files
                                if (file) {
                                    thumbnail_image.src = URL.createObjectURL(file)
                                }
                            }
                            </script>
                        @endsection
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
