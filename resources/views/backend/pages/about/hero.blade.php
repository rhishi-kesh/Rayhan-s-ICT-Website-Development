@extends('layouts.adminMaster')
@section('content')
    <div class="card">
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert bg-success text-white alert-dismissible border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ Session::get('success') }}
                </div>
            @endif
            <h4 class="mb-3 text-uppercase">Hero</h4>
            <form action="{{ route('companyInformationPost') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" value="{{ $companyInformation->id }}" name="id">

                    <div class="col-md-4 mb-3">
                        <label for="number" class="form-label">RICT Number</label>
                        <input type="number" value="{{ $companyInformation->number }}" class="form-control form-control-lg rounded-1 @error('number') is-invalid @enderror" name="number" id="number" placeholder="Number">
                        @error('number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="email" class="form-label">RICT E-mail</label>
                        <input type="email" value="{{ $companyInformation->gmail }}" class="form-control form-control-lg rounded-1 @error('email') is-invalid @enderror" name="email" id="email" placeholder="E-mail">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="eTin" class="form-label">E-TIN NO</label>
                        <input type="text" value="{{ $companyInformation->eTinNo }}" class="form-control form-control-lg rounded-1 @error('eTin') is-invalid @enderror" name="eTin" id="eTin" placeholder="E-TIN No">
                        @error('eTin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="tradeLicence" class="form-label">Trade LICENCE NO</label>
                        <input type="text" value="{{ $companyInformation->tradeLienceNo }}" class="form-control form-control-lg rounded-1 @error('tradeLicence') is-invalid @enderror" name="tradeLicence" id="tradeLicence" placeholder="Trade LICENCE NO">
                        @error('tradeLicence')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="url" value="{{ $companyInformation->facebook }}" class="form-control form-control-lg rounded-1 @error('facebook') is-invalid @enderror" name="facebook" id="facebook" placeholder="Facebook Link">
                        @error('facebook')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="instragram" class="form-label">Instragram</label>
                        <input type="url" value="{{ $companyInformation->instragram }}" class="form-control form-control-lg rounded-1 @error('instragram') is-invalid @enderror" name="instragram" id="instragram" placeholder="Instragram Link">
                        @error('instragram')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <input type="url" value="{{ $companyInformation->linkedin }}" class="form-control form-control-lg rounded-1 @error('linkedin') is-invalid @enderror" name="linkedin" id="linkedin" placeholder="Linkedin Link">
                        @error('linkedin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="url" value="{{ $companyInformation->youtube }}" class="form-control form-control-lg rounded-1 @error('youtube') is-invalid @enderror" name="youtube" id="youtube" placeholder="Youtube Link">
                        @error('youtube')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="locationText" class="form-label">Location Text</label>
                        <input type="text" value="{{ $companyInformation->locationText }}" class="form-control form-control-lg rounded-1 @error('locationText') is-invalid @enderror" name="locationText" id="locationText" placeholder="Location Text">
                        @error('locationText')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="locationLink" class="form-label">Location Link</label>
                        <input type="url" value="{{ $companyInformation->locationLink }}" class="form-control form-control-lg rounded-1 @error('locationLink') is-invalid @enderror" name="locationLink" id="locationLink" placeholder="Location Link">
                        @error('locationLink')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="openClose" class="form-label">Open Close Time</label>
                        <input type="text" value="{{ $companyInformation->openClose }}" class="form-control form-control-lg rounded-1 @error('openClose') is-invalid @enderror" name="openClose" id="openClose" placeholder="Open Close Time">
                        @error('openClose')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="footerAbout" class="form-label">Footer About</label>
                        <textarea class="form-control form-control-lg rounded-1 @error('footerAbout') is-invalid @enderror" rows="6" name="footerAbout" id="footerAbout">{{ $companyInformation->footerAbout }}
                        </textarea>
                        @error('footerAbout')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control form-control-lg rounded-1 @error('logo') is-invalid @enderror" name="logo" id="logo">
                        @error('logo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <img src="{{ asset('storage/companyInformation/'. $companyInformation->logo) }}" alt="" width="180">
                    </div>
                    <div class="col-12">
                        <div class="d-md-flex align-items-center mt-3">
                            <div class="ms-auto mt-3 mt-md-0">
                                <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-send me-2 fs-4"></i>
                                        Update
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
