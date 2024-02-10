@extends('layouts.adminMaster')
@section('content')

<div class="owl-carousel counter-carousel owl-theme">
  <div class="item">
    <div class="card border-0 zoom-in bg-light-primary shadow-none">
      <div class="card-body">
        <div class="text-center">
          <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-user-male.svg" width="20" height="20"  alt="" />
          <p class="fw-semibold fs-3 text-primary mb-1"> Employees </p>
          <h5 class="fw-semibold text-primary mb-0">96</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="card border-0 zoom-in bg-light-warning shadow-none">
      <div class="card-body">
        <div class="text-center">
          <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-briefcase.svg" width="20" height="20"  alt="" />
          <p class="fw-semibold fs-3 text-warning mb-1">Clients</p>
          <h5 class="fw-semibold text-warning mb-0">3,650</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="card border-0 zoom-in bg-light-info shadow-none">
      <div class="card-body">
        <div class="text-center">
          <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-mailbox.svg" width="20" height="20"  alt="" />
          <p class="fw-semibold fs-3 text-info mb-1">Projects</p>
          <h5 class="fw-semibold text-info mb-0">356</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="card border-0 zoom-in bg-light-danger shadow-none">
      <div class="card-body">
        <div class="text-center">
          <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-favorites.svg" width="20" height="20"  alt="" />
          <p class="fw-semibold fs-3 text-danger mb-1">Events</p>
          <h5 class="fw-semibold text-danger mb-0">696</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="card border-0 zoom-in bg-light-success shadow-none">
      <div class="card-body">
        <div class="text-center">
          <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-speech-bubble.svg" width="20" height="20"  alt="" />
          <p class="fw-semibold fs-3 text-success mb-1">Payroll</p>
          <h5 class="fw-semibold text-success mb-0">$96k</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="card border-0 zoom-in bg-light-info shadow-none">
      <div class="card-body">
        <div class="text-center">
          <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-connect.svg" width="20" height="20"  alt="" />
          <p class="fw-semibold fs-3 text-info mb-1">Reports</p>
          <h5 class="fw-semibold text-info mb-0">59</h5>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
{{-- Admission part --}}

<div class="container">
<div class="table-responsive rounded-2 mb-4">
 <h4 class="text-success">Admission List</h4>
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
    <th><h6 class="fs-4 fw-semibold mb-0">Id</h6></th>
    <th><h6 class="fs-4 fw-semibold mb-0 text-center">Name</h6></th>
    <th><h6 class="fs-4 fw-semibold mb-0 text-center">Email</h6></th>
    <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Number</h6></th>
    <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Subject</h6></th>
    <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Message</h6></th>
    <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6></th>
  </tr>
</thead>
<tbody>
  @forelse ($admission as $key => $item)
      
  <tr >
      <td >
          <span> {{ $item->id}} </span>
      </td>
      <td  class="text-center ">
        <p> <span> {{$item->name}} </p>
      </td>
      <td  class="text-center">
        <p> <span> {{$item->email}} </p>
      </td>
      <td  class="text-center">
        <p> <span> {{$item->number}} </p>
      </td>
      <td  class="text-center">
        <p> <span> {{$item->subject}} </p>
      </td>
      <td  class="text-center">
          <p> <span> {{$item->massage}} </p>
      </td>
      <td class="text-end">
          <div class="dropdown dropstart">
            <a href="#addData{{$item->id}}" data-bs-toggle="modal" class="text-muted pe-2" aria-expanded="false">
              <i class="fas fa-eye" style="color:green"></i>
            </a>
            <a href="mailto:{{$item->email}}" class="text-muted pe-2" aria-expanded="false">
              <i class="fas fa-envelope"></i>
            </a>
            
            <a href="{{ route('admissionDelete', $item->id ) }}" class="text-muted pe-2" aria-expanded="false">
              <i class="fas fa-trash-alt"></i>
            </a>
          </div>
      </td>
  </tr>
   {{--Admission Eye modal --}}
   <div class="modal" id="addData{{$item->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content border-0">
        <form action="{{ route('dashboard') }}" method="get" id="addnotesmodalTitle" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="note-title mt-3">
                                  <h2>{{$item->name}}</h2>
                                  <span>{{$item->email}} | {{$item->number}}</span>
                                  <p>{{$item->massage}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">Discard</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @empty
      <tr>
        <td class="text-center text-danger" colspan="20">NO Data Found</td>
      </tr>
  @endforelse
 
</div>
</div>
@endsection