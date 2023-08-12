@extends('main')

@section('title', 'Staff Registration')

@section('content')

    <div class="registration">

        <!-- Displaying success message -->
        @if (session('success-message'))
            <div class="success-message">{{ session('success-message') }}</div>
        @endif

        @error('error-message')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <div class="container">

            <div class="title">
                Staff Registration
            </div>

            <form action="{{ route('register') }}" method="POST">

                @csrf

                <div class="registration-details">

                    <div class="registration-field">
                        <span class="details">Full Name</span>
                        <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                        @foreach ($errors->get('name') as $name)
                            <div class="error-message">{{ $name }}</div>
                        @endforeach
                    </div>

                    <div class="registration-field">
                        <span class="details">Staff ID</span>
                        <input type="text" name="staff_id" placeholder="Enter your staff id" value="{{ old('staff_id') }}" required>
                        @foreach ($errors->get('staff_id') as $staffid)
                            <div class="error-message">{{ $staffid }}</div>
                        @endforeach
                    </div>

                    <div class="registration-field">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}" required>
                        @foreach ($errors->get('email') as $email)
                            <div class="error-message">{{ $email }}</div>
                        @endforeach
                    </div>


                    <div class="registration-field">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}" required>
                        @foreach ($errors->get('phone') as $phone)
                            <div class="error-message">{{ $phone }}</div>
                        @endforeach
                    </div>

                    <div class="registration-field">
                        <span class="details">Password</span>
                        <input type="password" name="password" placeholder="Enter your password" value="{{ old('password') }}" required>
                        @foreach ($errors->get('password') as $password)
                            <div class="error-message">{{ $password }}</div>
                        @endforeach
                    </div>

                    <div class="registration-field">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
                        @foreach ($errors->get('password') as $confirmPassword)
                            <div class="error-message">{{ $confirmPassword }}</div>
                        @endforeach
                    </div>

                    <div class="gender-details">

                        <input type="radio" name="gender" id="dot-1" value="Male" @if (old('gender') === 'Male') checked @endif required>
                        <input type="radio" name="gender" id="dot-2" value="Female" @if (old('gender') === 'Female') checked @endif required>

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

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

            </form>

        </div>

    </div>

@endsection
