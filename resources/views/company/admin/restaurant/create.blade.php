@extends('company.admin.main')

@section('title', 'Create')

@section('content')

    <div class="restaurant-create">

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

                @error('error-message')
                    <div class="error-message left-red">
                        <i class='bx bxs-x-circle'></i>
                        <div class="text">
                            <span>Error</span>
                            <span class="message">{{ $message }}</span>
                        </div>
                    </div>
                @enderror

                <div class="header">
                    <div class="left">
                        <h1>Create New Item</h1>
                    </div>
                </div>

                <div class="form-section">

                    <div class="form-item-create">

                        <form action="{{ route('restaurant.store') }}" method="POST">
                            @csrf

                            <div class="header">
                                <h4>Item Details</h4>
                            </div>

                            <div class="form-input">

                                <span class="star">Item Name</span>
                                <input type="text" name="item_name" placeholder="Enter Item Name" required>
                                @foreach ($errors->get('item_name') as $error)
                                    <div class="validation-error-message">{{ $error }}</div>
                                @endforeach

                                <span class="star">Quantity</span>
                                <input type="number" name="quantity" placeholder="Enter Product Quantity" required>
                                @foreach ($errors->get('quantity') as $error)
                                    <div class="validation-error-message">{{ $error }}</div>
                                @endforeach

                                <span class="star">Category</span>
                                <div class="dropdown">
                                    <div class="select">
                                        <span class="selected">Select Category</span>
                                        <div class="caret"><i class='bx bx-chevron-down'></i></div>
                                    </div>
                                    <ul class="menu">
                                        @foreach ($itemCategory as $category)
                                            <li data-value="{{ $category->id }}">{{ $category->name }}</li>
                                        @endforeach
                                    </ul>
                                    <input type="hidden" name="category_id" value="" required>
                                </div>

                                <span class="star">Item Price/each</span>
                                <input type="text" name="item_price" placeholder="Enter Product Price" required>
                                @foreach ($errors->get('item_price') as $error)
                                    <div class="validation-error-message">{{ $error }}</div>
                                @endforeach

                            </div>

                            <div class="button">
                                <input type="submit" value="Add Item">
                                <a href="{{ route('restaurant') }}"><span>Cancel</span></a>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        </form>

                    </div>


                    <div class="form-category-create">

                        <form action="{{ route('item-category') }}" method="POST">

                            @csrf

                            <div class="header">
                                <h4>Item Category</h4>
                            </div>

                            <div class="form-input">
                                <span>Item Category Name</span>
                                <input type="text" name="item_category_name" placeholder="Enter New Item Category">
                            </div>

                            <div class="button">
                                <input type="submit" value="Add Item Category">
                                <a href="{{ route('restaurant') }}"><span>Cancel</span></a>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        </form>

                    </div>

                </div>

                <div class="table-section">

                    <div class="item-category">

                        <div class="header">
                            <i class='bx bx-category'></i>
                            <h3>Item Category</h3>
                            <form action="/" method="GET" id="search-form">
                                <div class="search-field">
                                    <i class='bx bx-search' id="search-button"></i>
                                    <input type="text" name="search" placeholder="Search" value="{{ old('search') }}">
                                </div>
                            </form>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Category Name</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($itemCategory as $category)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>
                                            <form action="{{ route('item-category-delete', ['id' => $category->id]) }}" method="POST" id="deleteForm">
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
                            <div class="count">Showing {{ $itemCategory->firstItem() }} to {{ $itemCategory->lastItem() }}
                                out of {{ $itemCategory->total() }} results</div>
                            <div class="pagination-number">
                                <div class="page-number">{{ $itemCategory->render('company.partials.paginator') }}</div>
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
