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
                        <h1>Create Food Menu</h1>
                    </div>
                </div>

                <div class="top-section">

                    <form action="{{ route('food-menu.store') }}" method="POST" enctype="multipart/form-data" id="imageForm">
                        @csrf

                        <div class="form-add-menu">

                            <div class="header">
                                <h4>Food Menu Details</h4>
                            </div>

                            <span class="star">Food Name</span>
                            <input type="text" name="food_name" placeholder="Enter food name"
                                value="{{ old('food_name') }}" required>
                            @foreach ($errors->get('food_name') as $name)
                                <div class="validation-error-message">{{ $name }}</div>
                            @endforeach

                            <span class="star">Food Description</span>
                            <input type="text" name="food_description" placeholder="Enter food description"
                                value="{{ old('food_description') }}" required>
                            @foreach ($errors->get('food_description') as $description)
                                <div class="validation-error-message">{{ $description }}</div>
                            @endforeach

                            <span class="star">Price</span>
                            <input type="text" name="price" placeholder="Enter food price" value="{{ old('price') }}"
                                required>

                            <span class="star">Food Category</span>
                            <div class="dropdown">
                                <div class="select">
                                    <span class="selected">Select Category</span>
                                    <div class="caret"><i class='bx bx-chevron-down'></i></div>
                                </div>
                                <ul class="menu">
                                    @foreach ($newCategory as $category)
                                        <li data-value="{{ $category->id }}">{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                                <input type="hidden" name="category_id" value="" required>
                            </div>

                            <div class="low"><span class="star">Food Image</span></div>
                            <div class="drag-area">
                                <i class='bx bxs-cloud-upload'></i>
                                <h2 class="drag-text">Drag and drop to upload image</h2>
                                <input type="file" hidden class="select-image-input" name="image" accept="image/*" required>
                            </div>
                            @foreach ($errors->get('image') as $image)
                                <div class="validation-error-message">{{ $image }}</div>
                            @endforeach

                            <div class="button-menu">
                                <input type="submit" value="Add Menu">
                                <a href="{{ route('food-menu') }}"><span>Cancel</span></a>
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                    <form action="{{ route('food-category') }}" method="POST">
                        @csrf

                        <div class="form-category">

                            <div class="header">
                                <h4>Food Category Details</h4>
                            </div>

                            <span>Food Category</span>
                            <input type="text" name="new_category" placeholder="Enter new food category"
                                value="{{ old('category') }}" required>
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
                            <form action="{{ route('food-menu-search-create') }}" method="GET" id="search-form">
                                <div class="search-field">
                                    <i class='bx bx-search' id="search-button"></i>
                                    <input type="text" name="search" placeholder="Search" value="{{ old('search') }}">
                                </div>
                            </form>
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
                                        <td>
                                            <form action="{{ route('food-category-delete', ['id' => $category->id]) }}" method="POST" id="deleteForm">
                                                @method('DELETE')

                                                @csrf

                                                <button type="button" class="delete-button-popup">
                                                    <i class='bx bxs-trash-alt'></i>
                                                    <span>Delete</span>
                                                </button>

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pagination">
                            <div class="count">Showing {{ $newCategory->firstItem() }} to {{ $newCategory->lastItem() }}
                                out of {{ $newCategory->total() }} results</div>
                            <div class="pagination-number">
                                <div class="page-number">{{ $newCategory->render('company.partials.paginator') }}</div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="delete-confirmation" id="deletePopup">
                    <i class='bx bxs-info-circle'></i>
                    <h1>Warning</h1>
                    <h3>Are you sure you want to delete this Category?</h3>
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
