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
                    <span class="cart-quantity">0</span>
                </div>

                <div class="company">
                    <a href="{{ route('login') }}"><i class='bx bx-buildings'></i></a>
                </div>
            </div>

        </div>

    </div>

    <div class="cart-section">
        <div class="header">
            <span>Confirm Order</span>
            <div class="close-cart">
                <i class='bx bx-x'></i>
            </div>
        </div>

        <div class="your-order">
            <span>Your Order</span>
            <div class="cart-total">
                <span>Total (1 item)</span>
                <span>RM 250.90</span>
            </div>
            <ul class="cart-list">
                <li>
                    <div class="product">
                        <img src="{{ asset('images/pasta.png') }}" alt="pasta">
                        <span>Product Name</span>
                    </div>
                    <div class="quantity-price">
                        <span>5</span>
                        <span>RM 50.00</span>
                    </div>
                    <div class="action">
                        <button type="button" class="minus">-</button>
                        <span>5</span>
                        <button type="button" class="plus">+</button>
                    </div>
                    <div class="delete">
                        <button type="button" class="cart-list-delete">
                            <i class='bx bxs-trash' ></i>
                        </button>
                    </div>
                </li>
                <li>
                    <div class="product">
                        <img src="{{ asset('images/pasta.png') }}" alt="pasta">
                        <span>Product Name</span>
                    </div>
                    <div class="quantity-price">
                        <span>5</span>
                        <span>RM 50.00</span>
                    </div>
                    <div class="action">
                        <button type="button" class="minus">-</button>
                        <span>5</span>
                        <button type="button" class="plus">+</button>
                    </div>
                    <div class="delete">
                        <button type="button" class="cart-list-delete">
                            <i class='bx bxs-trash' ></i>
                        </button>
                    </div>
                </li>
                <li>
                    <div class="product">
                        <img src="{{ asset('images/pasta.png') }}" alt="pasta">
                        <span>Product Name</span>
                    </div>
                    <div class="quantity-price">
                        <span>5</span>
                        <span>RM 50.00</span>
                    </div>
                    <div class="action">
                        <button type="button" class="minus">-</button>
                        <span>5</span>
                        <button type="button" class="plus">+</button>
                    </div>
                    <div class="delete">
                        <button type="button" class="cart-list-delete">
                            <i class='bx bxs-trash' ></i>
                        </button>
                    </div>
                </li>
            </ul>
        </div>

        <div class="cart-button">
            <span>Please make sure your purchase before confirm the order.</span>
            <button type="button" class="confirm-order"><span>Confirm Order</span></button>
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
