<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('frontend/img/fav.jpg') }}">
  <title> Admin Login </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <style>
      button{
          background-color: #293678 !important;
          border: none !important;
      }
      button:hover{
          background-color: #F85606 !important;
      }
      button:focus{
          background-color: #F85606 !important;
      }
      input{
          border-color: #293678 !important;
      }
      input:focus{
          border-color: #F85606 !important;
      }
      .card{
          border: none !important;
          box-shadow: 0px 0px 20px rgba(41, 54, 120, 0.3);
      }
  </style>
</head>
<body class="hold-transition login-page p-3">
<div class="container">
  <div class="row justify-content-center mt-5">
      <div class="col-12 col-md-6 mt-5 pt-5">
          <div class="card mb-3 ">
            <div class="card-body login-card-body ">
              <div class="text-center">
                <img src="{{ asset('logo.png') }}" width="150" alt="rayhans_image">
              </div>

              <form method="POST" action="{{ route('loginPost')}}">
                @csrf
                @error('email')
                  <div class="alert alert-danger">{{ ($message) }}</div>
                @enderror
                <div class="mb-4">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" name="email" class="form-control shadow-none" value="{{ old('email')}}" placeholder="Enter Your Email">
                </div>
                <div class="mb-4">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control shadow-none" value="{{ old('password')}}"  placeholder="Enter Your Password">
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-2">Login</button>
              </form>
            </div>
          </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
