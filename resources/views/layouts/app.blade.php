<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="icon" href="{{ url('images/icon-logo-orange.svg') }}">

    <!--    bootstrap   -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!--   font-awsome JS-->
    <script src="https://kit.fontawesome.com/85c9736486.js" crossorigin="anonymous"></script>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">

    <style>
        .dropdown-item.active {
            background-color: var(--main-color);
        }

        .dropdown-item:hover {
            background-color: var(--main-color);
            color: white;
        }

        .form-control:focus {
            border-color: var(--main-color);
            box-shadow: none;
        }

        .imagecontainer{
            height: 60vh;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .imagecontainer .textcontainer{
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 10px 9%;
        }

        .imagecontainer .textcontainer.second{
            justify-content: flex-start;
        }

        .textcontainer .content{
            background-color: rgba(255, 255, 255, 0.5);
            padding: 1.3rem;
            width: 18rem;
            text-align: left;
            justify-content: flex-start;
        }

        .content h4{
            text-transform: uppercase;
            color: var(--main-color);
        }

    </style>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href={{ route('welcomePage') }}>
                <img src={{ url('images/logo_white.svg') }} alt="" style="width: 175px">
            </a>

            <div class="offcanvas text-bg-dark offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                 aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <img src={{ url('images/logo_white.svg') }} alt="" style="width: 175px">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body justify-content-center">
                    @auth
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('homes*') ? 'active' : '' }}" aria-current="page"
                                   href={{ route('welcomePage') }}>Home
                                    <hr>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('slides*') ? 'active' : '' }}" aria-current="page"
                                   href={{ route('slides.index') }}>Slider
                                    <hr>
                                </a>

                            </li>

                            @if(Auth::user()->isadmin == 1)
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('alerts*') ? 'active' : '' }}" aria-current="page"
                                       href={{ route('alerts.index') }}>Alerts
                                        <hr>
                                    </a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" aria-current="page"
                                   href={{ route('users.index') }}>Users
                                    <hr>
                                </a>
                            </li>
                            @endauth
                        </ul>
                </div>
            </div>
            <div class="d-inline-flex">
                <div class="dropdown user-name">
                    @auth
                        <span class="pe-3 text-light d-sm-flex d-none">{{ Auth::user()->name }}</span>
                        <a href="#" class="d-block link-dark text-decoration-none"
                           style="width: 48px;height: 48px" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(Auth::user()->profile_image_path)
                                <img src={{ url('/profile_pics' .'/'. Auth::user()->profile_image_path) }} alt="mdo"
                                     width="48" height="48"
                                     class="rounded-circle border border-light border-3">
                            @else
                                <img src={{ url('/images/user.png') }} alt="mdo" width="48" height="48"
                                     class="rounded-circle border border-light border-3">
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-smaller">
                            <li>
                                <a class="dropdown-item {{ Request::is('profile') ? 'active' : '' }}"
                                   href="{{ route('profile') }}">
                                    <i class="fa-solid fa-address-card"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ Request::is('profile/change-password') ? 'active' : '' }}"
                                   href="{{ route('changePassword') }}">
                                    <i class="fa-solid fa-screwdriver-wrench"></i>
                                    Change password
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider ">
                            </li>
                            <li>
                                <form method="POST" class="dropdown-item d-flex justify-content-center"
                                      action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-warning">
                                        <i class="fa-solid fa-power-off"></i>
                                        Sign out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    @else
                        <span class="pe-3 text-light d-sm-flex d-none">Guest</span>
                        <a href="#" class="d-block link-dark text-decoration-none"
                           style="width: 48px;height: 48px" data-bs-toggle="dropdown" aria-expanded="false">

                            <img src={{ url('/images/user.png') }} alt="mdo" width="48" height="48"
                                 class="rounded-circle border border-light border-3">
                        </a>
                    @endauth
                </div>

                <button class="navbar-toggler mx-2" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" style="background-color: var(--main-color) "
                        aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon" style="color: var(--main-color)"></span>
                </button>
            </div>

        </div>
    </nav>
    <div style="height: 70px"></div>
</header>
<div class="container-md py-4 position-relative" aria-live="polite" aria-atomic="true"
     style="height: calc(100vh - 70px)">
    <div class="toast-container bottom-0 start-0 p-3 ">
        @if(isset($alerts) && count($alerts)>=4)
            {{ msg_toast_warning("Veuillez supprimer un alert pour que vous puissiez ajouter un nouveau") }}

        @endif
        @if (session()->has('success_login'))
            {{ msg_toast_success(session()->get('success_login') .' '. Auth::user()->name ) }}
        @endif
        @if(session()->has('message'))
            {{ msg_toast_success(session()->get('message')) }}
        @endif
    </div>
    @yield('content')
</div>

<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
</script>

<!-- ajax library-->
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<!-- sort Table JS-->
<script src="{{ url('js/sortTable.js') }}"></script>

<!-- Launch the Toasts -->
<script>
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    toastList.forEach(toast => toast.show())
</script>
</body>

</html>
