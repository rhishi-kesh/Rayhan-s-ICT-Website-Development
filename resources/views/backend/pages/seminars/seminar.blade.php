@extends('layouts.adminMaster')
@section('content')
<div class="table-responsive rounded-2 mb-4">
    <a href="#addData" data-bs-toggle="modal" class="btn btn-secondary btn-lg mb-3">
        <i class="fs-4 ti ti-plus"></i>
        Add New Seminar
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
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Title</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Thumbnail</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Date</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Time</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($seminars as $key => $item)
        <tr>
            <td>
                <span>{{$seminars->firstItem()+$key}}</span>
            </td>
            <td  class="text-center">
                <span  >{{$item->title}}</span>
            </td>
            <td class="text-center">
                <img src="{{ asset('storage/seminar/') }}/{{ $item->thumbnail }}" alt="" width="100" height="60">
            </td>
            <td  class="text-center">
                <span >{{$item->date}}</span>
            </td>
            <td  class="text-center">
                <span>{{$item->time}}</span>
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
                    <a class="dropdown-item d-flex align-items-center gap-3" onclick="return confirm('Are you wnat to delete?')"  href="{{ route('seminarDelete', $item->id) }}"><i class="fs-4 ti ti-trash"></i>Delete</a>
                    </li>
                </ul>
                </div>
            </td>
        </tr>
        <div class="modal" id="editData{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                  <h6 class="modal-title text-white">Edit Seminar</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('seminarEdit')}}" method="post" id="addnotesmodalTitle" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  <div class="modal-body">
                      <div class="notes-box">
                          <div class="notes-content">
                              <div class="row">
                                  <div class="col-md-12 mb-3">
                                     <div class="note-title mt-3">
                                        <label for="title">Title</label>
                                        <input type="title"  placeholder="Enter title" value="{{ $item->title }}" id="title" class="form-control @error('title') is-invalid @enderror" name="title">
                                        @error('title' , 'update')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                      </div>
                                      <div class="note-title">
                                        <label for="thumbnailImage{{ $item->id }}">Thumbnail</label>
                                        <input type="file" id="thumbnailImage{{ $item->id }}" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                                        @error('thumbnail', 'update')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <img id="thumbnailImage_p{{ $item->id }}" src="{{ asset('storage/seminar/') }}/{{ $item->thumbnail }}" alt="" id="thumbnail_p" width="60" height="60">
                                        <script>
                                            thumbnailImage{{ $item->id }}.onchange = evt => {
                                            const[file] = thumbnailImage{{ $item->id }}.files
                                            if(file){
                                              thumbnailImage_p{{ $item->id }}.src = URL.createObjectURL(file)
                                              }
                                            }
                                        </script>
                                      </div>
                                      <div class="note-title mt-3">
                                        <label for="date">Date</label>
                                        <input type="date" value="{{ $item->date }}" id="date" class="form-control @error('date') is-invalid @enderror" name="date">
                                        @error('date', 'update')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                      </div>
                                      <div class="note-title mt-3">
                                        <label for="time">Time</label>
                                        <input type="text" placeholder="Enter Time" value="{{ $item->time }}" id="time" class="form-control @error('time') is-invalid @enderror" name="time">
                                        @error('time', 'update')
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
    <div class="modal" id="addData">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content border-0">
            <div class="modal-header bg-primary">
              <h6 class="modal-title text-white">Add Seminar</h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('seminarPost') }}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title mt-3">
                                       <label for="image" >Title</label>
                                       <input type="title" placeholder="Enter title" id="title" class="form-control @error('title') is-invalid @enderror" name="title">
                                       @error('title')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                     </div>
                                     <div class="note-title">
                                       <label for="thumbnail">Thumbnail</label>
                                       <input type="file" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                                       <img src="#" id="thumbnail_p" alt="Preview image" width="60" height="60">
                                       @error('thumbnail')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                     </div>
                                     <div class="note-title mt-3">
                                       <label for="date">Date</label>
                                       <input type="date"  id="date" class="form-control @error('date') is-invalid @enderror" name="date">
                                       @error('date')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                     </div>
                                     <div class="note-title mt-3">
                                       <label for="time">Time</label>
                                       <input type="text" placeholder="Enter Time" id="time" class="form-control @error('time') is-invalid @enderror" name="time">
                                       @error('time')
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
  @section('jss')
        <script>
            thumbnail.onchange = evt => {
            const [file] = thumbnail.files
            if (file) {
                thumbnail_p.src = URL.createObjectURL(file)
            }
        }
        </script>
    @endsection
@endsection
