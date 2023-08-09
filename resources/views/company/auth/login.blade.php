@extends('main')

@section('title', 'Staff Login')

@section('content')

    <div class="login">
        <div class="center">
            <h1>Login as Staff</h1>

            <form action="/login" method="POST">

                <div class="login_field">
                    <input type="text" id="id" name="id" required>
                    <span></span>
                    <label for="id">Staff id</label>
                </div>

                <div class="login_field">
                    <input type="password" id="password" required>
                    <span></span>
                    <label for="password">Password</label>
                </div>

                <input type="submit" value="submit">

                <div class="flex">
                    <div class="register">
                        <a href="#">Register Account</a>
                    </div>

                    <div class="divider">|</div>

                    <div class="forgot_password">
                        Forgot Password
                    </div>
                </div>

            </form>
            
        </div>
    </div>

@endsection
