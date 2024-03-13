@extends('layouts.adminMaster')
@section('content')
    <div class="table-responsive rounded-2 mb-4">
        @if (Session::has('success'))
            <div id="successMessage" class="alert bg-success text-white alert-dismissible border-0 fade show"
                role="alert">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div id="errorMessage" class="alert bg-danger text-white alert-dismissible border-0 fade show"
                role="alert">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
                {{ Session::get('error') }}
            </div>
        @endif
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach ($webinar as $key => $data)
                            <li class="nav-item ms-2 mt-2">
                                <a class="bg-light nav-link {{ $key == 0 ? ' active' : ''  }}" data-bs-toggle="tab" href="#data{{ $data->id }}" role="tab">
                                    <span>{{ $data->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content mt-3">
                        @foreach ($webinar as $key => $data)
                            <div class="tab-pane {{ $key == 0 ? ' active' : ''  }}" id="data{{ $data->id }}" role="tabpanel">
                                <table class="table border text-nowrap customize-table mb-0 align-middle">
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
                                                <h6 class="fs-4 fw-semibold mb-0 text-center pe-3">Address</h6>
                                            </th>
                                            <th>
                                                <h6 class="fs-4 fw-semibold mb-0 text-center pe-3">Action</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($WebinarRegister->where('webiner_id', $data->id) as $key=> $item)
                                            <tr>
                                                <td>
                                                    <span> {{ $item->id }} </span>
                                                </td>
                                                <td class="text-center">
                                                    <p> <span> {{ $item->name }} </p>
                                                </td>
                                                <td class="text-center">
                                                    <p> <span> {{ $item->email }} </p>
                                                </td>
                                                <td class="text-center">
                                                    <p> <span> {{ $item->number }} </p>
                                                </td>
                                                <td class="text-center">
                                                    <p> <span> {{ $item->address }} </p>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropstart text-center">
                                                        <a href="mailto:{{ $item->email }}" class="text-muted pe-2" aria-expanded="false">
                                                            <i class="fas fa-envelope text-info"></i>
                                                        </a>
                                                        <a href="{{ route('webinarDataDelete', $item->id) }}" class="text-muted pe-2"
                                                            aria-expanded="false">
                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                        </a>
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
                        @endforeach
                    </div>
                </div>
            </div>
        {{ $WebinarRegister->withQueryString()->links() }}
        <script type="text/javascript">
            window.setTimeout("document.getElementById('successMessage').style.display='none';", 2000);
            window.setTimeout("document.getElementById('errorMessage').style.display='none';", 2000);
        </script>
    @endsection
