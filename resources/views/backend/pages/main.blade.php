@extends('layouts.adminMaster')
@section('content')
    <div class="container">
        <div class="table-responsive rounded-2 mb-4">
            <h4 class="text-uppercase mb-3">Admission&nbsp; List</h4>
            <div class="d-flex justify-content-between align-items-center mb-9">
                <form class="position-relative" action="{{ route('AdmisionSearch') }}" method="GET">
                    <input type="search" name="searchA" class="form-control search-chat py-2 ps-5" id="text-srh"
                        placeholder="Search Name Or Email">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                @if (Session::has('success'))
                    <div class="alert bg-success text-white alert-dismissible border-0 fade show" role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert bg-danger text-white alert-dismissible border-0 fade show" role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        {{ Session::get('error') }}
                    </div>
                @endif
                <thead class="text-dark fs-4">
                    <tr>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Id</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0 text-center">Name</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0 text-center">Email</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0 text-center pe-3">Number</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0 text-end pe-3">Action</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admission as $key => $item)
                        <tr>
                            <td>
                                <span> {{ $admission->firstItem()+$key}} </span>
                            </td>
                            <td class="text-center ">
                                <p> <span> {{ $item->name }} </p>
                            </td>
                            <td class="text-center">
                                <p> <span> {{ $item->email }} </p>
                            </td>
                            <td class="text-center">
                                <p> <span> {{ $item->number }} </p>
                            </td>
                            <td class="text-end">
                                <div class="dropdown dropstart">
                                    <a href="#addData{{ $item->id }}" data-bs-toggle="modal" class="text-muted pe-2"
                                        aria-expanded="false">
                                        <i class="fas fa-eye text-success"></i>
                                    </a>
                                    <a href="mailto:{{ $item->email }}" class="text-muted pe-2" aria-expanded="false">
                                        <i class="fas fa-envelope text-info"></i>
                                    </a>

                                    <a href="{{ route('admissionDelete', $item->id) }}" class="text-muted pe-2"
                                        aria-expanded="false">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="addData{{ $item->id }}">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content border-0">
                                    <form action="{{ route('dashboard') }}" method="get" id="addnotesmodalTitle"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="notes-box">
                                                <div class="notes-content">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <div class="note-title mt-3">
                                                                <h2 class="mb-0"><b>Name: </b>{{ $item->name }}</h2>
                                                                {{-- <h4 class="m-0"><b>User ID: </b>{{ $item->user_id }}</h4> --}}
                                                                {{-- <h6><b>Password: </b>{{ decrypt($item->password) }}</h6> --}}
                                                                <span>
                                                                    <b>Email: </b>{{ $item->email }} <br>
                                                                    <b>Number: </b> {{ $item->number }}
                                                                </span>
                                                                <p class="mb-0"><b>Subject: </b>{{ $item->subject }}</p>
                                                                <p><b>Message: </b>{{ $item->massage }}</p>
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
        </tbody>
    </table>
    {{ $admission->withQueryString()->links() }}
@endsection
