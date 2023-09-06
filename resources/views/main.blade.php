<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>@yield('title', 'Hash Restaurant')</title>
</head>
<body>
    
    <section>
        <nav>
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="images/logo.png" alt="Hash Restaurant Logo">
                </a>
            </div>

            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="#">Staff</a></li>
                <li><a href="#">Order</a></li>
            </ul>

            <div class="icon">
                <i class="fa-solid fa-magnifying-glass"></i>
                <!-- TO BE EDITED -->
                <a href="{{ route('login') }}">
                    <i class="fa-solid fa-building"></i>
                </a>
            </div>
        </nav>

        @yield('content')

    </section>
    
</body>
</html>