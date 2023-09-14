@extends('main')

@section('title', 'Reservation')

@section('content')

    <div class="reservation-page">

        <section>

            <main>

                <div class="page">

                    @if (session('success-message'))
                        <!-- TO BE EDITED -->
                    @endif

                    <div class="reservation-form">

                        <div class="header">
                            <h2>Make Your Reservation Now</h2>
                        </div>

                        <form action="{{ route('create-reservation') }}" method="POST">

                            @csrf

                            <div class="top-detail">
                                <span class="label">Your Name</span>
                                <input type="text" name="book_name" placeholder="John Doe" value="{{ old('book_name') }}" required>
                                @foreach ($errors->get('book_name') as $name)
                                    <div class="validation-error-message">{{ $name }}</div>
                                @endforeach

                                <span class="label">Your E-mail</span>
                                <input type="text" name="book_email" placeholder="john.doe@email.com" value="{{ old('book_email') }}" required>
                                @foreach ($errors->get('book_email') as $name)
                                    <div class="validation-error-message">{{ $name }}</div>
                                @endforeach

                                <span class="label">Your Phone</span>
                                <input type="text" name="book_phone" placeholder="0123456789" value="{{ old('book_phone') }}" required>
                                @foreach ($errors->get('book_phone') as $name)
                                    <div class="validation-error-message">{{ $name }}</div>
                                @endforeach
                            </div>

                            <hr>

                            <div class="bottom-detail">
                                <span class="label">Number of Guests</span>
                                <input type="number" name="guest_number" placeholder="5" value="{{ old('guest_number') }}" required>
                                @foreach ($errors->get('guest_number') as $name)
                                    <div class="validation-error-message">{{ $name }}</div>
                                @endforeach

                                <span class="label">Reservation Date</span>
                                <input type="date" name="book_date" placeholder="20/03/2077" value="{{ old('book_date') }}" required>
                                @foreach ($errors->get('book_date') as $name)
                                    <div class="validation-error-message">{{ $name }}</div>
                                @endforeach

                                <span class="label">Reservation Time</span>
                                <input type="time" name="book_time" placeholder="12.00 p.m." value="{{ old('book_time') }}" required>
                                @foreach ($errors->get('book_time') as $name)
                                    <div class="validation-error-message">{{ $name }}</div>
                                @endforeach
                            </div>

                            <hr>

                            <div class="message">
                                <span class="label">Message</span>
                                <textarea name="book_message" placeholder="Tell us anything else that might be important."></textarea>
                                @foreach ($errors->get('book_message') as $name)
                                    <div class="validation-error-message">{{ $name }}</div>
                                @endforeach
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

        @include('public.modal.success-message');

    </div>

@endsection
