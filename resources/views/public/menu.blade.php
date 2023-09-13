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

                        @foreach ($menu as $menu)
                            <div class="item">
                                <img src="{{ $menu->image }}" alt="test">
                                <span class="food-name">{{ $menu->name }}</span>
                                <span class="price">RM {{ $menu->price }}</span>
                                <button type="button" class="add-to-cart" data-food-id="{{ $menu->id }}" 
                                    data-food-image="{{ $menu->image }}" data-food-name="{{ $menu->name }}" 
                                    data-food-price="{{ $menu->price }}">
                                    <i class='bx bx-plus'></i>
                                    <span>Add to Cart</span>
                                </button>
                            </div>
                        @endforeach

                    </div>

                </div>

            </main>

            @include('public.modal.success-message');

        </div>

    </section>

@endsection
