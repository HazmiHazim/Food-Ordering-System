@extends('company.admin.main')

@section('title', 'Restaurant Items')

@section('content')

    <div class="restaurant-index">

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
                        <h1>Restaurant Items</h1>
                    </div>
                    <a href="{{ route('restaurant-create') }}" class="create">
                        <span>Create New Restaurant Item</span>
                    </a>
                </div>

                <div class="item-section">

                    <div class="container">

                        <div class="header">
                            <i class='bx bx-archive'></i>
                            <h3>Items Details</h3>
                            <i class='bx bx-filter'></i>
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
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Price/each</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($restaurantItems as $items)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>{{ $items->item_name }}</td>
                                        <td>{{ $items->quantity }}</td>
                                        <td>{{ $items->itemCategory->name }}</td>
                                        <td>RM {{ $items->price }}</td>
                                        <td><a href="{{ route('restaurant-show', ['restaurant' => $items->id]) }}"><i class='bx bxs-pencil'></i><span>Edit</span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                        <div class="pagination">
                            <div class="count">Showing {{ $restaurantItems->firstItem() }} to {{ $restaurantItems->lastItem() }}
                                out of {{ $restaurantItems->total() }} results</div>
                            <div class="pagination-number">
                                <div class="page-number">{{ $restaurantItems->render('company.partials.paginator') }}</div>
                            </div>
                        </div>

                    </div>

                </div>

            </main>

        </section>

    </div>

@endsection
