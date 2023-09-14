@extends('company.admin.main')

@section('title', 'Create')

@section('content')

    <div class="promotion-discount-create">

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
                        <h1>Create Promotion & Discount</h1>
                    </div>
                </div>

                <div class="form-section">

                    <div class="form-promotion-create">

                        <form action="{{ route('promotion-discount.store') }}" method="POST">

                            @csrf

                            <div class="header">
                                <h4>Coupon Details</h4>
                            </div>

                            <div class="form-input">

                                <span class="star">Coupon Name</span>
                                <input type="text" name="coupon_name" placeholder="Enter Coupon Name" required>

                                <span class="star">Discount</span>
                                <input type="text" name="discount"
                                    placeholder="Enter Discount for Coupon (e.g. 0.5 = 50%)" required>

                                <span>Validity</span>
                                <input type="datetime-local" name="validity" placeholder="Enter Coupon Validity" required>

                                <span>Event</span>
                                <div class="dropdown">
                                    <div class="select">
                                        <span class="selected">Select Category</span>
                                        <div class="caret"><i class='bx bx-chevron-down'></i></div>
                                    </div>
                                    <ul class="menu">
                                        @foreach ($events as $event)
                                            <li data-value="{{ $event->id }}">{{ $event->event_name }}</li>
                                        @endforeach
                                    </ul>
                                    <input type="hidden" name="category_id" value="" required>
                                </div>

                            </div>

                            <div class="button">
                                <input type="submit" value="Create Coupon">
                                <a href="{{ route('promotion-discount') }}"><span>Cancel</span></a>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>

                    </div>

                    <div class="form-event-create">

                        <form action="{{ route('promotion-event') }}" method="POST">

                            @csrf

                            <div class="header">
                                <h4>Event Details</h4>
                            </div>

                            <div class="form-input">
                                <span>Event Name</span>
                                <input type="text" name="event_name" placeholder="Enter Event Name" required>

                                <span>Event Date</span>
                                <input type="date" name="event_date" placeholder="Enter Event Date" required>

                                <div class="drag-area">
                                    <i class='bx bxs-cloud-upload'></i>
                                    <h2 class="drag-text">Drag and drop to upload image</h2>
                                    <input type="file" hidden name="image" accept="image/*" class="select-image-input" required>
                                </div>
                            </div>

                            <div class="button">
                                <input type="submit" value="Add Event">
                                <a href="{{ route('promotion-discount') }}"><span>Cancel</span></a>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>

                    </div>

                </div>

                <div class="table-section">

                    <div class="table-event">

                        <div class="header">
                            <i class='bx bx-party'></i>
                            <h3>Events</h3>
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
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Event Image</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>{{ $event->event_name }}</td>
                                        <td>{{ date('j F', strtotime($event->event_date)) }}</td>
                                        <td><img src="{{ asset($event->event_image) }}" alt="Event Image"></td>
                                        <td>
                                            <form action="/" method="POST">
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
                            <div class="count">Showing {{ $events->firstItem() }} to {{ $events->lastItem() }}
                                out of {{ $events->total() }} results</div>
                            <div class="pagination-number">
                                <div class="page-number">{{ $events->render('company.partials.paginator') }}</div>
                            </div>
                        </div>

                    </div>

                </div>

            </main>

        </section>

    </div>

@endsection
