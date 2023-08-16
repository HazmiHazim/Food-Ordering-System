@extends('company.admin.main')

@section('title', 'Create')

@section('content')

    <div class="food-menu-create">

        <section>

            <main>

                <div class="header">
                    <div class="left">
                        <h1>Create</h1>
                    </div>
                </div>

                <div class="top-section">

                    <form action="/" method="POST">
                        @csrf

                        <div class="form-add-menu">

                            <div class="header">
                                <h4>Food Menu Details</h4>
                            </div>

                            <span class="star">Food Name</span>
                            <input type="text" name="food_name" placeholder="Enter food name" value="{{ old('food_name') }}"
                                required>

                            <span class="star">Food Description</span>
                            <input type="text" name="food_description" placeholder="Enter food description"
                                value="{{ old('food_description') }}" required>

                            <span class="star">Price</span>
                            <input type="text" name="price" placeholder="Enter food price" value="{{ old('price') }}"
                                required>

                            <span class="star">Food Category</span>
                            <div class="dropdown">
                                <div class="select">Select Category</div>
                                <ul class="menu">
                                    <li>test1</li>
                                    <li>tes2</li>
                                    <li>test3</li>
                                </ul>
                            </div>

                            <span class="star">Food Image</span>
                            <input type="file" name="image" value="{{ old('food_name') }}" required>

                            <div class="button-menu">
                                <input type="submit" value="Add Menu">
                                <a href="{{ route('food-menu') }}"><span>Cancel</span></a>
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                    <form action="/" method="POST">
                        @csrf

                        <div class="form-category">

                            <div class="header">
                                <h4>Food Category Details</h4>
                            </div>

                            <span>Food Category</span>
                            <input type="text" name="category" placeholder="Enter new food category" value="{{ old('category') }}" required>
                            @foreach ($errors->get('category') as $category)
                                <div class="error-message">{{ $category }}</div>
                            @endforeach
                        </div>

                        <div class="button-category">
                            <input type="submit" value="Add Category">
                            <a href="{{ route('food-menu') }}"><span>Cancel</span></a>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                </div>

                <div class="bottom-section">

                    <div class="food-category">

                        <div class="header">
                            <i class='bx bx-category'></i>
                            <h3>Food Category</h3>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category Name</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Beverages</td>
                                    <td>20 Aug 2023</td>
                                    <td>Delete</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </main>

        </section>

    </div>

@endsection
