@extends('company.admin.main')

@section('title', 'Create')

@section('content')

    <div class="food-menu-create">

        <section>

            <main>

                @if (session('success-message'))
                    <div class="success-message">
                        <i class='bx bxs-check-circle'></i>
                        <div class="text">
                            <span>Success</span>
                            <span class="message">{{ session('success-message') }}</span>
                        </div>
                    </div>
                @endif

                <div class="header">
                    <div class="left">
                        <h1>Create</h1>
                    </div>
                </div>

                <div class="top-section">

                    <form action="{{ route('food-menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-add-menu">

                            <div class="header">
                                <h4>Food Menu Details</h4>
                            </div>

                            <span class="star">Food Name</span>
                            <input type="text" name="food_name" placeholder="Enter food name" value="{{ old('food_name') }}" required>
                            @foreach ($errors->get('food_name') as $name)
                                <div class="error-message">{{ $name }}</div>
                            @endforeach

                            <span class="star">Food Description</span>
                            <input type="text" name="food_description" placeholder="Enter food description" value="{{ old('food_description') }}" required>
                            @foreach ($errors->get('food_description') as $description)
                                <div class="error-message">{{ $description }}</div>
                            @endforeach

                            <span class="star">Price</span>
                            <input type="text" name="price" placeholder="Enter food price" value="{{ old('price') }}"
                                required>

                            <span class="star">Food Category</span>
                            <div class="dropdown">
                                <div class="select">
                                    <span class="selected">Select Category</span>
                                    <div class="caret"></div>
                                </div>
                                <ul class="menu">
                                    @foreach ($newCategory as $category)
                                        <li data-value="{{ $category->id }}">{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <input type="hidden" name="category_id" id="category_id" value="">

                            <div class="low"><span class="star">Food Image</span></div>
                            <input type="file" name="image" accept="image/*" required>

                            <div class="button-menu">
                                <input type="submit" value="Add Menu">
                                <a href="{{ route('food-menu') }}"><span>Cancel</span></a>
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                    <form action="{{ route('category') }}" method="POST">
                        @csrf

                        <div class="form-category">

                            <div class="header">
                                <h4>Food Category Details</h4>
                            </div>

                            <span>Food Category</span>
                            <input type="text" name="new_category" placeholder="Enter new food category" value="{{ old('category') }}" required>
                            @foreach ($errors->get('new_category') as $category)
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
                                @foreach ($newCategory as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td><span><i class='bx bxs-trash-alt' ></i>Delete</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

            </main>

        </section>

    </div>

@endsection
