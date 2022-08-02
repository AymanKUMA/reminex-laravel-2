<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (count($slides) > 4)
        <meta http-equiv="refresh" content="{{ count($slides) * 15 }}">
    @else
        <meta http-equiv="refresh" content="60">
    @endif

    <title>Reminex News</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Styles -->

    <!--slider js library-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

</head>

<body style="background-color: black;">

    <!-- intro animation  -->

    <div class="intro-animation">
        <span class="animate">
            <img class="logoanimate" src={{ url('/images/logo.svg') }} alt="" style="width: 100%;">
        </span>
        <h1 class="bienv">bienvenue</h1>
    </div>

    <header class="header" style="background-color: rgba(255, 255, 255, 0.5); padding_buttom : 10px">
        <nav class="navbar">
            <a href="#">
                <marquee width="100%" direction="left">
                    @unless(count($alerts) == 0)
                        @foreach ($alerts as $alert)
                            {{ $alert->alert }}&nbsp;&nbsp;&nbsp;&nbsp;
                        @endforeach
                    @else
                        this is a sample text that shows the latest notifications about reminex direction
                    @endunless
                </marquee>
            </a>
        </nav>

        <div class="logoContainer">
            <a href="#" class="logo"><img src="{{ url('images/logo.svg') }}" alt=""></a>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ route('slides.index') }}" class="button">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="button">Connexion</a>
                    @endauth
                </div>
            @endif
        </div>
    </header>


    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">
                @unless(count($slides) == 0)
                    @foreach ($slides as $slide)
                        @if ($slide->layout == 'left')
                            <div class="swiper-slide fade">
                                <div class="box"
                                    style="background: url({{ url('slides_images/' . $slide->image_path) }}); no-repeat;">
                                    <div class="content">
                                        <h3>{{ $slide->title }}</h3>
                                        <span>{{ $slide->subtitle }}</span>
                                        <p>{{ $slide->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="swiper-slide fade">
                                <div class="box"
                                    style="background: url({{ url('slides_images/' . $slide->image_path) }}); no-repeat;">
                                    <div class="content">
                                        <h3>{{ $slide->title }}</h3>
                                        <span>{{ $slide->subtitle }}</span>
                                        <p>{{ $slide->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
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
                @endunless
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>
    </section>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"
        integrity="sha512-1dalHDkG9EtcOmCnoCjiwQ/HEB5SDNqw8d4G2MKoNwjiwMNeBAkudsBCmSlMnXdsH8Bm0mOd3tl/6nL5y0bMaQ=="
        crossorigin="anonymous"></script>
    <script>
        var swiper = new Swiper(".home-slider", {
            effect: "coverflow",
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            Shader: 'polygons-fall',
            grabCursor: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });


        const tl = gsap.timeline({
            defaults: {
                ease: "back.out"
            }
        });

        const splitText = (selector) => {
            const elem = document.querySelector(selector);
            const text = elem.innerText;
            const chars = text.split("");
            const charsContainer = document.createElement("div");
            const charsArray = [];

            charsContainer.style.position = "relative";
            charsContainer.style.display = "inline-block";

            chars.forEach((char) => {
                const charContainer = document.createElement("div");

                charContainer.style.position = "relative";
                charContainer.style.display = "inline-block";
                charContainer.innerText = char;
                charsContainer.appendChild(charContainer);

                charsArray.push(charContainer);
            });
            // remove current text
            elem.innerHTML = "";
            // append new structure
            elem.appendChild(charsContainer);

            return charsArray;
        };

        const animate = function(text) {
            const chars = splitText("h1");
            return gsap.from(chars, {
                duration: 0.2,
                y: 100,
                opacity: 0,
                stagger: 0.1,
                delay: 0.25
            });
        };

        tl.to(".logoanimate", {
            y: "0",
            duration: 0.3
        });

        animate("h1");

        tl.to(".intro-animation", {
            'opacity': "0",
            duration: 0.5,
            delay: 2
        });
        tl.to(".intro-animation", {
            'display': "none",
            duration: 0.1,
        });
    </script>
</body>
