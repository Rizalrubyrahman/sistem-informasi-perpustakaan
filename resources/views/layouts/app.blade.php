<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  
  <title>@yield('title')</title>
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
  <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
  {{-- dataTables --}}
  <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.css')}}"> 
  
  
</head>
<body>
    @include('layouts.sidebar')
    @include('layouts.navbar')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block">@yield('namePage')</h6>
              </div>
              <div class="col-lg-6 col-5 text-right">
               @yield('content1')
                
              </div>
            </div>
          </div>
        </div>
       
    </div>
    
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                
                     @yield('content') 
                 <div class="footer">
          <p class="text-center" style="font-size:12px;">copyright &copy; 2020 | <i class="Heart fill"></i><a href="https://facebook.com/rizalruby.rahman.1">Rizal Ruby Rahman</a>.</p>
        </div>
            </div>
        </div>
       
    </div>
    @include('sweetalert::alert')


    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    
    <!-- Argon JS -->
    <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    {{-- dataTables --}}
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.js')}}"></script>
    @yield('javascript')
    <script>
      $(document).ready( function () {
        $('#datatable').DataTable();
      });
    </script>
    
  </body>
  
  </html>