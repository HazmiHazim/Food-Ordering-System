@extends('main')

@section('title', 'Home')

@section('content')

    <div class="home-page">

        <section>

            <main>

                <div class="page">

                    <div class="content">

                        <div class="title">
                            <h1>Welcome To</h1>
                            <h1>Hash Restaurant</h1>
                        </div>

                        <div class="description">
                            <span>
                                Embark on a transcendent culinary odyssey at our esteemed venue, where the magic of
                                Malaysian cuisine
                            </span>
                            <span>is elevated by our local maestro boasting two Michelin stars. Gather your
                                loved ones for an unforgettable
                            </span>
                            <span>gastronomic journey through the enchanting world of flavor
                                we have meticulously crafted for you.</span>
                        </div>

                        <a href="{{ route('menu') }}"><span>See our menu</span></a>

                    </div>

                </div>

            </main>

        </section>

        @include('public.modal.success-message');

    </div>

@endsection
