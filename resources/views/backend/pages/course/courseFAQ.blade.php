@extends('layouts.adminMaster')
@section('content')
<div class="table-responsive rounded-2 mb-4">
    <a href="#addData" data-bs-toggle="modal" class="btn btn-secondary btn-lg mb-3">
        <i class="fs-4 ti ti-plus"></i>
        Add Course FAQ
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
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Question</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Answers</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($CourseFAQ as $key=> $item)
        <tr>
            <td>
                <span> {{$CourseFAQ->firstItem()+$key}} </span>
                
            </td>
            <td  class="text-center">
                <span>{{ $item->question}}</span>
            </td>
            <td   class="text-center">
                <span>{{$item->answer }}</span>
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
                    <a class="dropdown-item d-flex align-items-center gap-3"  onclick="return confirm('Are you wnat to delete?')"  href="{{ route('courseFAQDelete', $item->id) }}"><i class="fs-4 ti ti-trash"></i>Delete</a>
                    </li>
                </ul>
                </div>
            </td>
        </tr>
        <div class="modal" id="editData{{$item->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                  <h6 class="modal-title text-white">Edit course FAQ</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('courseFAQEdit')}}" method="post" id="addnotesmodalTitle" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <div class="modal-body">
                      <div class="notes-box">
                          <div class="notes-content">
                              <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title mt-3">
                                        <label for="question"> Questions </label>
                                        <textarea class="form-control @error('question') is-invalid @enderror" name="question" id="question" placeholder="Enter question">  {{$item->question }} </textarea>
                                        @error('question', 'insert')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                        <label for="answer"> Answers </label>
                                        <textarea class="form-control @error('answer') is-invalid @enderror" name="answer" id="answer" placeholder="Enter class_topics"> {{$item->answer }} </textarea>
                                        @error('answer', 'insert')
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
    {{ $CourseFAQ->links() }}
    <div class="modal" id="addData">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content border-0">
            <div class="modal-header bg-primary">
              <h6 class="modal-title text-white"> Add Course FAQ </h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('courseFAQPost',$courseid )}}" method="POST" id="addnotesmodalTitle" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title mt-3">
                                        <label for="question"> Questions </label>
                                        <textarea class="form-control @error('question') is-invalid @enderror" name="question" id="question" placeholder="Enter question"> </textarea>
                                        @error('question', 'insert')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="note-title mt-3">
                                        <label for="answer"> Answers </label>
                                        <textarea class="form-control @error('answer') is-invalid @enderror" name="answer" id="answer" placeholder="Enter Answers"> </textarea>
                                        @error('answer', 'insert')
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
