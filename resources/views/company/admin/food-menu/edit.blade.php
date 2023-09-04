@extends('company.admin.main')

@section('title', 'Edit')

@section('content')

    <div class="food-menu-edit">

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
                        <h1>Edit Food Menu</h1>
                    </div>
                </div>

                <div class="edit-section">

                    <form action="{{ route('food-menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data"
                        id="imageForm">

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
                                        <input type="hidden" name="category_id" value="">
                                    </div>

                                    <span>Price</span>
                                    <input type="text" name="price" placeholder="{{ $menu->price }}">

                                    <span>Description</span>
                                    <input type="text" name="description" placeholder="Description line 1"
                                        class="description">
                                    <input type="text" name="description-two" placeholder="Description line 2"
                                        class="description">
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
