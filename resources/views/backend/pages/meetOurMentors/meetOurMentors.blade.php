@extends('layouts.adminMaster')
@section('content')
<div class="table-responsive rounded-2 mb-4">
    <a href="#addData" data-bs-toggle="modal" class="btn btn-secondary btn-lg mb-3">
        <i class="fs-4 ti ti-plus"></i>
        Add new Mentors
    </a>
    <table class="table border text-nowrap customize-table mb-0 align-middle">
      @if(Session::has('success'))
        <div id="successMessage" class="alert bg-success text-white alert-dismissible border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ Session::get('success') }}
        </div>
      @endif
      @if(Session::has('error'))
        <div id="errorMessage" class="alert bg-danger text-white alert-dismissible border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ Session::get('error') }}
        </div>
      @endif
      <thead class="text-dark fs-4">
        <tr>
          <th><h6 class="fs-4 fw-semibold mb-0">SL</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Name</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Designation</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Description</h6></th>
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
            <td   class="text-center">
                <span>{{$item->description}}</span>
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
                    <a class="dropdown-item d-flex align-items-center gap-3"  onclick="return confirm('Are you wnat to delete?')"  href="{{ route('meetOurMentorsDelete', $item->id) }}"><i class="fs-4 ti ti-trash"></i>Delete</a>
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
                                        @error('name', 'update')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                        <label for="designation"> Designation </label>
                                        <input type="text" id="designation" value="{{$item->designation}}"   class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="Enter Designation">
                                        @error('designation', 'update')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                      <label for="description"> Description </label>
                                      <input type="text" id="description"  value="{{$item->description}}"  class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter Description">
                                      @error('description', 'insert')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                    <div class="note-title mt-3">
                                      <label for="imageImage{{$item->id}}">Image</label>
                                      <input type="file" id="imageImage{{$item->id}}" class="form-control @error('image') is-invalid @enderror" name="image">
                                      @error('image', 'update')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                      <img id="imageImage_p{{$item->id}}" src="{{ asset('storage/mentors/image/') }}/{{ $item->image }}" alt="Image preview" width="60" height="60">
                                       <script>
                                        imageImage{{ $item->id }}.onchange = evt => {
                                        const [file] = imageImage{{ $item->id }}.files
                                        if (file) {
                                          imageImage_p{{ $item->id }}.src = URL.createObjectURL(file)
                                        }
                                    }
                                    </script>
                                    </div>
                                    <div class="note-title mt-3">
                                      <label for="thumbnailImage{{ $item->id }}">Thumbnail</label>
                                      <input type="file" id="thumbnailImage{{ $item->id }}" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                                      @error('thumbnail', 'update')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                      <img id="thumbnailImage_p{{ $item->id }}" src="{{ asset('storage/mentors/thumbnail/') }}/{{ $item->thumbnail }}" alt="Image preview" width="60" height="60">
                                      <script>
                                        thumbnailImage{{ $item->id }}.onchange = evt => {
                                        const [file] = thumbnailImage{{ $item->id }}.files
                                        if (file) {
                                          thumbnailImage_p{{ $item->id }}.src = URL.createObjectURL(file)
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
                                        @error('name', 'insert')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                        <label for="designation"> Designation </label>
                                        <input type="text" id="designation" class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="Enter Designation">
                                        @error('designation', 'insert')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                        <label for="description"> Description </label>
                                        <input type="text" id="description"  value="{{$item->description}}"  class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter Description">
                                        @error('description', 'insert')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                      <label for="imagei">Image</label>
                                      <input type="file" id="imagei" class="form-control @error('image') is-invalid @enderror" name="image">
                                      <img src="#" id="image_p" width="60" height="60" alt="Image Preview">
                                      @error('image', 'insert')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                      <label for="thumbnaili">Thumbnail</label>
                                      <input type="file" id="thumbnaili" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                                      @error('thumbnail', 'insert')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                      <img src="#" id="thumbnail_p" width="60" height="60" alt="Image Preview">
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
      imagei.onchange = evt => {
      const [file] = imagei.files
      if (file) {
        image_p.src = URL.createObjectURL(file)
      }
  }

  thumbnaili.onchange = evt => {
      const [file] = thumbnaili.files
      if (file) {
        thumbnail_p.src = URL.createObjectURL(file)
      }
  }
  </script>
@endsection
<script type="text/javascript">
  window.setTimeout("document.getElementById('successMessage').style.display='none';", 2000);
  window.setTimeout("document.getElementById('errorMessage').style.display='none';", 2000);
</script>
@endsection
