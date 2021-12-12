<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

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
   <title>{{ $title }}</title>
   <!-- Favicon -->
   <link rel="icon" href="{{ asset('assets/img/brand/favicon.png')}}" type="image/png">
   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
   <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
   <!-- Page plugins -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
   <!-- Argon CSS -->
   <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.1.0')}}" type="text/css">
 </head>
 
 <body>
   <!-- Sidenav -->
   <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
     <div class="scrollbar-inner">
       <!-- Brand -->
       <div class="sidenav-header d-flex align-items-center">
         <a class="navbar-brand" href="{{ route('dashboard') }}">
           <img src="{{ asset('assets/img/brand/logo-kecil-2.png')}}" class="navbar-brand-img" alt="...">
         </a>
         <div class="ml-auto">
           <!-- Sidenav toggler -->
           <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
             <div class="sidenav-toggler-inner">
               <i class="sidenav-toggler-line"></i>
               <i class="sidenav-toggler-line"></i>
               <i class="sidenav-toggler-line"></i>
             </div>
           </div>
         </div>
       </div>
       <div class="navbar-inner">
         <!-- Collapse -->
         <div class="collapse navbar-collapse" id="sidenav-collapse-main">
           <!-- Nav items -->
           <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link" href="{{ route('dashboard') }}" role="button"
                 aria-expanded="true" aria-controls="navbar-dashboards">
                 <i class="ni ni-shop text-primary"></i>
                 <span class="nav-link-text">Home</span>
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="{{ route('perizinan') }}" role="button" aria-expanded="false"
                 aria-controls="navbar-examples">
                 <i class="ni ni-ungroup text-orange"></i>
                 <span class="nav-link-text">Perizinan</span>
               </a>
             </li>
             @if (Auth::user()->roles == 'admin')    
             <li class="nav-item">
               <a class="nav-link" href="{{ route('manageizin')}}" role="button" aria-expanded="false"
                 aria-controls="navbar-components">
                 <i class="ni ni-ui-04 text-info"></i>
                 <span class="nav-link-text">Manage Izin</span>
               </a>
             </li>
             @endif
             @if (Auth::user()->roles == 'admin')    
             <li class="nav-item">
               <a class="nav-link" href="{{ route('absensi.laporan')}}" role="button" aria-expanded="false"
                 aria-controls="navbar-forms">
                 <i class="ni ni-single-copy-04 text-pink"></i>
                 <span class="nav-link-text">Laporan</span>
               </a>
             </li>
             @endif
           </ul>
           
         </div>
       </div>
     </div>
   </nav>
   <!-- Main content -->
   <div class="main-content" id="panel">
     <!-- Topnav -->
     <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
       <div class="container-fluid">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Search form -->
           <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
             
           </form>
           <!-- Navbar links -->
           <ul class="navbar-nav align-items-center ml-md-auto">
            
           </ul>
           <ul class="navbar-nav align-items-center ml-auto ml-md-0">
             <li class="nav-item dropdown">
               <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false">
                 <div class="media align-items-center">
                   <span class="avatar avatar-sm rounded-circle">
                     <img alt="Image placeholder" src="{{ asset('assets/img/theme/default.jpg')}}">
                   </span>
                   <div class="media-body ml-2 d-none d-lg-block">
                     <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }} </span>
                   </div>
                 </div>
               </a>
               <div class="dropdown-menu dropdown-menu-right">
                 <div class="dropdown-header noti-title">
                   <h6 class="text-overflow m-0">Welcome!</h6>
                 </div>
                 <div class="dropdown-divider"></div>
                 <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                      </a>
                    
                </form>
               </div>
             </li>
           </ul>
         </div>
       </div>
     </nav>
     <!-- Header -->
     {{ $slot }}
   </div>
   @include('sweetalert::alert')
   <!-- Argon Scripts -->
   <!-- Core -->
   <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
   <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
   <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
   <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
   <!-- Optional JS -->
   <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
   <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
   <!-- Argon JS -->
   <script src="{{ asset('assets/js/argon.js?v=1.1.0')}}"></script>
   <!-- Demo JS - remove this in your project -->
   <script src="{{ asset('assets/js/demo.min.js')}}"></script>
   <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
 </body>
 
 </html>

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}
