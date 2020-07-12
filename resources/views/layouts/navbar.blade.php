<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="/buku" method="GET">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Cari Judul Buku " type="text" name="cari">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
             
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <div class="media-body  ml-2  d-none d-lg-block">
                    
                  </div>
                  <span class="avatar avatar-sm rounded-circle ml-4">
                      <img src="{{asset('images/'.auth()->user()->pegawai->foto)}}" style="width: 50px; height: 50px;">
                      
                  </span>
                  
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right" style="padding: 30px">
                <div class="dropdown-header">
                  <div class="row">
                    <div class="col-md-4">
                      
                    </div>
                    <div class="col-md-4">
                      <span class="avatar avatar-sm rounded-circle mt-4" style="margin:auto;">
                        <img src="{{asset('images/'.auth()->user()->pegawai->foto)}}" style="width: 100px; height: 100px;">
                      </span>
                    </div>
                  </div>
                                      
                  <h6 class="h2 mt-4 text-center" style="font-size: 16px; text-transform: capitalize; padding-top:10px;">
                  {{auth()->user()->name}}
                </h6>
                <p style="font-size: 14px; text-transform: lowercase;" class="text-center">{{auth()->user()->email}}</p>
                </div>
                
                <a href="/logout" class="btn btn-neutral dropdown-item text-center mt-4" style="border:1px solid rgb(192, 184, 184); border-radius: 30px; color:black">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
            </li>
        </ul>
        </div>
      </div>
    </nav>
