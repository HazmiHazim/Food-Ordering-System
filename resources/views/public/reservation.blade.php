@extends('main')

@section('title', 'Reservation')

@section('content')

    <div class="reservation-page">

        <section>

            <main>

                <div class="page">

                    <div class="reservation-form">
                        
                        <div class="header">
                            <h2>Make Your Reservation Now</h2>
                        </div>

                        <form action="/" method="POST">

                            @csrf

                            <div class="top-detail">
                                <span class="label">Your Name</span>
                                <input type="text" name="book_name" placeholder="John Doe" required>

                                <span class="label">Your E-mail</span>
                                <input type="text" name="book_email" placeholder="john.doe@email.com" required>

                                <span class="label">Your Phone</span>
                                <input type="text" name="book_phone" placeholder="0123456789" required>
                            </div>

                            <hr>

                            <div class="bottom-detail">
                                <span class="label">Number of Guests</span>
                                <input type="number" name="guest_number" placeholder="5" required>

                                <span class="label">Reservation Date</span>
                                <input type="date" name="book_date" placeholder="20/03/2077" required>

                                <span class="label">Reservation Time</span>
                                <input type="time" name="book_time" placeholder="12.00 p.m." required>
                            </div>

                            <hr>

                            <div class="message">
                                <span class="label">Message</span>
                                <textarea name="book_message" placeholder="Tell us anything else that might be important." required></textarea>
                            </div>

                            <div class="button-section">
                                <input type="submit" value="Submit">
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        </form>

                    </div>

                </div>

            </main>

        </section>

    </div>

@endsection
