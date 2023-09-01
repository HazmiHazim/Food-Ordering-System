@extends('company.admin.main')

@section('title', 'Restaurant Items')

@section('content')

    <div class="restaurant-index">

        <section>

            <main>

                <div class="header">
                    <div class="left">
                        <h1>Restaurant Items</h1>
                    </div>
                    <a href="#" class="create">
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
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>meja</td>
                                    <td>50</td>
                                    <td>Utensil</td>
                                    <td>RM 20.50</td>
                                    <td><a href="#"><i class='bx bxs-pencil'></i><span>Edit</span></a></td>
                                </tr>
                            </tbody>

                        </table>

                    </div>

                </div>

            </main>

        </section>

    </div>

@endsection
