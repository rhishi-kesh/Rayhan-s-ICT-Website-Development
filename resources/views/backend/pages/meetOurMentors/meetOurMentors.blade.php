@extends('layouts.adminMaster')
@section('content')
<div class="table-responsive rounded-2 mb-4">
    <a href="#addData" data-bs-toggle="modal" class="btn btn-secondary btn-lg mb-3">
        <i class="fs-4 ti ti-plus"></i>
        Add new Mentors
    </a>
    <table class="table border text-nowrap customize-table mb-0 align-middle">
      <thead class="text-dark fs-4">
        <tr>
          <th><h6 class="fs-4 fw-semibold mb-0">SL</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Name</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Designation</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Image</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Thumbnail</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($MeetOurMentors as $key=> $item)
        <tr>
            <td>
                <span> {{$MeetOurMentors->firstItem()+$key}} </span>
                
            </td>
            <td  class="text-center">
                <span>{{$item->name}}</span>
            </td>
            <td   class="text-center">
                <span>{{$item->designation}}</span>
            </td>
            <td class="text-center">
                <img src="{{asset('storage/mentors/image/')}}/{{ $item->image}}" alt="" width="60" height="60">
            </td>
            <td class="text-center">
                <img src="{{asset('storage/mentors/thumbnail/')}}/{{ $item->thumbnail}}" alt="" width="60" height="60">
            </td>
            <td class="text-end">
                <div class="dropdown dropstart">
                <a href="#" class="text-muted pe-4" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots fs-5"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                    <li class="">
                    <a class="dropdown-item d-flex align-items-center gap-3" href="#editData{{$item->id}}" data-bs-toggle="modal"><i class="fs-4 ti ti-edit "></i>Edit</a>
                    </li>
                    <li>
                    <a class="dropdown-item d-flex align-items-center gap-3" href=""><i class="fs-4 ti ti-trash"></i>Delete</a>
                    </li>
                </ul>
                </div>
            </td>
        </tr>
        <div class="modal" id="editData{{$item->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                  <h6 class="modal-title text-white">Edit Success story</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('meetOurMentorsEdit')}}" method="post" id="addnotesmodalTitle" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <div class="modal-body">
                      <div class="notes-box">
                          <div class="notes-content">
                              <div class="row">
                                <div class="col-md-12 mb-3">

                                    <div class="note-title mt-3">
                                        <label for="name"> Name </label>
                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$item->name}}" placeholder="Enter Name">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                        <label for="designation"> Designation </label>
                                        <input type="text" id="designation" value="{{$item->designation}}"   class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="Enter Designation">
                                        @error('designation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                      <label for="image">Image</label>
                                      <input type="file" id="image"  value="{{$item->image}}"  class="form-control @error('image') is-invalid @enderror" name="image">
                                      <img src="{{ asset('storage/mentors/image/') }}/{{ $item->image }}" alt="" width="60" height="60">

                                      @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                      <label for="thumbnail">Thumbnail</label>
                                      <input type="file" id="thumbnail"  value="{{$item->thumbnail}}"  class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                                      <img src="{{ asset('storage/mentors/thumbnail/') }}/{{ $item->thumbnail }}" alt="" width="60" height="60">
                                      @error('thumbnail')
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
              <h6 class="modal-title text-white"> Add Mentors Details </h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('meetOurMentorsPost') }}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title mt-3">
                                        <label for="name"> Name </label>
                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Name">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                        <label for="designation"> Designation </label>
                                        <input type="text" id="designation" class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="Enter Designation">
                                        @error('designation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                      <label for="image">Image</label>
                                      <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image">
                                      @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                      <label for="thumbnail">Thumbnail</label>
                                      <input type="file" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                                      @error('thumbnail')
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
