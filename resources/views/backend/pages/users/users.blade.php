@extends('layouts.adminMaster')
@section('content')
<div class="table-responsive rounded-2 mb-4">
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
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Profile</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Name</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Email</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-center">Position</h6></th>
          <th><h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $key => $item)
        <tr>
            <td>
                <span>{{$users->firstItem()+$key}}</span>
            </td>
            <td class="text-center">
                <img src="{{ empty( $item->profile) ? asset('image.jpeg') : asset('storage/profile/'). '/'.$item->profile }}" alt="" width="60" height="60">
            </td>
            <td style="text-align: center">
                <p class="mb-0">{{ $item->name }}</p>
            </td>
            <td style="text-align: center">
                <p class="mb-0">{{ $item->email }}</p>
            </td>
            <td style="text-align: center">
                <p class="mb-0">{{ $item->position }}</p>
            </td>
            <td class="text-end">
                <div class="dropdown dropstart">
                <a href="#" class="text-muted pe-4" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots fs-5"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-3" onclick="return confirm('Are you want to delete?')"  href="{{ route('usersDelete', $item->id) }}"><i class="fs-4 ti ti-trash"></i>Delete</a>
                        
                    </li>
                </ul>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td class="text-center text-danger" colspan="20">NO Data Found</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
