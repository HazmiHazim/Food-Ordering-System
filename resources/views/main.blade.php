<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <title>@yield('title', 'Home')</title>
</head>

<body>

    <div class="topbar">

        <div class="container">

            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Hash Logo">
                <span>Hash Restaurant</span>
            </div>

            <div class="nav-page">

                <div class="{{ request()->routeIs(['home']) ? 'active' : '' }}">
                    <a href="{{ route('home') }}"><span>Home</span></a>
                </div>

                <div class="{{ request()->routeIs(['menu']) ? 'active' : '' }}">
                    <a href="{{ route('menu') }}"><span>Menu</span></a>
                </div>

                <div class="promotions">
                    <a href="#"><span>Promotions</span></a>
                </div>

                <div class="reservation">
                    <a href="#"><span>Reservation</span></a>
                </div>

            </div>

            <div class="manage">
                <div class="search">
                    <i class='bx bx-search'></i>
                </div>

                <div class="cart">
                    <i class='bx bx-cart'></i>
                </div>

                <div class="company">
                    <a href="{{ route('login') }}"><i class='bx bx-buildings'></i></a>
                </div>
            </div>

        </div>

    </div>

    @yield('content')

    <div class="footer">

        <div class="container">

            <div class="more">
                <a href="#">About us</a>
                <a href="#">Ask question</a>
                <a href="#">Contact us</a>
            </div>

            <div class="location">
                <span>Location</span>
            </div>

            <div class="social-page">
                <div class="social-media">
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                    <a href="#"><i class='bx bxl-facebook-circle' ></i></a>
                    <a href="#"><i class='bx bxl-twitter' ></i></a>
                    <a href="#"><i class='bx bxl-instagram-alt' ></i></a>
                </div>
                <div class="project">
                    <a href="https://github.com/HazmiHazim" target="_blank"><i class='bx bxl-github' ></i></a>
                    <a href="https://www.linkedin.com/in/hazmihazim/" target="_blank"><i class='bx bxl-linkedin-square' ></i></a>
                </div>
            </div>
        </div>

        <div class="copyright">
            <span>© COPYRIGHT 2023 HAZMI HAZIM - ALL RIGHTS RESERVED</span>
        </div>

    </div>

    <script src="{{ asset('js/public.js') }}"></script>

</body>

</html>
