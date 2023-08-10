@extends('main')

@section('title', 'Forgot Password')

@section('content')

    <div class="forgot-password">

        <div class="container">

            <div class="title">
                Reset Password
            </div>

            <div class="text">
                Enter your email address and and the password reset link will be sent to your email.
                Please check your email to set a new password.
            </div>

            <form action="/forgot-password" method="POST">

                @csrf

                <div class="forgot-field">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter your email" required>
                </div>

                <div class="forgot-button">
                    <input type="submit" value="Send Reset Link">
                </div>

            </form>
        </div>
    </div>

@endsection