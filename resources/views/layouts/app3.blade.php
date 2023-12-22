<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Landing Page</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{ url ('frontend/img/map.ico') }}">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Leaflet Routing Machine -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" />

    @stack('style')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" /> -->


    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="shortcut icon" href="{{ url ('frontend/img/map.ico') }}">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->

    <style>
        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }

        /*Legend specific*/
        .legend {
            padding: 6px 8px;
            font: 14px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            /*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
            /*border-radius: 5px;*/
            line-height: 24px;
            color: #555;
        }

        .legend h4 {
            text-align: center;
            font-size: 16px;
            margin: 2px 12px 8px;
            color: #777;
        }

        .legend span {
            position: relative;
            bottom: 3px;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin: 0 8px 0 0;
            opacity: 0.7;
        }

        .legend i.icon {
            background-size: 18px;
            background-color: rgba(255, 255, 255, 1);
        }
    </style>
    <title>Document</title>
</head>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Header -->
            @can('admin')
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <!-- <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li> -->
                        <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
                    </ul>
                </form>
                <div class="px-5">
                    <div class="px-5">
                        <ul class="navbar-nav navbar-right">
                            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                    <div class="dropdown-header">Messages
                                        <div class="float-right">
                                            <a href="#">Mark All As Read</a>
                                        </div>
                                    </div>
                                    <div class="dropdown-list-content dropdown-list-message">
                                        <a href="#" class="dropdown-item dropdown-item-unread">
                                            <div class="dropdown-item-avatar">
                                                <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle">
                                                <div class="is-online"></div>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Kusnaedi</b>
                                                <p>Hello, Bro!</p>
                                                <div class="time">10 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item dropdown-item-unread">
                                            <div class="dropdown-item-avatar">
                                                <img alt="image" src="{{ asset('img/avatar/avatar-2.png') }}" class="rounded-circle">
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Dedik Sugiharto</b>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <div class="time">12 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item dropdown-item-unread">
                                            <div class="dropdown-item-avatar">
                                                <img alt="image" src="{{ asset('img/avatar/avatar-3.png') }}" class="rounded-circle">
                                                <div class="is-online"></div>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Agung Ardiansyah</b>
                                                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                <div class="time">12 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="dropdown-item-avatar">
                                                <img alt="image" src="{{ asset('img/avatar/avatar-4.png') }}" class="rounded-circle">
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Ardian Rahardiansyah</b>
                                                <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                                <div class="time">16 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="dropdown-item-avatar">
                                                <img alt="image" src="{{ asset('img/avatar/avatar-5.png') }}" class="rounded-circle">
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Alfa Zulkarnain</b>
                                                <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                                <div class="time">Yesterday</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-footer text-center">
                                        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                    <div class="dropdown-header">Notifications
                                        <div class="float-right">
                                            <a href="#">Mark All As Read</a>
                                        </div>
                                    </div>
                                    <div class="dropdown-list-content dropdown-list-icons">
                                        <a href="#" class="dropdown-item dropdown-item-unread">
                                            <div class="dropdown-item-icon bg-primary text-white">
                                                <i class="fas fa-code"></i>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                Template update is available now!
                                                <div class="time text-primary">2 Min Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="dropdown-item-icon bg-info text-white">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                                <div class="time">10 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="dropdown-item-icon bg-success text-white">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                                <div class="time">12 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="dropdown-item-icon bg-danger text-white">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                Low disk space. Let's clean it!
                                                <div class="time">17 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="dropdown-item-icon bg-info text-white">
                                                <i class="fas fa-bell"></i>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                Welcome to Stisla template!
                                                <div class="time">Yesterday</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-footer text-center">
                                        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </li>
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link btn" style="background-color: #787adc; color: #fff;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                                    <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-title">Logged in 5 min ago</div>
                                    <a href="#" class="dropdown-item has-icon">
                                        <i class="far fa-user"></i> Profile
                                    </a>
                                    <a href="/dashboard" class="dropdown-item has-icon">
                                        <i class="fas fa-bolt"></i> Dashboard
                                    </a>
                                    <a href="#" class="dropdown-item has-icon">
                                        <i class="fas fa-cog"></i> Settings
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>

            </nav>
            @endcan
            <div class="navbar-bg shadow p-3 mb-5 rounded" style="height: 20vh;"></div>
            <!-- Sidebar -->


            <!-- Content -->
            <div>
                @yield('main3')
            </div>

            <!-- Footer -->
        </div>
    </div>

    @include('sweetalert::alert')

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    <!-- <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script> -->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <!-- Leaflet Routing Machine -->
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>