@extends('layouts.adminMaster')
@section('content')
<div class="table-responsive rounded-2 mb-4">
    <a href="#addData" data-bs-toggle="modal" class="btn btn-secondary btn-lg mb-3">
        <i class="fs-4 ti ti-plus"></i>
        Add Course Module
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
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Class No.</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Class Topics</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($courseModule as $key=> $item)
        <tr>
            <td>
                <span> {{$courseModule->firstItem()+$key}} </span>
                
            </td>
            <td  class="text-center">
                <span>{{ $item->class_no}}</span>
            </td>
            <td   class="text-center">
                <span>{{$item->class_topics }}</span>
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
                    <a class="dropdown-item d-flex align-items-center gap-3"  onclick="return confirm('Are you wnat to delete?')"  href="{{ route('courseModuleDelete', $item->id) }}"><i class="fs-4 ti ti-trash"></i>Delete</a>
                    </li>
                </ul>
                </div>
            </td>
        </tr>
        <div class="modal" id="editData{{$item->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                  <h6 class="modal-title text-white">Edit Course Module</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('courseModuleEdit')}}" method="post" id="addnotesmodalTitle" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <div class="modal-body">
                      <div class="notes-box">
                          <div class="notes-content">
                              <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title mt-3">
                                        <label for="class_no">Class No.</label>
                                        <input type="text" id="class_no" value="{{$item->class_no}}" class="form-control @error('class_no') is-invalid @enderror" name="class_no" placeholder="Enter class_no">
                                        @error('class_no', 'insert')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                        <label for="class_topics"> Class Topics </label>
                                        <textarea class="form-control @error('class_topics') is-invalid @enderror" name="class_topics" id="class_topics" placeholder="Enter class_topics">
                                        {{$item->class_topics }} </textarea>
                                        @error('class_topics', 'insert')
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
    {{ $courseModule->links() }}
    <div class="modal" id="addData">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content border-0">
            <div class="modal-header bg-primary">
              <h6 class="modal-title text-white"> Add Course Module </h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('courseModulePost',$courseid )}}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title mt-3">
                                        <label for="class_no">Class No.</label>
                                        <input type="text" id="class_no" class="form-control @error('class_no') is-invalid @enderror" name="class_no" placeholder="Enter class_no">
                                        @error('class_no', 'insert')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                        <label for="class_topics"> Class Topics </label>
                                        <textarea class="form-control @error('class_topics') is-invalid @enderror" name="class_topics" id="class_topics_add" placeholder="Enter class_topics"></textarea>
                                        @error('class_topics', 'insert')
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
        ClassicEditor
            .create( document.querySelector( '#class_topics' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#class_topics_add' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    @endsection
    <script type="text/javascript">
        window.setTimeout("document.getElementById('successMessage').style.display='none';", 2000);
        window.setTimeout("document.getElementById('errorMessage').style.display='none';", 2000);
    </script>
@endsection
