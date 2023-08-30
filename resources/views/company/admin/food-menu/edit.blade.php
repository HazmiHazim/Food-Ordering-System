@extends('company.admin.main')

@section('title', 'Edit')

@section('content')

    <div class="food-menu-edit">

        <section>

            <main>

                <div class="header">
                    <div class="left">
                        <h1>Edit Food Menu</h1>
                    </div>
                </div>

                <div class="edit-section">

                    <form action="/" method="POST">

                        @method('PUT')

                        @csrf

                        <div class="container">

                            <div class="drag-area">
                                <i class='bx bxs-cloud-upload'></i>
                                <h2 class="drag-text">Drag and drop to upload image</h2>
                                <input type="file" hidden name="image" accept="image/*" class="select-image-input">
                            </div>

                            <div class="details">
                                <div class="label">
                                    <span>Name</span>
                                    <input type="text" name="name" placeholder="{{ $menu->name }}">

                                    <span>Category</span>
                                    <div class="dropdown">
                                        <div class="select">
                                            <span class="selected">{{ $category->name }}</span>
                                            <div class="caret"><i class='bx bx-chevron-down'></i></div>
                                        </div>
                                        <ul class="menu">
                                            <li data-value="{{ $category->id }}">{{ $category->name }}</li>
                                        </ul>
                                        <input type="hidden" name="category_id" id="category_id" value="{{ $menu->category_id }}">
                                    </div>

                                    <span>Price</span>
                                    <input type="text" name="price" placeholder="{{ $menu->price }}">

                                    <span>Description</span>
                                    <input type="text" name="description" placeholder="{{ $menu->description }}" class="description">
                                    <input type="text" name="description" placeholder="{{ $menu->description }}" class="description">
                                </div>
                            </div>

                        </div>

                        <div class="button-section">
                            <div class="button">
                                <input type="submit" value="Update Menu">
                                <a href="{{ route('food-menu-show', ['food_menu' => $menu->id]) }}"><span>Cancel</span></a>
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>

                </div>

            </main>

        </section>

    </div>

@endsection
