@extends('company.admin.main')

@section('title', 'Promotion and Discount')

@section('content')

    <div class="promotion-discount-index">

        <section>

            <main>

                <div class="header">
                    <div class="left">
                        <h1>Promotions and Discounts</h1>
                    </div>
                    <a href="{{ route('promotion-discount-create') }}" class="create">
                        <span>Create New Discount Coupon</span>
                    </a>
                </div>

                <div class="index-section">

                    <div class="container">

                        <div class="header">
                            <i class='bx bx-purchase-tag'></i>
                            <h3>Coupons</h3>
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
                                    <th><input type="Checkbox"></th>
                                    <th>Coupon ID</th>
                                    <th>QR Code</th>
                                    <th>Coupon Name</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                    <th>Event</th>
                                    <th>Validity</th>
                                    <th>Date Redeemed</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($coupon as $coupon)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>{{ Str::limit($coupon->coupon_code, 5) }}</td>
                                        <td>
                                            <div class="qrcode">
                                                {{ QrCode::generate($coupon->coupon_code) }}
                                            </div>
                                        </td>
                                        <td>{{ $coupon->coupon_name }}</td>
                                        <td>{{ $coupon->discount * 100 }}%</td>
                                        <td>
                                            <span style="{{ $status }}">
                                                {{ $coupon->redeem_status }}
                                            </span>
                                        </td>
                                        <td>{{ $coupon->event_id }}</td>
                                        <td>{{ \Carbon\Carbon::parse($coupon->validity)->formatLocalized('%d %B') }}</td>
                                        <td>{{ $coupon->date_redeemed }}</td>
                                        <td><a href="#"><i class='bx bxs-pencil'></i><span>Edit</span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>

            </main>

        </section>

    </div>

@endsection
