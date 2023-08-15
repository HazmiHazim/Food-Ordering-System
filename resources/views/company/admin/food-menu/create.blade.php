@extends('company.admin.main')

@section('title', 'Create')

@section('content')

    <div class="food-menu-create">

        <section>

            <main>

                <div class="header">
                    <div class="left">
                        <h1>Add New Menu</h1>
                    </div>
                </div>

                <div class="top-section">

                    <form action="/" method="POST">
                        @csrf

                        <div class="form-add-menu">

                            <span>Food Name</span>
                            <input type="text" name="food_name" placeholder="Enter food name" value="{{ old('food_name') }}" required>

                            <span>Food Description</span>
                            <input type="text" name="food_description" placeholder="Enter food name" value="{{ old('food_description') }}" required>

                            <span>Price</span>
                            <input type="text" name="price" placeholder="Enter food name" value="{{ old('price') }}" required>

                            <span>Food Category</span>
                            <div class="dropdown">
                                <div class="select">
                                    <span class="selected">Beverages</span>
                                    <div class="caret"></div>
                                </div>
                                <ul class="menu">
                                    <li>test1</li>
                                    <li>tes2</li>
                                    <li>test3</li>
                                </ul>
                            </div>

                            <span>Food Image</span>
                            <input type="file" name="image" value="{{ old('food_name') }}" required>

                            <div class="menu-button">
                                <input type="submit" value="Add Menu">
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                    <form action="/" method="POST">
                        @csrf

                        <div class="form-category">
                            <span>Add New Category</span>
                            <input type="text" name="category" value="{{ old('category') }}" required>
                            @foreach ($errors->get('category') as $category)
                                <div class="error-message">{{ $category }}</div>
                            @endforeach
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                </div>

                <div class="bottom-section">

                </div>

            </main>

        </section>

    </div>

@endsection
