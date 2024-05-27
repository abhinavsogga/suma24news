<!DOCTYPE html>
<html class="no-js">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SUMA 24 NEWS</title>
  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicons/favicon.ico') }}">
  <link rel="manifest" href="{{ asset('assets/images/favicons/manifest.json') }}">
  <meta name="msapplication-TileImage" content="{{ asset('assets/images/favicons/mstile-150x150.png') }}">
  <meta name="theme-color" content="#0D1554">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">
  <!-- Slick  -->
  <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" re="preload">
  <link rel="stylesheet" href="{{ asset('assets/libs/magnific-popup/magnific-popup.css') }}">
</head>

<body>
  <main>
	<header class="header">
      <div class="top_header">
        <div class="container">

          <div class="row align-items-center">
            <div class="col-md-3 col-6 d-none d-lg-block">
              <div class="logo">
                <a href="{{url('')}}"><img src="{{ asset('assets/img/logo.png') }}" alt="Suma 24 News" width="150" height="auto"></a>
              </div>
            </div>

            <div class="col-md-5 d-none d-md-block">
              <form method="GET" action="{{ route('search') }}">
                <div class="search-box">
                  <input class="input-search" name="q" type="text" placeholder="Search News" value="{{ $query ?? '' }}"/>
                </div>
              </form>
            </div>

            <div class="col-lg-4 col-md-7 col-12">
              <div class="w-100 d-flex justify-content-between justify-content-lg-end">
                <div class="dropdown lang_drop">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    EN
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">English</a></li>
                    <li><a class="dropdown-item" href="#">Turkish</a></li>
                  </ul>
                </div>
                @if (Auth::check())
                  <div class="d-flex btn_group">
                    <a href="{{ route('logout') }}" class="btn btn-md btn-yellow">Logout</a>
                  </div>
                @else
                  <div class="d-flex btn_group">
                    <a href="{{ route('login') }}" class="btn btn-md btn-outline-secondary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-md btn-yellow">SIGN UP</a>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg">
        <div class="container container-lg">
          <div class="d-flex d-lg-none justify-content-between w-100">
            <a class="navbar-brand logo" href="{{url('')}}"><img src="{{ asset('assets/img/logo_white.png') }}" width="100"/></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="#fff" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
                </path>
              </svg>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 w-100 justify-content-center">
              
              <?php
                $navCategories = [
                  'sports' => 'Sports',
                  'biz-econ' => 'Biz-econ',
                  'education' => 'Education',
                  'culture' => 'Culture',
                  'entertainment' => 'Entertainment',
                  'innovation' => 'Innovation',
                  'international' => 'International',
                  'politics' => 'Politics',
                ]
              ?>
              @foreach($navItems as $slug => $item)
              <li class="nav-item">
                <a class="nav-link @if($item['active'])active @endif" href="{{ $item['url'] }}">{{ $item['label'] }}</a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      	</nav>
    </header>
    <!-- End Header -->
    <style>
    .navbar .navbar-nav li a.active{
      color: #F7C846;
    }
    </style>