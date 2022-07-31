<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ url('css/sideBar.css') }}" rel="stylesheet">
</head>

<body>
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
            <a class="navbar-brand mx-4" href={{route('welcomePage')}}>
                <img src={{url('images/logo_white.svg')}} alt="" style="width: 175px">
            </a>

            <div class="" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href={{route('slides.index')}}>Slider
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
            <form method="POST" class="d-flex mx-4 my-0" action="{{ route('logout') }}" >
                @csrf
                <button class="btn btn-warning">Deconnexion</button>
            </form>
        </nav>
    </header>
    <div id="wrapper">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/85c9736486.js" crossorigin="anonymous"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

</body>

</html>
