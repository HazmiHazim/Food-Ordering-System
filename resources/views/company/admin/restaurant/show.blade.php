@extends('company.admin.main')

@section('title', 'Show')

@section('content')

    <div class="restaurant-show">

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
                        <h1>Show Restaurant Item</h1>
                    </div>
                </div>

                <div class="show-section">

                    <div class="container">

                        <div class="header">
                            <h3>Item Details</h3>
                        </div>

                        <div class="details">

                            <div class="label">
                                <span>Item Name</span>
                                <span>Quantity</span>
                                <span>Item Category</span>
                                <span>Item Price/Each</span>
                            </div>

                            <div class="data">
                                <span>{{ $item->item_name }}</span>
                                <span>{{ $item->quantity }}</span>
                                <span>{{ $item->itemCategory->name }}</span>
                                <span>RM {{ $item->price }}</span>
                            </div>
                        </div>

                    </div>

                </div>

                <form action="{{ route('restaurant.destroy', $item->id) }}" method="POST" id="deleteForm">

                    @method('DELETE')

                    @csrf

                    <div class="button">
                        <a href="{{ route('restaurant-edit', ['restaurant' => $item->id]) }}"><span>Edit</span></a>
                        <button type="button" class="delete-button-popup">Delete</button>
                        <a href="{{ route('restaurant') }}"><span>Cancel</span></a>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

                <div class="delete-confirmation" id="deletePopup">
                    <i class='bx bxs-info-circle'></i>
                    <h1>Warning</h1>
                    <h3>Are you sure you want to delete this staff?</h3>
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
