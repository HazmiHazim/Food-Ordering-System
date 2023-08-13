@extends('main')

@section('title', 'Home')

@section('content')

    <div class="home">

        <div class="home_header">
            <h1>New<span>Food</span></h1>
        </div>
        <div class="home_image">
            <img src="images/pasta.png" alt="New Food Image">
        </div>
    </div>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Praesent vitae mauris quam. Aliquam sed sapien quis sapien congue efficitur. Nullam molestie velit ac sem molestie
        aliquet.
        Praesent vitae mauris quam. Aliquam sed sapien quis sapien congue efficitur. Nullam molestie velit ac sem molestie
        aliquet.
    </p>

    <div class="home_button">
        <a href="#">Order Now</a>
        <i class="fa-solid fa-angle-right"></i>
    </div>

@endsection