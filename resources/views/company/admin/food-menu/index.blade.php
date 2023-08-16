@extends('company.admin.main')

@section('title', 'Food Menu')

@section('content')

    <div class="food-menu-index">

        <section>

            <main>

                <div class="header">
                    <div class="left">
                        <h1>Food Menu</h1>
                    </div>
                </div>

                <!-- Food Menu -->
                <div class="top-section">

                    <div class="food-menu">
                        <div class="header">
                            <i class='bx bx-notepad'></i>
                            <h3>Menu</h3>
                            <i class='bx bx-search'></i>
                            <div class="add-menu">
                                <i class='bx bx-plus'></i>
                                <a href="{{ route('food-menu-create') }}"><span>Add Menu</span></a>
                            </div>
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
                                        <td>{{ $foodList->description }}</td>
                                        <td>{{ $foodList->price }}</td>
                                        <td>{{ $foodList->category_id }}</td>
                                        <td><img src="{{ $foodList->image }}"></td>
                                        <td>Delete</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="food-menu-pagination">
                            <div><i class='bx bx-chevrons-left'></i></div>
                            <div>1</div>
                            <div>2</div>
                            <div>...</div>
                            <div><i class='bx bx-chevrons-right' ></i></div>
                        </div>

                    </div>

                </div>

            </main>

        </section>

    </div>

@endsection
