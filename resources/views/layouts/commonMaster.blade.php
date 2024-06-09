<!DOCTYPE html>
<html lang="en">

<head>  <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
    <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Include Styles -->
    @include('layouts/sections/styles')
    @yield('page-styles')
</head>

<body>
    <!-- Wrapper -->
    <div id="db-wrapper">
        <!-- navbar vertical -->
        @include('layouts/sections/navbar')
        <!-- Page Content -->
        <main id="page-content">
            <div class="header">
                <!-- navbar -->
                <nav class="navbar-default navbar navbar-expand-lg">
                <a id="nav-toggle" href="#">
                    <i class="fe fe-menu"></i>
                </a>
                <!--Navbar nav -->
                <div class="ms-auto d-flex">
                    
                <ul class="navbar-nav navbar-right-wrap ms-2 d-flex nav-top-wrap">
                    <li class="dropdown stopevent">
                        <a class="btn btn-light btn-icon rounded-circle  @if(count(auth()->user()->unreadNotifications) > 0) indicator indicator-primary @endif text-muted" href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg" aria-labelledby="dropdownNotification">
                            <div>
                                <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                                    <span class="h4 mb-0">Notifications</span>
                                    <a href="javascript:void(0);" class="text-muted">
                                        <span class="align-middle">
                                                <i class="fe fe-settings me-1"></i>
                                            </span>
                                    </a>
                                </div>
                                <!-- List group -->
                                <ul class="list-group list-group-flush" data-simplebar style="max-height: 300px;">
                                    @if(count(auth()->user()->unreadNotifications) > 0)
                                        @foreach (auth()->user()->unreadNotifications as $notification)
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">
                                                        <a class="text-body" href="{{ $notification->data['link'] ?? '#' }}">
                                                        <div class="d-flex">                                               
                                                            <div class="ms-3">
                                                                <p class="mb-3">
                                                                    {!! $notification->data['message'] !!}
                                                                </p>
                                                                <span class="fs-6 text-muted">
                                                                    <span
                                                                        ><span
                                                                            class="fe fe-thumbs-up text-success me-1"
                                                                        ></span
                                                                        >{{ $notification->created_at->diffForHumans() }}</span
                                                                    >
                                                                </span>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-auto text-center me-2">
                                                            <form action="{{ route('notifications.mark-as-read', $notification) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="badge-dot bg-info border-0"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="Mark as read"
                                                                ></button>
                                                            </form>                                                       
                                                            <div>
                                                                <form action="{{ route('notifications.delete', $notification) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"  class="bg-transparent border-0"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Remove" ><i class="fe fe-x text-muted"></i></button>
                                                                </form>                                                         
                                                            </div>
                                                        </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                       <li class="list-group-item">No new notification</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- List -->
                    <li class="dropdown ms-2">
                        <a class="btn btn-primary btn-icon rounded-circle text-white" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                            <div class="dropdown-item">
                                <div class="d-flex">
                                    <div class="ms-3 lh-1">
                                        <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                                        <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="dropdown-item" href="{{route('logout')}}">
                                        <i class="fe fe-power me-2"></i> Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                </div>
                </nav>
            </div>

            <!-- Layout Content -->
            @yield('content')
            <!--/ Layout Content -->
        </main>
    </div>
    <!-- Scripts -->
    @include('layouts/sections/scripts')
    @yield('page-scripts')
    </body>
</html>