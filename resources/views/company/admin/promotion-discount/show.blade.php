@extends('company.admin.main')

@section('title', 'Show')

@section('content')

    <div class="promotion-discount-show">

        <section>

            <main>

                <div class="head">
                    <div class="left">
                        <h1>Show Coupon</h1>
                    </div>
                </div>

                <div class="show-section">

                    <div class="coupon-design-section">

                        <h4>This is how the coupon design looks like</h4>

                        <div class="design">
                            <div class="left-side">
                                <div class="triangle"></div>
                                <div class="code">{{ QrCode::size(150)->generate($coupons->coupon_code) }}</div>
                                <span>{{ $coupons->coupon_code }}</span>
                            </div>

                            <div class="right-side">
                                <div class="triangle"></div>
                                <span class="title">Promotion Discount</span>
                                <span class="coupon-name">{{ $coupons->coupon_name }}</span>
                                <span><strong>{{ $coupons->discount * 100 }}% OFF</strong></span>
                                <span class="valid">Valid until {{ \Carbon\Carbon::parse($coupons->validity)->formatLocalized('%d %B') }}</span>
                            </div>
                        </div>

                    </div>

                </div>

                <form action="/" method="POST" id="deleteForm">

                    @method('DELETE')

                    @csrf

                    <div class="button">
                        <a href="{{ route('promotion-discount-edit', ['promotion_discount' => $coupons->id]) }}"><span>Edit</span></a>
                        <button type="button" class="delete-button-popup">Delete</button>
                        <a href="{{ route('promotion-discount') }}"><span>Cancel</span></a>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

            </main>

        </section>

    </div>

@endsection
