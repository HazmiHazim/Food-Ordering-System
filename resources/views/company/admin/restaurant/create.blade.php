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

                                <span>Item Name</span>
                                <input type="text" name="item_name" placeholder="Enter Item Name" required>
                                @foreach ($errors->get('item_name') as $error)
                                    <div class="validation-error-message">{{ $error }}</div>
                                @endforeach

                                <span>Quantity</span>
                                <input type="number" name="quantity" placeholder="Enter Product Quantity" required>
                                @foreach ($errors->get('quantity') as $error)
                                    <div class="validation-error-message">{{ $error }}</div>
                                @endforeach

                                <span>Category</span>
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
                                    <input type="hidden" name="category_id" id="category_id" value="" required>
                                </div>

                                <span>Item Price/each</span>
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

            </main>

        </section>

    </div>

@endsection
