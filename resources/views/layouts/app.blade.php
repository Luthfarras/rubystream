<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <!-- {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}} -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('anime-main/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('anime-main/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('anime-main/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('anime-main/css/plyr.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('anime-main/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('anime-main/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('anime-main/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('anime-main/css/style.css') }}" type="text/css">

<!-- start pagination stylesheet -->
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css') }}">
<!-- end pagination stylesheet -->


</head>
<body>

<!-- Page Preloder -->
<div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="">
                            <img src="{{ asset('anime-main/img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="@if(Request::is('dashboard')) active @endif"><a href="/dashboard">Homepage</a></li>
                                <li><a href="">Categories <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="">Categories</a></li>
                                        <li><a href="">Anime Details</a></li>
                                        <li><a href="">Anime Watching</a></li>
                                        <li><a href="">Blog Details</a></li>
                                        <!-- <li><a href="">Sign Up</a></li>
                                        <li><a href="">Login</a></li> -->
                                    </ul>
                                </li>
                                <li class="@if(Request::is('film')) active @endif"><a href="/film">List Film</a></li>
                                <li class="@if(Request::is('genre')) active @endif"><a href="/genre">Genre</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">

                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <a href="#" class="search-switch text-light"><span class="icon_search"></span></a>
                                <li><a href="">{{ Auth::user()->name }} <span class="icon_profile"></span><span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="">
                                        <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                        </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>                    

                        <!-- <a href="./login.html"><span class="icon_profile"></span></a> -->
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('sweetalert::alert')

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="./index.html"><img src="{{ asset('anime-main/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li><a href="/dashboard">Homepage</a></li>
                        <li><a href="/profile">Profile</a></li>
                        <li><a href="/film">List Film</a></li>
                        <li><a href="/genre">Genre</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Ruby Streaming Films <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search model Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

    <!-- Js Plugins -->
<script src="{{ asset('anime-main/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('anime-main/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('anime-main/js/player.js') }}"></script>
<script src="{{ asset('anime-main/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('anime-main/js/mixitup.min.js') }}"></script>
<script src="{{ asset('anime-main/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('anime-main/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('anime-main/js/main.js') }}"></script>

<!-- start pagination script -->
<script src="{{ asset('https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js') }}"></script>

</body>
</html>
