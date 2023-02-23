<!doctype html>
<html class="no-js"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('page_title','notitle')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontDesign/img/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('frontDesign/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontDesign/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontDesign/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontDesign/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontDesign/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontDesign/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('frontDesign/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontDesign/css/responsive.css')}}">
</head>

<body>
{{-- auth part log or not  --}}
    {{-- @if(Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                @if(!Auth::user()->hasRole('user') )
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href=" " class="text-sm text-gray-700 dark:text-gray-500 underline">Mesh Admin</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn gradient-custom-2 p-5 text-light rounded-pill">Log Out</button>

                    </form>
                @endif
            @else
                <a href="{{ route('login') }}"
                    class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if(Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif --}}

    <!-- preloader-start -->
    <div id="preloader">
        <div class="rasalina-spin-box"></div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header>
        <div id="sticky-header" class="menu__area transparent-header">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu__wrap">
                            <nav class="menu__nav">
                                <div class="logo">
                                    <a href="index.html" class="logo__black"><img src="{{asset('frontDesign/img/logo/logo_black.png')}}"
                                            alt=""></a>
                                    <a href="index.html" class="logo__white"><img src="{{asset('frontDesign/img/logo/logo_white.png')}}"
                                            alt=""></a>
                                </div>
                                <div class="navbar__wrap main__menu d-none d-xl-flex">
                                    <ul class="navigation">
                                        <li class="active"><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="services-details.html">Services</a></li>
                                        <li class="menu-item-has-children"><a href="#">Portfolio</a>
                                            <ul class="sub-menu">
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Our Blog</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog.html">Our News</a></li>
                                                <li><a href="blog-details.html">News Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">contact me</a></li>
                                    </ul>
                                </div>
                                <div class="header__btn d-none d-md-block">
                                  @if(Route::has('login'))
                                  <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                      @auth
                                          @if(!Auth::user()->hasRole('user') )
                                              <a href="{{ url('/dashboard') }}"
                                                  class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                          @else
                                              <a href=" " class="text-sm text-gray-700 dark:text-gray-500 underline">Mesh Admin</a>
                          
                                              <form action="{{ route('logout') }}" method="POST">
                                                  @csrf
                                                  <button class="btn btn-danger p-5 text-light rounded-pill">Log Out</button>
                          
                                              </form>
                                          @endif
                                      @else
                                          <a href="{{ route('login') }}"
                                              class="text-sm text-gray-700 dark:text-gray-500 btn  btn-info underline">Log in</a>
                          
                                          @if(Route::has('register'))
                                              <a href="{{ route('register') }}"
                                                  class="ml-4 text-sm text-gray-700 btn  btn-info underline">Register</a>
                                          @endif
                                      @endauth
                                  </div>
                              @endif
                                </div>
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="mobile__menu">
                            <nav class="menu__box">
                                <div class="close__btn"><i class="fal fa-times"></i></div>
                                <div class="nav-logo">
                                    <a href="index.html" class="logo__black"><img src="{{asset('frontDesign/img/logo/logo_black.png')}}"
                                            alt=""></a>
                                    <a href="index.html" class="logo__white"><img src="{{asset('frontDesign/img/logo/logo_white.png')}}"
                                            alt=""></a>
                                </div>
                                <div class="menu__outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu__backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area-end -->

    <!-- main-area -->
    <main>
