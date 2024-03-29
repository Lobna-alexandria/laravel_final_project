<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('page_title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminDashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('AdminDashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('AdminDashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('AdminDashboard/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminDashboard/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('AdminDashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('AdminDashboard/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('AdminDashboard/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('sweetalert::alert')
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class=" fw-bold fs-1 text-warning nav-link bg-light rounded-circle" data-toggle="dropdown" href="#">
          {{--  <i class="far fa-comments"></i>  --}}
          {{App::getLocale()}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
               {{--  <a href="#" class="dropdown-item px-4 d-flex align-items-center justify-content-center">  --}}
                  <div class="d-flex align-items-center justify-content-between p-3 nav-link {{App::getLocale() == $localeCode ? 'bg-danger' :'bg-light'}}">         
                     <!-- Message Start -->
                 <a hreflang="{{$localeCode}}" class="dropdown-item" href="">
                  {{--  class="{{App::getLocale() == $localeCode ? 'active' :''}} "  --}}
                  <img src="{{asset('AdmindashBoard/flags/'. $properties['name'].'.png')}}" alt="User Avatar" class="w-25 h-25 rounded-circle">
                  
                  {{--  {{App::getLocale() == $localeCode ? 'active' :''}}  --}}
                   
                    <h3 class="dropdown-item-title ">
                    <a class="px-3 " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                             {{ $properties['native'] }}
                       </a>
                    </h3>
                  
                </a>
                     </div>  
                      {{--  </div>  --}}
                      <!-- Message End -->
               <div class="dropdown-divider"></div>
               {{--  </a>  --}}
             @endforeach
                   
                 
               
          
          {{--  <div class="dropdown-divider"></div>  --}}
          {{--  <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('AdmindashBoard/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  En
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                
              </div>
            </div>
            <!-- Message End -->
          </a>  --}}
         
       
          
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-wrench"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          
            <form action="{{route('logout')}}"  method="post" >
                @csrf
                <button  class="dropdown-item">
                    <i class="fas fa-sign-out-alt mx-2"></i>Log Out </button>
              
            </form>
           
            
         
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('AdmindashBoard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="{{asset('AdmindashBoard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
          <img src="{{ asset('uploads/users/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">

        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{__('Welcome')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('Dashboard')}} v1</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                All Tables
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('portfolio.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>My Portfolio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Dabout.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>About</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('skill.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Skills</p>
                </a>
              </li>
              {{-- <li class="nav-item nav nav-treeview">
                <a href="{{route('service.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Services</p>
                </a>
                <li class="nav-item">
                  <a href="{{route('service.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon text-warning"></i>
                    <p>MultiMedia Icons</p>
                  </a>
                </li>
              </li> --}}
             
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    All Services
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item ">
                    <a href="{{route('service.index')}}" class="nav-link">
                      <i class="ml-3 far fa-circle nav-icon text-info"></i>
                      <p>Services</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('ServeMultiIcon.index')}}" class="nav-link">
                      <i class="ml-3 far fa-circle nav-icon text-warning"></i>
                      <p>Social Icons</p>
                    </a>
                  </li>
                </ul>
              </li>


              <li class="nav-item">
                <a href="{{route('work.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Working Process</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('CreativeWork.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Creative Work</p>
                </a>
              </li> --}}


              {{--  --}}

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    All Creative Tasks
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item ">
                    <a href="{{route('CreativeWork.index')}}" class="nav-link">
                      <i class="ml-3 far fa-circle nav-icon text-info"></i>
                      <p>CreativeWork</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('CreativeWorkImg.index')}}" class="nav-link">
                      <i class="ml-3 far fa-circle nav-icon text-warning"></i>
                      <p>CreativeWork Images</p>
                    </a>
                  </li>
                </ul>
              </li>

            </ul>
           
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">@yield('page_title')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">