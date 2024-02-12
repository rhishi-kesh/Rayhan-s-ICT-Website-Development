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
                    <div class="modal fade" id="seminerJoin{{ $item->id }}" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 text-uppercase pe-3" id="exampleModalLabel">Join {{ $item->title }}</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('seminerRegistationPost') }}" method="post" class="text-start SeminerForm" id="SeminerForm{{ $item->id }}">
                                    @csrf
                                    <input type="hidden" value="{{ $item->title }}" name="seminer_id">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                                        <label for="name">Enter Name</label>
                                        <span class="text-danger error-text name_error"></span>
                                    </div>
                                    <div class="form-floating mt-3">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter E-mail">
                                        <label for="email">Enter Email</label>
                                        <span class="text-danger error-text email_error"></span>
                                    </div>
                                    <div class="form-floating mt-3">
                                        <input type="number" name="number" class="form-control" id="number" placeholder="Enter Number">
                                        <label for="number">Enter Number</label>
                                        <span class="text-danger error-text number_error"></span>
                                    </div>
                                    <div class="form-floating mt-3">
                                        <input type="text" name="address" class="form-control" id="text" placeholder="Enter Address">
                                        <label for="text">Enter Address</label>
                                        <span class="text-danger error-text address_error"></span>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="submit_btn form-control text-uppercase form-control-lg" name="submit">
                                            <span class="loader text-dark"></span>
                                            <span class="submit_btn_text">Submit</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    @push('jss')
                        <script>
                            $(function() {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $("#SeminerForm{{ $item->id }}").on('submit', function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url:$(this).attr('action'),
                                        method:$(this).attr('method'),
                                        data:new FormData(this),
                                        processData:false,
                                        dataType:'json',
                                        contentType:false,
                                        beforeSend:function(){
                                            $(document).find('span.error-text').text('');
                                            $('.loader').addClass('spinner-border');
                                            $('.submit_btn').attr('disabled', true);
                                            $('.submit_btn_text').hide('spinner-border');
                                        },
                                        success:function(data){
                                            if(data.status == 0){
                                                $.each(data.error, function(prefix, val){
                                                    $('span.'+prefix+'_error').text(val[0]);
                                                });
                                                $('.loader').removeClass('spinner-border');
                                                $('.submit_btn').removeAttr('disabled');
                                                $('.submit_btn_text').show('spinner-border');
                                            }else{
                                                $("#SeminerForm{{ $item->id }}")[0].reset();
                                                Swal.fire({
                                                    icon: "success",
                                                    title: "Seminer Registation Successful",
                                                    showConfirmButton: false,
                                                    timer: 2500
                                                })
                                                $('#seminerJoin{{ $item->id }}').modal('hide');
                                                $('.loader').removeClass('spinner-border');
                                                $('.submit_btn_text').show('spinner-border');
                                                $('.submit_btn').removeAttr('disabled');
                                            }
                                        }
                                    });
                                });
                            });
                        </script>
                    @endpush
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
                                <form action="{{ route('webinerRegistationPost') }}" method="post" class="text-start SeminerForm" id="WabinerForm{{ $item->id }}">
                                    @csrf
                                    <input type="hidden" value="{{ $item->title }}" name="webiner_id">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                                        <label for="name">Enter Name</label>
                                        <span class="text-danger error-text name_errorW"></span>
                                    </div>
                                    <div class="form-floating mt-3">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter E-mail">
                                        <label for="email">Enter Email</label>
                                        <span class="text-danger error-text email_errorW"></span>
                                    </div>
                                    <div class="form-floating mt-3">
                                        <input type="number" name="number" class="form-control" id="number" placeholder="Enter Number">
                                        <label for="number">Enter Number</label>
                                        <span class="text-danger error-text number_errorW"></span>
                                    </div>
                                    <div class="form-floating mt-3">
                                        <input type="text" name="address" class="form-control" id="text" placeholder="Enter Address">
                                        <label for="text">Enter Address</label>
                                        <span class="text-danger error-text address_errorW"></span>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="submit_btn form-control text-uppercase form-control-lg" name="submit">
                                            <span class="loader text-dark"></span>
                                            <span class="submit_btn_text">Submit</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      @push('jss')
                        <script>
                            $(function() {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $("#WabinerForm{{ $item->id }}").on('submit', function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url:$(this).attr('action'),
                                        method:$(this).attr('method'),
                                        data:new FormData(this),
                                        processData:false,
                                        dataType:'json',
                                        contentType:false,
                                        beforeSend:function(){
                                            $(document).find('span.error-text').text('');
                                            $('.loader').addClass('spinner-border');
                                            $('.submit_btn').attr('disabled', true);
                                            $('.submit_btn_text').hide('spinner-border');
                                        },
                                        success:function(data){
                                            if(data.status == 0){
                                                $.each(data.error, function(prefix, val){
                                                    $('span.'+prefix+'_errorW').text(val[0]);
                                                });
                                                $('.loader').removeClass('spinner-border');
                                                $('.submit_btn').removeAttr('disabled');
                                                $('.submit_btn_text').show('spinner-border');
                                            }else{
                                                $("#WabinerForm{{ $item->id }}")[0].reset();
                                                Swal.fire({
                                                    icon: "success",
                                                    title: "Webiner Registation Successful",
                                                    showConfirmButton: false,
                                                    timer: 2500
                                                })
                                                $('#wabinars{{ $item->id }}').modal('hide');
                                                $('.loader').removeClass('spinner-border');
                                                $('.submit_btn_text').show('spinner-border');
                                                $('.submit_btn').removeAttr('disabled');
                                            }
                                        }
                                    });
                                });
                            });
                        </script>
                    @endpush
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
