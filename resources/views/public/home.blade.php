@extends('main')

@section('title', 'Home')

@section('content')

    <section>

        <div class="home-page">

            <main>

                <div class="top-section">

                    <img src="{{ asset('images/home-bg1.jpg') }}" alt="Background">

                    <div class="curtain"></div>

                    <div class="content">
                        <div class="title">
                            <h1>Welcome To</h1>
                            <h1>Hash Restaurant</h1>
                        </div>
                        <div class="description">
                            <span>
                                Embark on a transcendent culinary odyssey at our esteemed venue, where the magic of
                                Malaysian cuisine is elevated by our local maestro boasting two Michelin stars. Gather your
                                loved ones for an unforgettable gastronomic journey through the enchanting world of flavor
                                we have meticulously crafted for you.
                            </span>
                        </div>
                        <a href="{{ route('menu') }}"><span>See our menu</span></a>

                    </div>

                </div>

            </main>

    </section>

    </div>

@endsection
