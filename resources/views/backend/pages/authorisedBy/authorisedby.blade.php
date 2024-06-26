@extends('layouts.adminMaster')
@section('content')
<div class="table-responsive rounded-2 mb-4">
    <a href="#addData" data-bs-toggle="modal" class="btn btn-secondary btn-lg mb-3">
        <i class="fs-4 ti ti-plus"></i>
        Add Authorised image
    </a>
    <table class="table border text-nowrap customize-table mb-0 align-middle">
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
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">image</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($authorised as $key => $item)
        <tr>
            <td>
                <span>{{$authorised->firstItem()+$key}}</span>
            </td>
            <td class="text-center">
                <img src="{{ asset('storage/authorisedby/') }}/{{ $item->image }}" alt="" width="60" height="60">
            </td>
            <td class="text-end">
                <div class="dropdown dropstart">
                <a href="#" class="text-muted pe-4" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots fs-5"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                    <li class="">
                    <a class="dropdown-item d-flex align-items-center gap-3" href="#editData{{ $item->id }}" data-bs-toggle="modal"><i class="fs-4 ti ti-edit "></i>Edit</a>
                    </li>
                    <li>
                    <a class="dropdown-item d-flex align-items-center gap-3" onclick="return confirm('Are you wnat to delete?')"  href="{{ route('authorisedDelete', $item->id) }}"><i class="fs-4 ti ti-trash"></i>Delete</a>
                    </li>
                </ul>
                </div>
            </td>
        </tr>
        <div class="modal" id="editData{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                  <h6 class="modal-title text-white">Edit Authorised Image</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('authorisedEdit')}}" method="post" id="addnotesmodalTitle" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  <div class="modal-body">
                      <div class="notes-box">
                          <div class="notes-content">
                              <div class="row">
                                  <div class="col-md-12 mb-3">

                                    <div class="note-title">
                                      <label for="authorisedImage{{ $item->id }}">Image</label>
                                      <input type="file" id="authorisedImage{{ $item->id }}" class="form-control @error('image') is-invalid @enderror" name="image">
                                      @error('image','update')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                      <img src="{{ asset('storage/authorisedby/') }}/{{ $item->image }}" alt="" width="60" height="60" class="mt-2" id="authorisedImage_p{{ $item->id }}">
                                      <script>
                                          authorisedImage{{ $item->id }}.onchange = evt => {
                                          const [file] = authorisedImage{{ $item->id }}.files
                                          if (file) {
                                            authorisedImage_p{{ $item->id }}.src = URL.createObjectURL(file)
                                          }
                                      }
                                      </script>
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
    <div class="modal" id="addData">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content border-0">
            <div class="modal-header bg-primary">
              <h6 class="modal-title text-white">Add Authorised Image</h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('authorisedPost') }}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title">
                                      <label for="authoriseImage">image</label>
                                      <input type="file" id="authoriseImage" class="form-control @error('image') is-invalid @enderror" name="image">
                                      @error('image', 'insert')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                      <img src="#" width="120px" id="authorisedImage_p" alt="Image preview">
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
  @section('jss')
    <script>
      authoriseImage.onchange = evt =>{
        const [file] = authoriseImage.files
        if(file){
          authorisedImage_p.src = URL.createObjectURL(file)
        }
      }
    </script>
@endsection
@endsection
