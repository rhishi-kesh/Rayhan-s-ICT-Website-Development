@extends('layouts.adminMaster')
@section('content')
<div class="table-responsive rounded-2 mb-4">
    <a href="#addData" data-bs-toggle="modal" class="btn btn-secondary btn-lg mb-3">
        <i class="fs-4 ti ti-plus"></i>
        Add new
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
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Image</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($departments as $key => $item)
        <tr>
            <td>
                <span>{{ $departments->firstItem()+$key }}</span>
            </td>
            <td class="text-center">
                <span>{{ $item->departmentName }}</span>
            </td>
            <td class="text-center">
                <img src="{{ asset('storage/department/') }}/{{ $item->image }}" alt="" width="60" height="60">
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
                        <a class="dropdown-item d-flex align-items-center gap-3" onclick="return confirm('Are you want to delete?')" href="{{ route('departmentDelete',$item->id) }}"><i class="fs-4 ti ti-trash"></i>Delete</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        <div class="modal" id="editData{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                  <h6 class="modal-title text-white">Edit WorkSpace Image</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('departmentEdit') }}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <div class="row">
                                    <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                                    <div class="col-md-12 mb-3">
                                        <div class="note-title">
                                            <label for="name">Department Name</label>
                                            <input type="text" value="{{ $item->departmentName }}" id="name" class="form-control @error('name') is-invalid @enderror" name="name">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="note-title">
                                            <label for="departmentImage">Image</label>
                                            <input type="file" id="departmentImage" class="form-control @error('image') is-invalid @enderror" name="image">
                                            @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <img src="{{ asset('storage/department/') }}/{{ $item->image }}" alt="" width="60" height="60" class="mt-2" id="departmentImage_p">
                                            @section('jss')
                                                <script>
                                                    departmentImage.onchange = evt => {
                                                    const [file] = departmentImage.files
                                                    if (file) {
                                                        departmentImage_p.src = URL.createObjectURL(file)
                                                    }
                                                }
                                                </script>
                                            @endsection
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-n-add" type="submit" class="btn btn-primary">Update</button>
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
    {{ $departments->links() }}
    <div class="modal" id="addData">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content border-0">
            <div class="modal-header bg-primary">
              <h6 class="modal-title text-white">Add WorkSpace Image</h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('departmentPost') }}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title">
                                        <label for="name">Department Name</label>
                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Name">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title">
                                        <label for="image_demo">Image</label>
                                        <input type="file" id="workshop_image" class="form-control @error('image') is-invalid @enderror" name="image">
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <img src="#" alt="Image Preview" width="180" id="image_demo">
                                        @section('jss')
                                            <script>
                                                workshop_image.onchange = evt => {
                                                const [file] = workshop_image.files
                                                if (file) {
                                                    image_demo.src = URL.createObjectURL(file)
                                                }
                                            }
                                            </script>
                                        @endsection
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal">Discard</button>
                    <button id="btn-n-add" type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
