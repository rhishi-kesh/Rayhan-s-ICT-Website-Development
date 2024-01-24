@extends('layouts.adminMaster')
@section('content')
<div class="table-responsive rounded-2 mb-4">
    <a href="#addData" data-bs-toggle="modal" class="btn btn-secondary btn-lg mb-3">
        <i class="fs-4 ti ti-plus"></i>
        Add new
    </a>
    <table class="table border text-nowrap customize-table mb-0 align-middle">
      <thead class="text-dark fs-4">
        <tr>
          <th><h6 class="fs-4 fw-semibold mb-0">SL</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Thumbnail</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6></th>
        </tr>
      </thead>
      <tbody>
        {{-- @forelse ($workspace as $key => $item) --}}
        <tr>
            <td>
                <span>1</span>
            </td>
            <td class="text-center">
                <img src="" alt="" width="60" height="60">
            </td>
            <td class="text-end">
                <div class="dropdown dropstart">
                <a href="#" class="text-muted pe-4" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots fs-5"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                    <li>
                    <a class="dropdown-item d-flex align-items-center gap-3" href="#editData" data-bs-toggle="modal"><i class="fs-4 ti ti-edit"></i>Edit</a>
                    </li>
                    <li>
                    <a class="dropdown-item d-flex align-items-center gap-3" href=""><i class="fs-4 ti ti-trash"></i>Delete</a>
                    </li>
                </ul>
                </div>
            </td>
        </tr>
        <div class="modal" id="editData">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                  <h6 class="modal-title text-white">Edit WorkSpace Image</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <div class="row">
                                    <input type="hidden" id="id" name="id" value="">
                                    <div class="col-md-12 mb-3">
                                        <div class="note-title">
                                        <label for="image">Image</label>
                                        <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image">
                                        <img src="" alt="" width="60" height="60" class="mt-2">
                                        @error('image')
                                            <div class="alert alert-danger"></div>
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
        {{-- @empty --}}
        {{-- <tr>
            <td class="text-center text-danger" colspan="20">NO Data Found</td>
        </tr> --}}
        {{-- @endforelse --}}
      </tbody>
    </table>
    <div class="modal" id="addData">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content border-0">
            <div class="modal-header bg-primary">
              <h6 class="modal-title text-white">Add Success Story</h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('successStoryPost') }}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title">
                                      <label for="thumbnail">Thumbnail</label>
                                      <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image">
                                      @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                      <label for="image">Video Link</label>
                                      <input type="url" id="video_link" class="form-control @error('video_link') is-invalid @enderror" name="video_link">
                                      @error('video_link')
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
