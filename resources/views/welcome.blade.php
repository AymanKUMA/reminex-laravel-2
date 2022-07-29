<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="30">

    <title>Reminex News</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Styles -->

    <!--slider js library-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

</head>

<body>

    <!-- intro animation  -->

    {{-- <div class="intro-animation">
        <span class="animate">
            <img class="logoanimate" src={{url("/images/logo.svg")}} alt="" style="width: 100%;">
        </span>
        <h1 class="bienv">bienvenue</h1>
    </div> --}}

    <header class="header">
        <nav class="navbar">
            <a href="#">
                <marquee width="100%" direction="left">
                    this is a sample text that shows the latest notifications about reminex direction
                </marquee>
            </a>
        </nav>
        <div class="logoContainer">
            <a href="#" class="logo"><img src="{{ url('images/logo.svg') }}" alt=""></a>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="button">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="button">Connexion</a>
                    @endauth
                </div>
            @endif
    </header>
    <section class="home" id="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide fade">
                    <div class="box" style="background: url({{ url('images/innoverpour.jpg') }}) no-repeat;">
                        <div class="content">
                            <h3>Hello world</h3>
                            <span>Welcome</span>
                            <p>this is REMINEX direction dynamic slider, here you can see the latest news within our
                                company. stay tuned for news</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src={{url("js/script.js")}}></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"
        integrity="sha512-1dalHDkG9EtcOmCnoCjiwQ/HEB5SDNqw8d4G2MKoNwjiwMNeBAkudsBCmSlMnXdsH8Bm0mOd3tl/6nL5y0bMaQ=="
        crossorigin="anonymous"></script>
</body>

</html>
