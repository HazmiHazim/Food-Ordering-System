@extends('company.admin.main')

@section('title', 'Food Menu')

@section('content')

    <div class="food-menu-index">

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
                        <h1>Food Menu</h1>
                    </div>
                    <a href="{{ route('food-menu-create') }}" class="create">
                        <span>Create New Food Menu</span>
                    </a>
                </div>

                <!-- Food Menu -->
                <div class="top-section">

                    <div class="food-menu">
                        <div class="header">
                            <i class='bx bx-notepad'></i>
                            <h3>Menu</h3>
                            <i class='bx bx-filter' ></i>
                            <i class='bx bx-search'></i>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($food as $foodList)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $foodList->name }}</td>
                                        <td>{{ Str::limit($foodList->description, 30) }}</td>
                                        <td>RM {{ $foodList->price }}</td>
                                        <td>{{ $foodList->category_id }}</td>
                                        <td><img src="{{ asset($foodList->image) }}"></td>
                                        <td>
                                            <a href="{{ route('food-menu-show', ['food_menu' => $foodList->id]) }}">
                                                <i class='bx bxs-pencil'></i>
                                                <span>Edit</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pagination">
                            <div class="count">Showing {{ $food->firstItem() }} to {{ $food->lastItem() }} out of {{ $food->total()}} results</div>
                            <div class="pagination-number">
                                <div class="page-number">{{ $food->render('company.partials.paginator') }}</div>
                            </div>
                        </div>

                    </div>

                </div>

            </main>

        </section>

    </div>

@endsection
