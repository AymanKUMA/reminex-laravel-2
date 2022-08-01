<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!--    bootstrap   -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!--   font-awsome JS-->
    <script src="https://kit.fontawesome.com/85c9736486.js" crossorigin="anonymous"></script>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
</head>

<body>
    {{-- <header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
            <div class="container-fluid">
                <a class="navbar-brand mx-4" href={{ route('welcomePage') }}>
                    <img src={{ url('images/logo_white.svg') }} alt="" style="width: 175px">
                </a>

                <div class="" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href={{ route('slides.index') }}>Slider
                                <hr>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Alert
                                <hr>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Views
                                <hr>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home
                                <hr>
                            </a>

                        </li>


                    </ul>

                </div>
                <div class="dropdown user-name">
                    <span class="pe-3 text-light d-sm-flex d-none">{{ Auth::user()->name }}</span>
                    <a href="#" class="d-block link-dark text-decoration-none rounded-circle" style="width: 48px;height: 48px; background-color: #fff;"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        <img src={{url('/images/user.png')}} alt="mdo" width="48" height="48"
                            class="rounded-circle border border-light border-3">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-smaller">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-address-card"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider ">
                        </li>
                        <li>
                            <form method="POST" class="d-flex mx-4 my-0" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-warning">Deconnexion</button>
                            </form>
                        </li>
                    </ul>
                </div>

                <button class="navbar-toggler mx-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" style="background-color: var(--main-color) "
                    aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon" style="color: var(--main-color)"></span>
                </button>
            </div>
        </nav>
    </header> --}}

    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src={{ url('images/logo_white.svg') }} alt="" style="width: 175px">
                </a>

                <div class="offcanvas text-bg-dark offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <img src="images/logo.svg" alt="" style="width: 175px">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body justify-content-center">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Home
                                    <hr>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href={{ route('slides.index') }}>Slider
                                    <hr>
                                </a>

                            </li>

                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ route('alerts.index') }}">Alerts
                                    <hr>
                                </a>

                            </li>

                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="#">Users
                                    <hr>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="d-inline-flex">
                    <div class="dropdown user-name">

                        <span class="pe-3 text-light d-sm-flex d-none">Mehdi Moulati</span>
                        <a href="#" class="d-block link-dark text-decoration-none"
                            style="width: 48px;height: 48px" data-bs-toggle="dropdown" aria-expanded="false">

                            <img src={{ url('/images/user.png') }} alt="mdo" width="48" height="48"
                                class="rounded-circle border border-light border-3">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-smaller">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-address-card"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-screwdriver-wrench"></i>
                                    Settings
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

    @yield('content')

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
    <script src="js/sortTable.js"></script>

    <!-- Launch the Toasts -->
    <script>
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl)
        })
        toastList.forEach(toast => toast.show())
    </script>
</body>

</html>
