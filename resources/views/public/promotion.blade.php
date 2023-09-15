@extends('main')

@section('title', 'Promotions')

@section('content')

    <div class="promotion-page">

        <section>

            <main>

                <div class="page">

                    @if ($promotion->isEmpty())

                        <div class="container">

                            <i class='bx bx-no-entry'></i>
                            <div class="text">
                                <span class="top">Sorry, there is currently no offers available.</span>
                                <span class="bottom">Please check back soon for new offers!</span>
                            </div>

                        </div>
                    @else
                        <div class="event">

                            @foreach ($promotion as $promotion)
                                <div class="container-event">
                                    <img src="{{ asset($promotion->event_image) }}" alt="Promotion Image">

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
                                                    <span class="offer-price">RM {{ $offer->price * 0.3 }}</span>
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
