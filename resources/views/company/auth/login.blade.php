@extends('main')

@section('title', 'Staff Login')

@section('content')

    <div class="login">

        <div class="container">

            <div class="title">
                Staff Login
            </div>

            <form action="/login" method="POST">

                <div class="login-field">
                    <span class="details">Staff ID</span>
                    <input type="text" placeholder="Enter your staff id" required>
                </div>

                <div class="login-field">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your password" required>
                </div>

                <div class="remember">
                    <label>
                        <input type="checkbox">Remember me
                    </label>
                </div>

                <div class="login-button">
                    <input type="submit" value="Sign in">
                </div>

                <div class="flex">
                    <div class="register">
                        <a href="{{ route('register') }}">Register Account</a>
                    </div>

                    <div class="divider">|</div>

                    <div class="forgot-password">
                        Forgot Password
                    </div>
                </div>

            </form>
            
        </div>

    </div>

@endsection
