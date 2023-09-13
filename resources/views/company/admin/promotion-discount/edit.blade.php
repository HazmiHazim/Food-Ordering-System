@extends('company.admin.main')

@section('title', 'Edit')

@section('content')

    <div class="promotion-discount-edit">

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
                        <h1>Edit Coupon</h1>
                    </div>
                </div>

                <div class="edit-section">

                    <form action="{{ route('promotion-discount.update', $promotion->id) }}" method="POST">

                        @method('PUT')

                        @csrf

                        <div class="container">

                            <div class="header">
                                <h3>Edit Coupon {{ $promotion->coupon_name }}</h3>
                            </div>

                            <div class="details">
                                <div class="data">
                                    <span>Coupon Name</span>
                                    <input type="text" name="name" placeholder="{{ $promotion->coupon_name }}">

                                    <span>Discount</span>
                                    <input type="text" name="discount" placeholder="{{ $promotion->discount * 100 }}">

                                    <span>Redeem Status</span>
                                    <input type="text">

                                    <span>Event</span>
                                    <div class="dropdown">
                                        <div class="select">
                                            <span class="selected">{{ $event->event_name }}</span>
                                            <div class="caret"><i class='bx bx-chevron-down'></i></div>
                                        </div>
                                        <ul class="menu">
                                            <li data-value="{{ $event->id }}">{{ $event->event_name }}</li>
                                        </ul>
                                        <input type="hidden" name="category_id" value="" required>
                                    </div>

                                    <span>Validity Date</span>
                                    <input type="datetime-local" name="validity" placeholder="Enter New Validity Date">
                                </div>
                            </div>

                        </div>

                        <div class="button-section">
                            <div class="button">
                                <input type="submit" value="Add Partner">
                                <a href="{{ route('promotion-discount-show', $promotion->id) }}"><span>Cancel</span></a>
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>

                </div>

            </main>

        </section>

    </div>

@endsection
