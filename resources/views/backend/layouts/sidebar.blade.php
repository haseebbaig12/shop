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
  <title>  @yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('backend/img/brand/KAF.jpg')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('backend/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('backend/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  
  <link rel="stylesheet" href="{{asset('backend/css/argon.css')}}" type="text/css">
</head>

<body>
 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{asset('backend/img/brand/KAF.jpg')}}" class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->

        <ul class="navbar-nav">
          
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.html">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route ('pages.index')}}">
              <i class="ni ni-ungroup"></i>
              <span class="nav-link-text">Pages</span>
            </a>
          </li>
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-shop"></i>
              <span class="nav-link-text">Product</span>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Product!</h6>
                </div>
                <a class="nav-link" href="{{route ('product.index')}}">
                  <i class="ni ni-shop"></i>
                  <span class="nav-link-text">Product</span>
                </a>
                <a class="nav-link" href="{{route ('variation.index')}}">
                  <i class="ni ni-ui-04"></i>
                  <span class="nav-link-text">Variation</span>
                </a>
                <a class="nav-link" href="{{route ('attribute.index')}}">
                  <i class="ni ni-ui-04 "></i>
                  <span class="nav-link-text">Attribute</span>
                </a>
              
               
                
              </div>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route ('category.index')}}">
              <i class="ni ni-collection"></i>
              <span class="nav-link-text">Category</span>

  
            </a>
          </li>


          
         
          
          
         
          
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Documentation</span>
        </h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="ni ni-world"></i>
              <span class="nav-link-text">Locale</span>

            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="{{route ('language.index')}}" class="dropdown-item">
                <i class="fas fa-language"></i>
                <span class="nav-link-text">Language</span>
              </a>
              <a href="{{route ('currency.index')}}" class="dropdown-item">
                <i class="fas fa-dollar-sign"></i>
                <span class="nav-link-text">Currency</span>
              </a>
              <a href="{{route ('locale.index')}}" class="dropdown-item">
                <i class="ni ni-world"></i>
                <span>Locale</span>
              </a>
              <a href="{{route ('site.index')}}" class="dropdown-item">
                <i class="fas fa-globe"></i>
                <span>Site</span>
              </a>
              
            </div>
          </li>

          
         
          {{-- <li class="nav-item">
            <a class="nav-link active active-pro" href="upgrade.html">
              <i class="ni ni-send text-dark"></i>
              <span class="nav-link-text">Upgrade to PRO</span>


            </a>
          </li> --}}
        </ul>
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Site</span>
        </h6>
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item dropdown">

            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="ni ni-world"></i>
              <span class="nav-link-text">Language</span>

            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="{{route ('language.index')}}" class="dropdown-item">
                <i class="fas fa-language"></i>
                <span>Language</span>
              </a>
              <div class="dropdown-divider"></div>           
            </div>
          </li>
        </ul>
      </div>
    </div>

  </div>
</nav>

