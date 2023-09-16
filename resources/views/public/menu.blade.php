@extends('main')

@section('title', 'Menu')

@section('content')

    <div class="menu-page">

        <section>

            <main>

                <div class="page">

                    @if ($menu->isEmpty())

                    <div class="container-empty">
                        <i class='bx bxs-error-alt'></i>
                            <div class="text">
                                <span class="top">Sorry, no menu available at the moment.</span>
                                <span class="bottom">Please check back later!</span>
                            </div>
                    </div>

                    @else

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

                    @endif

                </div>

            </main>

            @include('public.modal.success-message');

        </section>

    </div>

@endsection
