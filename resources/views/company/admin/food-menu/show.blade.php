@extends('company.admin.main')

@section('title', 'Show')

@section('content')

    <div class="food-menu-show">

        <section>

            <main>

                @if (session('success-message'))
                    <div class="success-message left-green">
                        <i class='bx bxs-check-circle'></i>
                        <div class="text">
                            <span>Success</span>
                            <span class="message">{{ session('success-message') }}</span>
                        </div>
                    </div>
                @endif

                <div class="header">
                    <div class="left">
                        <h1>Show Food Menu</h1>
                    </div>
                </div>

                <div class="show-section">

                    <div class="container">

                        <div class="image">
                            <img src="{{ asset($menu->image) }}" alt="food image">
                        </div>

                        <div class="details">
                            <h2>{{ $menu->name }}</h2>
                            <span class="category">{{ $menu->category_id }}</span>
                            <span class="price">RM {{ $menu->price }}</span>
                            <span class="description">{{ $menu->description }}</span>
                        </div>

                    </div>

                </div>

                <form action="{{ route('food-menu.destroy', $menu->id) }}" method="POST" id="deleteForm">

                    @method('DELETE')

                    @csrf

                    <div class="button">
                        <a href="{{ route('food-menu-edit', ['food_menu' => $menu->id]) }}"><span>Edit</span></a>
                        <button type="button" class="delete-button-popup">Delete</button>
                        <a href="{{ route('food-menu') }}"><span>Cancel</span></a>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

                <div class="delete-confirmation" id="deletePopup">
                    <i class='bx bxs-info-circle'></i>
                    <h1>Warning</h1>
                    <h3>Are you sure you want to delete this staff?</h3>
                    <p>Once deleted, you will not be able to recover this data!</p>
                    <div class="button">
                        <button class="close-popup">Cancel</button>
                        <button class="confirm-delete">Delete</button>
                    </div>
                </div>

            </main>

        </section>

    </div>

@endsection
