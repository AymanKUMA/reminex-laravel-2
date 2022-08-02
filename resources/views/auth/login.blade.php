<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reminex News</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Styles -->

    <!--slider js library-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
    <style>
        *{
            text-transform: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href={{ url('/') }} class="arrow animation a">
            <img src={{ url('images/arrow.png') }} alt="" style="width: 30px ">
        </a>
        <div class="left">
            <div class="loginHeader">
                <h2 class="animation a1">Bienvenue</h2>
                <h4 class="animation a2">Connecter a votre compte admin</h4>
            </div>
            <form method="POST" action={{ route('login') }} class="form">
                @csrf
                <input class="form-field animation a3" placeholder="Username" id="username" type="username"
                    class="form-control @error('username') is-invalid @enderror" name="username"
                    value="{{ old('username') }}" required autocomplete="username" autofocus>
                <input class="form-field animation a4" placeholder="Password" id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">
                @if ($errors->any())
                        <p class="animation a6" style="color: red; font-size:small;">Invalid username or password</p>
                @endif
                <button class="animation a6">LOGIN</button>
            </form>
        </div>
        <div class="right" style="background-image: url({{ url('images/login.jpg') }}); background-color: gray; background-blend-mode: multiply;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1109.41 249.39" class="logo animation a0">
                <g id="Layer_1" data-name="Layer 1">
                    <path class="cls-1"
                        d="M7231.37,7165.93c15.56-9.64,16-31.69,11.75-45.45-4.19-13.55-15.82-20.95-33.56-21.33-13.31-.29-26.64.16-40-.22-5.53-.16-7,1.77-6.88,7,.28,16.14.1,32.29.1,48.44,0,17.73.13,35.46-.1,53.18-.06,4.71,1,7.26,6.23,6.53a21.68,21.68,0,0,1,5.69,0c5.44.7,7.17-1.56,7-6.94-.39-9.48-.1-19-.1-28.49,0-2.91-.11-5.26,4.14-5.8,19.75-2.52,22.07-1.34,29.42,16.74,1.19,2.93,2.42,5.84,3.59,8.78,6.66,16.66,6.66,16.67,26.66,15.08-5.58-13.3-10.71-25.8-16.1-38.18C7227.51,7171.38,7226.86,7168.72,7231.37,7165.93Zm-5.36-28.52c-.54,12.81-6.83,18.93-19.73,19.15-2.86,0-5.71,0-8.57,0-16.22,0-16.23,0-16.22-16.41,0-6.34.18-12.68,0-19-.13-4.3,1.14-6.44,5.9-6.2,6.65.32,13.35-.2,20,.24C7220.84,7116.06,7226.61,7123.14,7226,7137.41Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7343.25,7172.21c0-11.72.3-23.45-.13-35.15-.22-6,2-8.22,7.65-7.2,3.71.67,8.19-2,11,3,1.24,2.24,3.37.19,4.9-.51,12.35-5.7,24.4-6.61,35.84,2.1,3.09,2.35,5.34,0,7.86-1,10.77-4,21.5-7.39,33.28-4.18,7.77,2.11,12.75,6.7,15.22,14.17,1.68,5.11,3.1,10.32,3.14,15.74.1,16.15-.12,32.31.21,48.45.1,5.05-1.52,7-6.46,6.42a24.15,24.15,0,0,0-5.7,0c-4.77.6-5.93-1.65-5.85-6,.22-12.35,0-24.7.11-37.05a82,82,0,0,0-1.37-15.11c-1.47-8.34-5.22-11.35-13.71-11.24a43.24,43.24,0,0,0-8.49,1c-8.87,1.93-8.84,2.53-8.65,11.6.35,17.1.08,34.21.27,51.31,0,4-1.26,5.9-5.42,5.58a39.91,39.91,0,0,0-6.65,0c-4.82.43-6.61-1.3-6.54-6.43.21-15.19-.05-30.39-.32-45.59-.12-6.36-.23-13.39-7.31-16.19-7.44-2.93-15-1.07-22.13,2.09-3.53,1.56-2.56,4.74-2.57,7.43-.07,16.47.06,32.94-.11,49.41,0,2.92,1.91,7.27-1.7,8.55-4.69,1.67-10.08,1.37-14.93,0-2.36-.66-1.37-3.91-1.38-6C7343.21,7195.65,7343.25,7183.93,7343.25,7172.21Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7675.15,7156.3c-2.83-17.55-13.33-27.4-31.6-28.2-20-.88-31.91,7.52-36.59,23.5-4.18,14.3-3.93,28.76-.07,43.09,3,11.12,10.31,18.07,21.68,20.07,13.63,2.4,27.19.47,40.56-2.17,6.61-1.3,3.38-7.21,3.41-11.09,0-4.73-3.78-3-6.35-2.6-8.83,1.33-17.72,1-26.57.71-10-.34-15.51-5.78-16.55-14.86-.43-3.78.83-5.24,4.55-5.19,7,.1,13.94,0,20.91,0v0c7,0,13.95-.15,20.91.06,4,.11,5.61-1.25,5.86-5.34C7675.68,7168.26,7676.12,7162.28,7675.15,7156.3Zm-21.63,9.48c-.82,0-1.63,0-2.45,0-3.62,0-7.24,0-10.85,0l-5.49,0h-4c-9.15-.05-9.19-.1-7.24-8.91,2.27-10.28,9.39-14.8,20.53-13.25,9.81,1.36,12.88,6.83,13.64,18.49C7657.84,7165.18,7656.08,7165.81,7653.52,7165.78Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7280.06,7179.51c7,.22,13.94.06,20.91.06h8.56c20.11,0,20.11,0,18-20.53-.07-.63-.1-1.26-.18-1.89-2.14-17.31-11.78-27.16-29.79-28.92-17.21-1.69-32.37,4.76-37.79,21.71a76.07,76.07,0,0,0,0,46.67c3,9.51,9.52,15.48,19.34,17.67,14.28,3.19,28.4.81,42.41-1.69,6.21-1.11,2.94-6.67,3.28-10.29.39-4.34-2.7-4.15-5.77-3.57-9.11,1.71-18.34,1.14-27.5.86-9.61-.3-14.82-5.47-16.15-14.23C7274.8,7181.43,7275.5,7179.36,7280.06,7179.51Zm-5-19.37c1-11.21,7.52-17.18,18.68-16.75,10.3.41,15.74,6.39,16.17,17.08.17,4.23-1.31,5.6-5.36,5.36s-8.2-.05-12.3-.05-8.22-.22-12.31.05C7275.45,7166.14,7274.7,7164,7275.05,7160.14Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7519.13,7171.74c0-11.71.24-23.42-.11-35.12-.17-5.49,1.88-7.58,7.1-6.75,4,.64,8.69-2,11.9,3.18,1.28,2.07,4-.48,5.95-1.24,8.72-3.37,17.44-5.12,26.84-2.43,7.7,2.2,12.69,6.76,15.27,14.17a68.92,68.92,0,0,1,3.38,21.47c.31,14.23-.07,28.48.3,42.7.14,5.18-1.81,6.82-6.56,6.36a20.39,20.39,0,0,0-4.75,0c-5.61.76-7.85-1.08-7.6-7.21.5-12,.15-24,.15-36.06,0-1.9,0-3.8,0-5.69-.49-18.94-8-24.26-26.25-19-5.34,1.54-7.72,3.9-7.56,9.89.42,16.76.2,33.53.05,50.3,0,2.54,1.61,6.6-2.14,7.29-4.88.89-10.16,1.43-14.93-.57-1.73-.72-1-3.43-1-5.27C7519.11,7195.78,7519.13,7183.76,7519.13,7171.74Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7754.21,7212.94c-14.2,4.09-22.51-.51-27.15-12.88-1.73-4.63-4.94-8.7-8.29-14.4-4.12,7.06-8.24,12.87-11.05,19.24-3.3,7.49-8.2,10.66-16.22,9.17-2.4-.45-5,.72-7.94-1.41,6.53-11.36,12.78-22.94,19.75-34.06,3.14-5,2.94-8.75-.15-13.67-6.86-10.93-13-22.28-20.41-35.06,6.17,0,11,.15,15.86-.05,3.59-.14,4.92,2.28,6.33,4.78,4.37,7.68,8.72,15.36,13.34,23.52,5.52-6.36,9-13.49,12.38-20.43,3.14-6.34,7.26-8.93,14.15-7.91,2.71.41,5.53.07,9.13.07-3,8.45-8.28,14.46-11.91,21.33a59.58,59.58,0,0,1-6.47,10.47c-5.44,6.57-5,12.34-.24,19.39C7742.16,7191.13,7747.83,7202,7754.21,7212.94Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7481.07,7172.48c0-12,.15-24-.07-36-.09-4.67,1-7.32,6.29-6.63a21.68,21.68,0,0,0,5.69,0c5.59-.75,6.93,1.9,6.89,7.06q-.31,35.1,0,70.2c.05,5.25-1.32,7.72-6.86,7a32,32,0,0,0-6.64,0c-4.2.36-5.44-1.55-5.38-5.56C7481.19,7196.51,7481.07,7184.5,7481.07,7172.48Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7499.77,7107.05c-.05,9.13-.05,9.13-10.4,9-8.38-.07-8.38-.07-8.3-11.06.07-8.63.07-8.63,9.85-8.55C7499.83,7096.55,7499.83,7096.55,7499.77,7107.05Z"
                        transform="translate(-6644.8 -7074.8)" />
                </g>
                <g id="Layer_5" data-name="Layer 5">
                    <path class="cls-1"
                        d="M7537.85,7270.1c3.92,6.16,8.33.39,12.81-.15,1.32-.16,2.66,0,2.73,1.72a4.93,4.93,0,0,1-.76,2.56,2.35,2.35,0,0,1-1.62.87c-12.42,1.38-11.07,10.48-10.8,19,.09,3.15,0,6.32-.08,9.48,0,1.79-.86,3-2.83,3s-2.66-1.39-2.67-3.1q-.07-15.18-.07-30.37C7534.56,7271.35,7535.15,7270.06,7537.85,7270.1Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7260.34,7288.19c0-2.22-.05-4.44,0-6.65.11-3.46-.7-7.41.71-10.24,1.72-3.44,5.55.13,8.69-.48,16.5-3.18,19.47-.43,19.5,16.59,0,5.06,0,10.13,0,15.19,0,1.86.15,4.17-2.67,4-2.62-.18-2.5-2.42-2.52-4.3-.09-6.33.17-12.68-.25-19-.54-8.09-4.17-10.41-12.11-8.53-3.85.91-6,2.71-5.79,7.15.32,6.63.11,13.29.07,19.94,0,2.16.39,4.86-3,4.69s-2.57-3-2.62-5.05C7260.27,7297.05,7260.34,7292.62,7260.34,7288.19Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7626.36,7287.82v2.84c0,16.69,0,16.69-16.74,16.44-7.36-.11-10.69-2.4-11.43-9.77-.79-7.82-.39-15.76-.55-23.65,0-2.25.76-3.7,3.22-3.55,2.8.18,2.41,2.41,2.43,4.21.09,6.31-.13,12.64.19,18.94.37,7.11,2.34,9,8.21,9,7.19-.06,9.08-2,9.17-9.68.07-6.31,0-12.63,0-18.94,0-2.21.81-3.77,3.26-3.56,2.1.17,2.16,1.94,2.17,3.52,0,4.74,0,9.48,0,14.22Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7578.67,7269.85c-13.63-3.28-21.11,3.34-21.06,18.64,0,14.6,5.09,19.67,18.49,18.59,8.86-.72,12.2-4.94,13-16.49C7590,7278.59,7586.52,7271.74,7578.67,7269.85Zm4.63,19.07c-.1,11-3.5,14.71-12.12,13.4-3.48-.52-5.83-2.11-6.8-5.64a32.25,32.25,0,0,1-.92-12.24c.87-7.46,3.61-10.31,9.8-10.37,6.61-.06,9.5,3.1,10,11.05C7583.38,7286.38,7583.3,7287.65,7583.3,7288.92Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7391.13,7269.45c-10.87-1.39-17.47,4.36-18.32,16.44-1.1,15.59,3.85,21.75,17.7,21.08,3.58-.17,10.13,2.34,10.18-2.95,0-3.92-6.32-1.44-9.74-1.55-9.35-.28-10.67-1.22-11.93-10.58,2.92-1.76,6.16-.78,9.25-.93s6.33,0,9.5-.06c2.24,0,4.67,0,5-3C7403.78,7279.89,7401.23,7270.74,7391.13,7269.45Zm-9.16,16.36c-4,.1-3.69-2.53-2.84-5.16,1.58-4.9,5.12-7.13,10.18-6.65,6.63.64,7.79,5.32,8.09,11C7392.06,7286.55,7387,7285.68,7382,7285.81Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7660.54,7270.9a17.56,17.56,0,0,0-6.36-1.62c-4.87-.47-9.36,2.95-14.63,1-2.29-.85-2.25,2.34-2.26,4.11-.06,7.25,0,14.49,0,21.74h0c0,7.87,0,15.75,0,23.62,0,1.55.33,3.29,2.5,3.16,1.83-.11,2.7-1.37,2.8-3.13.07-1.26,0-2.52.08-3.78.31-8.52.31-8.52,9.19-8.9,8.3-.36,12.23-3.14,14.08-10C7668.8,7286.77,7666.26,7273.92,7660.54,7270.9Zm-.2,24.46c-2.07,6-9.69,9.29-15.41,6.57a3.69,3.69,0,0,1-2.19-3.75c0-3.16,0-6.31,0-9.47h0a38.28,38.28,0,0,0-.05-5.67c-.86-5.84,2.47-7.84,7.45-8.53s8.61.72,10.21,6A23.53,23.53,0,0,1,7660.34,7295.36Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7326.51,7300.63a34.76,34.76,0,0,1-.69-6.51c-.12-4.42.07-8.85-.12-13.26-.37-8.31-3.38-11.39-11.66-11.56-3.76-.08-7.55.6-11.32,1-1.32.13-2.6.58-2.68,2.11-.12,2.27,1.65,2.33,3.24,2.29,3.79-.1,7.59-.58,11.35-.37s5.31,2.91,5.39,6.53c.08,4-3,3.23-5.33,3.58a91.48,91.48,0,0,0-9.35,1.51c-5.89,1.5-8.79,6.1-8,12.11s3.91,8.81,10.1,9.07c7.31.31,14.43-3.31,21.43-.17C7330.53,7303.06,7326.93,7302.61,7326.51,7300.63Zm-15.66,2c-4.53.21-7.23-1.43-7.4-6.21-.19-5.37,2.75-6.93,11.5-7.48,4.47-.28,5.57,1.41,5.11,4.9C7320.21,7300.66,7318.3,7302.29,7310.85,7302.63Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7249.37,7293.2c0-4.11.11-8.23-.08-12.33-.4-8.44-3.29-11.42-11.59-11.58a92.55,92.55,0,0,0-11.35.94c-1.29.14-2.61.65-2.63,2.18,0,2.19,1.64,2.31,3.3,2.27,4.11-.09,8.25-.5,12.31-.14,3.52.32,4.17,3.34,4.31,6.38.16,3.33-2.24,3.13-4.46,3.43a76.47,76.47,0,0,0-11.23,1.85c-5.14,1.47-7.7,6.36-6.71,12.05.89,5.18,3.36,8.73,9.29,8.88,7.64.2,15.05-3.34,23-.77C7249.45,7299.56,7249.43,7299.56,7249.37,7293.2Zm-5.67,1.76c0,5.82-3.05,8-10.19,7.71-4.31-.16-6.39-2.25-6.35-6.51.05-5.38,3.32-7.31,12.17-7.14C7244.64,7288,7243.71,7292,7243.7,7295Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7524.31,7294c0,12.76,0,12.76-13,13.1-16.46.44-21.13-3.93-22.9-20.64a62.91,62.91,0,0,1,.66-16.07c1.53-10.17,7-14.85,17.45-15.19a92.45,92.45,0,0,1,12.32.71c2.11.22,5.19.33,5,3.2-.23,3.42-3.3,1.85-5.28,1.8-3.8-.09-7.61-.6-11.39-.44-7.44.31-10.46,2.65-11.95,9.77a48.82,48.82,0,0,0,.37,23.51c2.07,7.35,15.56,12,21.43,7.46,3.5-2.72,1.37-7.09,1.75-10.72.31-3-.85-4.81-4.24-4.76-1.79,0-4.18.24-4.15-2.49,0-2.5,2.17-2.59,4.12-2.83,8.56-1,9.72,0,9.81,8.84C7524.33,7290.83,7524.32,7292.41,7524.31,7294Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7411.56,7287.84a13.38,13.38,0,0,1,0-1.9c.76-5.14-2.35-13.91,1.72-14.74,6.2-1.27,13.55-4.05,20.13-.84,3.56,1.75,6.4,1.32,9.82.15a26.68,26.68,0,0,1,8.42-1.12c5.82,0,9.46,2.7,10.46,8.78,1.35,8.19,1,16.41,1.05,24.63,0,2-.36,3.89-3,3.82s-3-1.84-3-3.91c-.08-6.64.13-13.31-.34-19.93-.58-8-8.26-11.23-15.13-6.85-2.58,1.65-1.71,3.75-1.69,5.81,0,7,.19,13.93.24,20.89,0,1.94-.16,4-2.82,4s-2.64-2.2-2.66-4.09c-.09-6.33.18-12.68-.28-19-.54-7.54-2.82-9.52-9.14-9.16-6.56.39-8.1,2.17-8.18,9.74-.07,6.33,0,12.66,0,19,0,1.65-.27,3.28-2.31,3.48-2.54.26-3.24-1.44-3.25-3.56,0-5.07,0-10.13,0-15.2Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7204,7266.05c-3.48,10-6.77,19.37-10.05,28.76-.72,2.09-1.54,4.15-2.1,6.28-.65,2.48-2,3.72-4.66,3.75-2.85,0-3.79-1.79-4.53-4-3.28-9.56-6.53-19.13-9.85-28.68-.81-2.31-1-4.92-4.59-8.21,0,7.15,0,12.82,0,18.5,0,7,0,13.9,0,20.86,0,1.72-.7,3.1-2.64,3.27-2.11.18-2.73-1.23-2.73-3q0-22.27,0-44.56c0-2.26,1.19-3.44,3.56-3.4,3.13,0,6.48-.57,7.77,3.55q2.27,7.24,4.68,14.42c2.44,7.15,4.95,14.27,7.56,21.77,2.76-.85,3-3.08,3.6-5,3.3-9.88,6.8-19.7,9.79-29.68,1.44-4.77,4.49-5.39,8.63-5.12,5.14.35,3.8,4.15,3.82,7q.15,19,0,37.93c0,2.29,1.12,5.71-2.75,5.92-4.82.25-3.27-3.76-3.32-6.22-.16-8.53.05-17.07-.12-25.6C7206.05,7272.13,7207.14,7269.21,7204,7266.05Z"
                        transform="translate(-6644.8 -7074.8)" />
                    <path class="cls-1"
                        d="M7358.19,7301.86c-3.48-.17-7-.48-10.43-.84-1.65-.18-3.06-1-3.2-2.85a3.58,3.58,0,0,1,3.14-4c1.22-.27,2.53-.08,3.79-.24,9.11-1.13,11.46-3.75,11.74-12.73.07-2.07-1.63-4.62.83-6.09,1.57-.94,4-1,3-3.62-.88-2.34-3.23-1.37-5-1.46-2.21-.12-4.43,0-6.65,0v-.25c-2.21-.15-4.42-.48-6.63-.41-11.5.38-17.11,9.65-11.48,19.72,3.69,6.61,2.9,12.44-.56,18.58-3.31,5.86-2,12.54,3.42,14.59a27.08,27.08,0,0,0,21.28-.38c5-2.28,6.35-6.82,5.69-11.94S7363.41,7302.11,7358.19,7301.86Zm-9.13-28.07c5.42-.13,8.44,2.54,8.62,7.63s-2.63,8-8,8.1-8.59-2.47-8.71-7.48S7343.84,7273.92,7349.06,7273.79ZM7358,7318c-2.33,1-4.69,1.84-7.3,1.53a12.14,12.14,0,0,1-7.25-1.62,5.69,5.69,0,0,1-2.56-7.33c1.82-5.13,6.22-4.58,10.31-4.12,3.76.42,8.78-1.36,10,4.47C7361.79,7313.77,7361.2,7316.56,7358,7318Z"
                        transform="translate(-6644.8 -7074.8)" />
                </g>
                <g id="Layer_4" data-name="Layer 4">
                    <path class="cls-2"
                        d="M6987.16,7240.4c18.13-18.19,35.12-35.22,52.08-52.27,4.72-4.74,10.79-6.64,17.08-7.54,11.31-1.61,21.06,4.93,24.85,15.68,8.58,24.4-3.46,47.72-18.74,58-20.17,13.58-45.36,12.34-63.37-3.12C6995.22,7247.85,6991.55,7244.37,6987.16,7240.4Z"
                        transform="translate(-6644.8 -7074.8)" />
                </g>
                <g id="Layer_2" data-name="Layer 2">
                    <path class="cls-2"
                        d="M7041.05,7149.1a1.57,1.57,0,0,0-.69-.51c-16.38-1.72-29.95,2.48-41.92,15-26.95,28.15-55,55.24-82.55,82.82-13.67,13.68-29.54,20.08-49.08,16s-32-15.83-38.17-34.37c-6.5-19.58-1.49-36.81,12.07-51.76,5.52-6.09,11.67-11.62,17.54-17.4,1.47-1.44,10.1-10.4,12.21-12.49q30.38-30.15,60.54-60.51c6-6,12.68-10.27,21.45-11,10.69-.85,18.86,3.42,26.17,10.87,18.21,18.56,36.72,36.82,55.07,55.23,2.13,2.13,4.11,4.41,5.86,6.36a5.34,5.34,0,0,0,1.48,1C7041.87,7148.86,7040.46,7150,7041.05,7149.1Z"
                        transform="translate(-6644.8 -7074.8)" />
                </g>
                <g id="Layer_3" data-name="Layer 3">
                    <path class="cls-2"
                        d="M6822,7159.27c-22.4,22.83-45.1,45.38-67.68,68-7.16,7.17-14.2,14.46-21.54,21.44-21,20-53.18,19.93-72.91.08-20.31-20.43-20.2-52.16.71-73.32,30.09-30.43,60.71-60.35,90.61-91,11.46-11.74,32.33-13.3,45-.19,20.24,21,41.18,41.3,61.84,61.88,1.31,1.3,2.34,2.33,3.22,3.09C6846.41,7147.15,6833.23,7147.85,6822,7159.27Z"
                        transform="translate(-6644.8 -7074.8)" />
                </g>
            </svg>
        </div>
    </div>
</body>

</html>
