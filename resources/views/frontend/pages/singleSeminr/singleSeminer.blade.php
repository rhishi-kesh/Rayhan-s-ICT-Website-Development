@extends('layouts.frontendMaster')
@section('title',"$title")
@section('content')
<section class="py-5 my-4 single-seminer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card p-4">
                    <img src="{{  asset('storage/seminar/'. $seminer->thumbnail)  }}" alt="{{ $seminer->slug }}" class="img-fluid">
                    <h2 class="text-uppercase fw-bold demoClassTitle fs-4 mt-4">{{ $seminer->title }}</h2>
                    <p>
                        Date: {{ $seminer->date }},  Time: {{ $seminer->time }}
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card p-4 form-card">
                    <h2 class="text-uppercase mb-3 fw-bold demoClassTitle text-center">Register For Join Seminer</h2>
                    <form action="{{ route('seminerRegistationPost') }}" method="post" class="text-start SeminerForm" id="SeminerForm">
                        @csrf
                        <input type="hidden" value="{{ $seminer->id }}" name="seminer_id">
                        <input type="hidden" value="{{ $seminer->title }}" name="seminer_title">
                        <input type="hidden" value="{{ $seminer->date }}" name="date">
                        <input type="hidden" value="{{ $seminer->time }}" name="time">
                        <div class="form-floating">
                            <input type="text" class="form-control shadow-none" name="name" id="name" placeholder="Enter Name">
                            <label for="name">Enter Name</label>
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="email" name="email" class="form-control shadow-none" id="email" placeholder="Enter E-mail">
                            <label for="email">Enter Email</label>
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="number" name="number" class="form-control shadow-none" id="number" placeholder="Enter Number">
                            <label for="number">Enter Number</label>
                            <span class="text-danger error-text number_error"></span>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="text" name="address" class="form-control shadow-none" id="text" placeholder="Enter Address">
                            <label for="text">Enter Address</label>
                            <span class="text-danger error-text address_error"></span>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="submit_btn shadow-none form-control text-uppercase form-control-lg" name="submit">
                                <span class="loader text-dark"></span>
                                <span class="submit_btn_text">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@push('jss')
    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#SeminerForm").on('submit', function(e) {
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
                            $("#SeminerForm")[0].reset();
                            Swal.fire({
                                icon: "success",
                                title: "Seminer Registation Successful",
                                showConfirmButton: false,
                                timer: 2500
                            })
                            $('#seminerJoin').modal('hide');
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
@endsection
