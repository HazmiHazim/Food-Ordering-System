@extends('main')

@section('title', 'Staff Registration')

@section('content')

    <div class="registration">

        <div class="container">

            <div class="title">
                Staff Registration
            </div>

            <form action="/register" method="POST">

                @csrf

                <div class="registration-details">

                    <div class="registration-field">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" required>
                    </div>

                    <div class="registration-field">
                        <span class="details">Staff ID</span>
                        <input type="text" placeholder="Enter your staff id" required>
                    </div>

                    <div class="registration-field">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter your email address" required>
                    </div>


                    <div class="registration-field">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your phone number" required>
                    </div>

                    <div class="registration-field">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter your password" required>
                    </div>

                    <div class="registration-field">
                        <span class="details">Confirm Password</span>
                        <input type="password" placeholder="Confirm your password" required>
                    </div>

                    <div class="gender-details">

                        <input type="radio" name="gender" id="dot-1">
                        <input type="radio" name="gender" id="dot-2">

                        <span class="gender-title">Gender</span>

                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Female</span>
                            </label>
                        </div>

                    </div>

                </div>

                <div class="registration-button">
                    <input type="submit" value="Register">
                </div>

            </form>

        </div>

    </div>

@endsection
