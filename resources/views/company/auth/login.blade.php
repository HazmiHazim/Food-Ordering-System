@extends('main')

@section('title', 'Staff Login')

@section('content')

    <div class="login">

        @error('error-message')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <div class="container">

            <div class="title">
                Staff Login
            </div>

            <form action="{{ route('login') }}" method="POST">

                @csrf

                <div class="login-field">
                    <span class="details">Staff ID</span>
                    <input type="text" name="staff_id" placeholder="Enter your staff id" value="{{ old('staff_id') }}" required>
                </div>

                <div class="login-field">
                    <span class="details">Password</span>
                    <input type="password" name="password" placeholder="Enter your password" required>
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

                    <div class="forgot-link">
                        <a href="{{ route('forgot-password') }}">Forgot Password</a>
                    </div>

                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
            </form>

        </div>

    </div>

@endsection
