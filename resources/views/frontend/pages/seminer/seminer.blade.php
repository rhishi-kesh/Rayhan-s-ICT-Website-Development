@extends('layouts.frontendMaster')
@section('title','Seminer')
@section('content')
    <section class="seminer-header py-5" style="background: url('{{ asset('frontend/img/seminer.jpg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center section-head">
                    <h2 class="fs-1 mb-3 text-white">Schedule of free Seminars and Webinars</h2>
                    <p class="mt-1 lead px-0 px-lg-5 text-white">Explore our professional development series featuring a schedule of insightful and complimentary seminars and webinars. Join us to broaden your knowledge and stay ahead in your field with these engaging learning opportunities.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="seminer py-5">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <h3 class="d-inline"><i class="fa-solid fa-gift fa-lg" style="color: #ff6127;"></i> <span class="ms-2">Upcoming Seminars</span></h3>
                    <hr class="mb-0">
                </div>
            </div>
            <div class="row">
                @forelse ($seminer as $item)
                    <div class="col-12 col-md-6 col-lg-4 mt-4">
                        <div class="card">
                            <a href="#seminerJoin{{ $item->id }}" data-bs-toggle="modal" class="img">
                                <img src="{{  asset('storage/seminar/'. $item->thumbnail)  }}" style="width: 100%;max-height: 200px; object-fit: cover;" alt="" class="img-fluid">
                            </a>
                            <div class="card-body pb-2">
                                <h5>
                                    <a href="#seminerJoin{{ $item->id }}" data-bs-toggle="modal">{{ $item->title }}</a>
                                </h5>
                                <p class="mt-2">
                                    Date: {{ $item->date }} <br> Time: {{ $item->time }}
                                </p>
                                <p>
                                    <a href="#seminerJoin{{ $item->id }}" data-bs-toggle="modal" class="join-btn"><i class="fa-solid fa-graduation-cap"></i> Join</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="seminerJoin{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 text-uppercase pe-3" id="exampleModalLabel">Join {{ $item->title }}</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="" class="text-start">
                                    <input type="hidden" value="{{ $item->id }}" name="seminer_id">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name">
                                        <label for="name">Enter Name</label>
                                    </div>
                                    <div class="form-floating mt-3">
                                        <input type="email" class="form-control" id="email" placeholder="Enter E-mail">
                                        <label for="email">Enter Email</label>
                                    </div>
                                    <div class="form-floating mt-3">
                                        <input type="number" class="form-control" id="number" placeholder="Enter Number">
                                        <label for="number">Enter Number</label>
                                    </div>
                                    <div class="form-floating mt-3">
                                        <input type="text" class="form-control" id="text" placeholder="Enter Address">
                                        <label for="text">Enter Address</label>
                                    </div>
                                    <div class="mt-3">
                                        <input type="submit" class="form-control form-control-lg seminerBtn" value="SUBMIT" name="submit">
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                @empty
                    <div class="col">
                        <p class="text-danger">Seminers Not Available</p>
                    </div>
                @endforelse
            </div>
            <!-- Seminers end -->
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="d-inline"><i class="fa-solid fa-gift fa-lg" style="color: #ff6127;"></i> <span class="ms-2">Upcoming Webinars</span></h3>
                    <hr class="mb-0">
                </div>
            </div>
            <div class="row">
                @forelse ($wabinars as $item)
                    <div class="col-12 col-md-6 col-lg-4 mt-4">
                        <div class="card">
                            <a href="#wabinars{{ $item->id }}" data-bs-toggle="modal" class="img">
                                <img src="{{  asset('storage/webinar/'. $item->thumbnail)  }}" style="width: 100%;max-height: 200px; object-fit: cover;" alt="" class="img-fluid">
                            </a>
                            <div class="card-body pb-2">
                                <h5>
                                    <a href="#wabinars{{ $item->id }}" data-bs-toggle="modal">{{ $item->title }}</a>
                                </h5>
                                <p class="mt-2">
                                    Date: {{ $item->date }} <br> Time: {{ $item->time }}
                                </p>
                                <p>
                                    <a href="#seminerJoin{{ $item->id }}" data-bs-toggle="modal" class="join-btn"><i class="fa-solid fa-graduation-cap"></i> Join</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="wabinars{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 text-uppercase pe-3" id="exampleModalLabel">Join {{ $item->title }}</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="" class="text-start">
                                  <div class="form-floating">
                                      <input type="text" class="form-control" id="name" placeholder="Enter Name">
                                      <label for="name">Enter Name</label>
                                  </div>
                                  <div class="form-floating mt-3">
                                      <input type="email" class="form-control" id="email" placeholder="Enter E-mail">
                                      <label for="email">Enter Email</label>
                                  </div>
                                  <div class="form-floating mt-3">
                                      <input type="number" class="form-control" id="number" placeholder="Enter Number">
                                      <label for="number">Enter Number</label>
                                  </div>
                                  <div class="form-floating mt-3">
                                    <input type="text" class="form-control" id="text" placeholder="Enter Address">
                                    <label for="text">Enter Address</label>
                                </div>
                                  <div class="mt-3">
                                      <input type="submit" class="form-control form-control-lg seminerBtn" value="SUBMIT" name="submit">
                                  </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                @empty
                    <div class="col">
                        <p class="text-danger">Webinars Not Available</p>
                    </div>
                @endforelse
            </div>
            <!-- Webinars end -->
        </div>
    </section>
    <!-- seminer section end -->
@endsection
