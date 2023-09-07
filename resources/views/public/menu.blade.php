@extends('main')

@section('title', 'Menu')

@section('content')

    <section>

        <div class="menu-page">

            <main>

                <div class="container">

                    <div class="title">
                        <h1>Classic</h1>
                        <i class='bx bx-filter'></i>
                    </div>

                    <div class="food-item">
                        <div class="item">
                            <img src="{{asset('images/pizza.jpg')}}" alt="test">
                            <span class="food-name">Title</span>
                            <span class="price">RM 20.50</span>
                            <button type="button" class="add-to-cart">
                                <i class='bx bx-plus'></i>
                                <span>Add to Cart</span>
                            </button>
                        </div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                    </div>

                </div>

                <div class="container">

                    <div class="title">
                        <h1>Beverages</h1>
                        <i class='bx bx-filter'></i>
                    </div>

                    <div class="food-item">
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                    </div>

                </div>

                <div class="container">

                    <div class="title">
                        <h1>Side Dish</h1>
                        <i class='bx bx-filter'></i>
                    </div>

                    <div class="food-item">
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                        <div class="item"><img src="{{asset('images/pizza.jpg')}}" alt="test"></div>
                    </div>

                </div>

            </main>

        </div>

    </section>

@endsection
