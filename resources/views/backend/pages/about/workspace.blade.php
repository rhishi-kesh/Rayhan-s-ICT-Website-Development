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
      <thead class="text-dark fs-4">
        <tr>
          <th><h6 class="fs-4 fw-semibold mb-0">SL</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Image</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($workspace as $key => $item)
        <tr>
            <td>
                <span>{{ $workspace->firstItem()+$key }}</span>
            </td>
            <td class="text-center">
                <img src="{{ asset('storage/WorkSpace/') }}/{{ $item->image }}" alt="" width="60" height="60">
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
                    <a class="dropdown-item d-flex align-items-center gap-3" href="{{ route('workspaceDelete',$item->id) }}"><i class="fs-4 ti ti-trash"></i>Delete</a>
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
                <form action="{{ route('workspaceEdit') }}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <div class="row">
                                    <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                                    <div class="col-md-12 mb-3">
                                        <div class="note-title">
                                        <label for="image">Image</label>
                                        <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image">
                                        <img src="{{ asset('storage/WorkSpace/') }}/{{ $item->image }}" alt="" width="60" height="60" class="mt-2">
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
    {{ $workspace->links() }}
    <div class="modal" id="addData">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content border-0">
            <div class="modal-header bg-primary">
              <h6 class="modal-title text-white">Add WorkSpace Image</h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('workspacePost') }}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title">
                                    <label for="image_demo">Image</label>
                                    <input type="file" id="workshop_image" class="form-control @error('image') is-invalid @enderror" name="image">
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
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
