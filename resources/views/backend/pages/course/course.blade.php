@extends('layouts.adminMaster')
@section('content')
<div class="table-responsive rounded-2 mb-4">
    <a href="#addData" data-bs-toggle="modal" class="btn btn-secondary btn-lg mb-3">
        <i class="fs-4 ti ti-plus"></i>
        Add new Course
    </a>
    <table class="table border text-nowrap customize-table mb-3 align-middle">
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
      <thead class="text-dark fs-4">
        <tr>
          <th><h6 class="fs-4 fw-semibold mb-0">SL</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Name</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Department</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Status</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($courses as $key => $item)
        <tr>
            <td>
                <span>{{ $courses->firstItem()+$key }}</span>
            </td>
            <td class="text-center">
                <span>{{ $item->name }}</span>
            </td>
            <td class="text-center">
                <span>{{ $item->department->departmentName ?? "N/A" }}</span>
            </td>
            <td class="switch-sm text-center">
                <div class="form-check form-switch d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" onclick="is_active({{ $item->id }})" id="flexSwitchCheckChecked" @if($item->is_active == 0) checked @endif>
                </div>
            </td>
            <td class="text-end">
                <div class="dropdown dropstart">
                    <a href="#" class="text-muted pe-4" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-dots fs-5"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                        <li>
                        <a class="dropdown-item d-flex align-items-center gap-3" href="#editData{{ $item->id }}" data-bs-toggle="modal"><i class="fs-4 ti ti-edit"></i>Edit</a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="{{ route('courseDelete',$item->id) }}"><i class="fs-4 ti ti-trash"></i>Delete</a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="{{ route('courseDetailes',$item->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-details" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 5h8" /><path d="M13 9h5" /><path d="M13 15h8" /><path d="M13 19h5" /><path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>
                                Edit Course Details
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="{{ route('CourseLearnings',$item->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-drops" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17.637 7.416a7.907 7.907 0 0 1 1.76 8.666a8 8 0 0 1 -7.397 4.918a8 8 0 0 1 -7.396 -4.918a7.907 7.907 0 0 1 1.759 -8.666l5.637 -5.416l5.637 5.416z" /><path d="M14.466 10.923a3.595 3.595 0 0 1 .77 3.877a3.5 3.5 0 0 1 -3.236 2.2a3.5 3.5 0 0 1 -3.236 -2.2a3.595 3.595 0 0 1 .77 -3.877l2.466 -2.423l2.466 2.423z" /></svg>
                                Add Learning Form Course
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-affiliate" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5.931 6.936l1.275 4.249m5.607 5.609l4.251 1.275" /><path d="M11.683 12.317l5.759 -5.759" /><path d="M5.5 5.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0" /><path d="M18.5 5.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0" /><path d="M18.5 18.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0" /><path d="M8.5 15.5m-4.5 0a4.5 4.5 0 1 0 9 0a4.5 4.5 0 1 0 -9 0" /></svg>
                                Add Course For Those
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-puzzled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14.986 3.51a9 9 0 1 0 1.514 16.284c2.489 -1.437 4.181 -3.978 4.5 -6.794" /><path d="M10 10h.01" /><path d="M14 8h.01" /><path d="M12 15c1 -1.333 2 -2 3 -2" /><path d="M20 9v.01" /><path d="M20 6a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" /></svg>
                                Add Benefits of the Course
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-radioactive" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13.5 14.6l3 5.19a9 9 0 0 0 4.5 -7.79h-6a3 3 0 0 1 -1.5 2.6" /><path d="M13.5 9.4l3 -5.19a9 9 0 0 0 -9 0l3 5.19a3 3 0 0 1 3 0" /><path d="M10.5 14.6l-3 5.19a9 9 0 0 1 -4.5 -7.79h6a3 3 0 0 0 1.5 2.6" /></svg>
                                Add Creative Projects
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-carousel-vertical" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 8v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1v-8a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1z" /><path d="M7 22v-1a1 1 0 0 1 1 -1h8a1 1 0 0 1 1 1v1" /><path d="M17 2v1a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-1" /></svg>
                                Add Course Module
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-guitar-pick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 18.5c2 -2.5 4 -6.5 4 -10.5c0 -2.946 -2.084 -4.157 -4.204 -4.654c-.864 -.23 -2.13 -.346 -3.796 -.346c-1.667 0 -2.932 .115 -3.796 .346c-2.12 .497 -4.204 1.708 -4.204 4.654c0 3.312 2 8 4 10.5c.297 .37 .618 .731 .963 1.081l.354 .347a3.9 3.9 0 0 0 5.364 0a14.05 14.05 0 0 0 1.319 -1.428z" /></svg>
                                Add Course Instructor
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help-hexagon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z" /><path d="M12 16v.01" /><path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" /></svg>
                                Add Course Faq
                            </a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        <div class="modal" id="editData{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                  <h6 class="modal-title text-white">Edit Course</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('courseEdit') }}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <div class="row">
                                    <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                                    <div class="col-md-12 mb-3">
                                        <div class="note-title">
                                            <label for="name">Name</label>
                                            <input type="text" value="{{ $item->name }}" id="name" class="form-control @error('name') is-invalid @enderror" name="name">
                                            @error('name','update')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="note-title mt-3">
                                            <label for="department">Select Department</label>
                                            <select name="department_id" id="department_id" class="form-control @error('department_id') is-invalid @enderror">
                                                <option value="">Select Department</option>
                                                @foreach ($departments as $item_dep)
                                                    <option value="{{ $item_dep->id }}" @if($item_dep->id == $item->department_id) selected @endif>{{ $item_dep->departmentName }}</option>
                                                @endforeach
                                            </select>
                                            @error('department_id','update')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-n-add" name="sub" type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @empty
        <tr>
            <td class="text-center text-danger" colspan="20">NO Data Found</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $courses->links() }}
    <div class="modal" id="addData">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content border-0">
            <div class="modal-header bg-primary">
              <h6 class="modal-title text-white">Add Course</h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('coursePost') }}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="row">
                                        <h4>Course Name & Department</h4>
                                        <div class="col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Name">
                                            @error('name','insert')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-3 mt-md-0">
                                            <label for="department">Select Department</label>
                                            <select name="department_id" id="department_id" class="form-control @error('department_id') is-invalid @enderror">
                                                <option value="">Select Department</option>
                                                @foreach ($departments as $item_dep)
                                                    <option value="{{ $item_dep->id }}">{{ $item_dep->departmentName }}</option>
                                                @endforeach
                                            </select>
                                            @error('department_id','insert')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <h4>Course Details</h4>
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label for="price">Price</label>
                                            <input type="number" id="price" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Price">
                                            @error('price','insert')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="project">Project</label>
                                            <input type="number" id="project" class="form-control @error('project') is-invalid @enderror" name="project" placeholder="Number of Project">
                                            @error('project','insert')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="duration">Duration(month)</label>
                                            <input type="number" id="duration" class="form-control @error('duration') is-invalid @enderror" name="duration" placeholder="Duration (month)">
                                            @error('duration','insert')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="lectur">Lecture</label>
                                            <input type="number" id="lectur" class="form-control @error('lecture') is-invalid @enderror" name="lecture" placeholder="Lecture">
                                            @error('lecture','insert')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-8 mt-2">
                                            <label for="video">Video Link</label>
                                            <input type="url" id="video" class="form-control @error('video') is-invalid @enderror" name="video" placeholder="Video Link">
                                            @error('video','insert')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-8 mt-2">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description"></textarea>
                                            @error('description','insert')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="thumbnail">Thumbnail</label>
                                            <input type="file" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                                            @error('thumbnail','insert')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <img src="#" class="img-fluid rounded-top" id="thumbnail_preview" alt="image Preview" width="50" height="50" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Discard</button>
                    <button id="btn-n-add" name="name2" type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @section('jss')
        <script>
            function is_active(id){
                var id = id;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:'/admin/staus',
                    data: {id:id},
                    success:function(res) {
                        console.log(res.status);
                    }
                });
            }
        </script>
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
