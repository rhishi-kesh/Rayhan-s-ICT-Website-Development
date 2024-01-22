@extends('layouts.frontendMaster')
@section('content')
    <section class="career-header py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 align-self-center">
                    <h1 class="display-5 fw-bold">Career Development</h1>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas dolor atque voluptate? Dignissimos rerum itaque veritatis quisquam autem dolorem ipsa magnam quia ipsam unde corporis, quae qui, voluptatibus reiciendis sed.</p>
                </div>
                <div class="col-12 col-md-4 align-self-center">
                    <img src="https://img.freepik.com/free-vector/business-growth-concept-illustration_114360-8666.jpg?w=740&t=st=1705584516~exp=1705585116~hmac=476f6b6cc60ba988e5dfd56cebda589ba2eb69d76f166305843ed21b2f30db7c" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- career-header-end -->
    <section class="career-process">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mt-4 order-1">
                    <div class="card">
                        <h4>Our Goal</h4>
                        <p class="mb-0">Lorem, ipsum dolor, sit amet consectetur adipisicing elit. Id omnis, unde, est, possimus iste illum non in ratione consequuntur reiciendis provident ipsam nam quis saepe!</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-4  order-3">
                    <div class="card">
                        <h4>Benefits of Career Development</h4>
                        <p class="mb-0">Lorem, ipsum dolor, sit amet consectetur adipisicing elit. Id omnis, unde, est, possimus iste illum non in ratione consequuntur reiciendis provident ipsam nam quis saepe!</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-4  order-4">
                    <div class="card">
                        <h4>Internship Opportunity</h4>
                        <p class="mb-0">Lorem, ipsum dolor, sit amet consectetur adipisicing elit. Id omnis, unde, est, possimus iste illum non in ratione consequuntur reiciendis provident ipsam nam quis saepe!</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-4 order-2">
                    <div class="card">
                        <h4>Our Process</h4>
                        <p class="mb-0">Lorem, ipsum dolor, sit amet consectetur adipisicing elit. Id omnis, unde, est, possimus iste illum non in ratione consequuntur reiciendis provident ipsam nam quis saepe!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- career-process-section-end -->
    <section class="brands py-3 py-lg-5">
        <div class="container">
           <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center">
                    <h2 class="text-uppercase fs-1 mb-5">Our Career Placement Partner</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-4">
                    <div class="row justify-content-center">
                        <div class="col-6 col-md-4 align-self-center text-center mt-4 mt-md-0">
                            <img src="{{ asset('frontend/img/1.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-6 col-md-4 align-self-center text-center mt-4 mt-md-0">
                            <img src="{{ asset('frontend/img/2.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-6 col-md-4 align-self-center text-center mt-4 mt-md-0">
                            <img src="{{ asset('frontend/img/3.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brands-end -->
    <section class="career_from py-3 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center">
                    <h2 class="text-uppercase fs-1 mb-5">Send us your CV now</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-7">
                    <form action="" method="" class="text-start">
                        <div>
                            <label for="name">Name</label>
                            <input type="text" class="form-control shadow-none" id="name" placeholder="Enter Name">
                        </div>
                        <div class="mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control shadow-none" id="email" placeholder="Enter E-mail">
                        </div>
                        <div class="mt-3">
                            <label for="number">Number</label>
                            <input type="number" class="form-control shadow-none" id="number" placeholder="Enter Number">
                        </div>
                        <div class="mt-3">
                            <label for="massage">Address</label>
                            <textarea name="massage" id="massage" class="form-control shadow-none" placeholder="Enter Address"></textarea>
                        </div>
                        <div class="mt-3">
                            <label for="file">CV(pdf only)</label>
                            <input type="file" class="form-control shadow-none" id="file" placeholder="Enter E-mail">
                        </div>
                        <div class="mt-3">
                            <input type="submit" class="form-control form-control-lg shadow-none" value="SUBMIT" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
