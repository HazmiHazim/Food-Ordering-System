@extends('main')

@section('title', 'Promotions')

@section('content')

    <div class="promotion-page">

        <section>

            <main>

                <div class="page">

                    @if ($promotion->isEmpty())

                        <div class="container-empty">

                            <i class='bx bxs-offer'></i>
                            <div class="text">
                                <span class="top">Sorry, there is currently no offers available.</span>
                                <span class="bottom">Please check back soon for new offers!</span>
                            </div>

                        </div>
                    @else
                        <div class="event">

                            @foreach ($promotion as $promotion)

                                <div class="container-event">

                                    <img src="{{ asset($promotion->event_image) }}" alt="Promotion Image"
                                        class="promotion-image">

                                    <div class="promotion-item">

                                        <span>Offers & Discounts</span>

                                        <div class="item">

                                            @foreach ($menu as $offer)

                                                <div class="container">
                                                    <div class="image">
                                                        <img src="{{ asset($offer->image) }}" alt="Food Offer">
                                                    </div>
                                                    <div class="description">
                                                        <span class="food-name">{{ $offer->name }}</span>
                                                        <div class="offer-price">
                                                            @foreach ($coupon[$promotion->id] as $eventCoupon)
                                                                <span>RM {{ $offer->price - ($offer->price * $eventCoupon->discount) }}</span>
                                                                <span class="cut"><s>RM {{ $offer->price }}</s></span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @endif

                </div>

            </main>

        </section>

    </div>

@endsection
