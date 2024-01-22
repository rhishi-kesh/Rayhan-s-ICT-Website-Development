<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="hold-transition login-page p-3">
<div class="container">
  <div class="row justify-content-center">
      <div class="col-7 mb-3 mt-4">
          <div class="card mb-3 ">
            <div class="card-body login-card-body ">
              <div class="text-center">
                <img src="{{ asset('logo.png') }}" width="150" alt="rayhans_image">
              </div>
              
              <form method="POST" action="">
                <div class="mb-4">                  
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control " placeholder="Enter Your Email">
                </div>
                <div class="mb-4">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control " placeholder="Enter Your Password">
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
