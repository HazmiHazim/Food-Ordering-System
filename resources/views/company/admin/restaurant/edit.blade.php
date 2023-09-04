@extends('company.admin.main')

@section('title', 'Edit')

@section('content')

    <div class="restaurant-edit">

        <section>

            <main>

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
                        <h1>Edit Restaurant Item</h1>
                    </div>
                </div>

                <form action="{{ route('restaurant.update', $item->id) }}" method="POST">

                    @method('PUT')

                    @csrf

                    <div class="edit-section">

                        <div class="container">

                            <div class="header">
                                <h3>Edit {{ $item->item_name }}</h3>
                            </div>

                            <div class="details">
                                <div class="label">
                                    <span>Item Name</span>
                                    <span>Quantity</span>
                                    <span>Item Category</span>
                                    <span>Item Price/Each</span>
                                </div>

                                <div class="input">
                                    <input type="text" name="item_name" placeholder="{{ $item->item_name }}">
                                    <input type="number" name="quntity" placeholder="{{ $item->quantity }}">
                                    <div class="dropdown">
                                        <div class="select">
                                            <span class="selected">{{ $category->name }}</span>
                                            <div class="caret"><i class='bx bx-chevron-down'></i></div>
                                        </div>
                                        <ul class="menu">
                                            <li data-value="{{ $category->id }}">{{ $category->name }}</li>
                                        </ul>
                                        <input type="hidden" name="category_id"  value="">
                                    </div>
                                    <input type="text" name="price" placeholder="{{ $item->price }}">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="button">
                        <input type="submit" value="Update Item">
                        <a href="{{ route('restaurant-show', $item->id) }}"><span>Cancel</span></a>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

            </main>

        </section>

    </div>

@endsection
