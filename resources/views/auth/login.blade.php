<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Login</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/img/brand/favicon.png" type="image/png')}}">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}">
</head>

<body background="{{ asset('assets/img/bg.jpg') }}">
 
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header  py-lg-8 pt-lg-9">
      <div class="container">
       
      </div>
      <div class="separator separator-skew zindex-100">
        
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div style="margin-top: -130px;" class="card bg-secondary border-0 mb-0">
            <div style="background-color: white;" class="card-header text-center pb-5">
              <h2>Login Perpus SMKN 1 Cilamaya Wetan</h2>
              <img style="margin-top: -10px;" src="{{ asset('assets/img/smk.jpg') }}">
            </div>
            <div style="background-color: white; margin-top:-87px;" class="card-body">
              <div class="text-center text-muted mb-4">
                
                @if ($message = session()->get('error'))
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @endif

              </div>
              <form role="form" action="/login" method="POST">
                {{ csrf_field() }}
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control shadow {{$errors->has('username') ? 'is-invalid' : '' }}" name="username" placeholder="Username" type="text">
                  </div>
                  {!!$errors->first('username','<span class=" text-danger mt-2">:message</span>' )!!}
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control shadow {{$errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" name="password" type="password">
                  </div>
                  {!!$errors->first('password','<span class=" text-danger mt-2">:message</span>' )!!}
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Login</button>
                </div>
              </form>
                <p class="text-center" style="font-size:12px;">copyright &copy; 2020 | <i class="Heart fill"></i><a href="https://facebook.com/rizalruby.rahman.1">Rizal Ruby Rahman</a>.</p>
            </div>
          </div>
         
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Core -->
  <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>