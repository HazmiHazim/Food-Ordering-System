@extends('company.admin.main')

@section('title', 'Profile Settings')

@section('content')

    <div class="admin-profile-edit">

        <section>

            <main>

                @if (session('success-message'))
                    <div class="success-message">
                        <i class='bx bxs-check-circle'></i>
                        <div class="text">
                            <span>Success</span>
                            <span class="message">{{ session('success-message') }}</span>
                        </div>
                    </div>
                @endif

                <div class="header">
                    <div class="left">
                        <h1>Profile Settings</h1>
                    </div>
                </div>

                <div class="profile-section">

                    <form action="{{ route('update-admin-profile', Auth::user()->id) }}" method="POST">

                        @method('PUT')

                        @csrf

                        <div class="container">

                            <div class="details">
                                <h3>Update Profile</h3>
                                <span class="text">Update your account's profile information.</span>

                                <span>Name</span>
                                <input type="text" name="name" placeholder="{{ Auth::user()->name }}" value="{{ old('name') }}">
                                @foreach ($errors->get('name') as $name)
                                    <div class="validation-error-message">{{ $name }}</div>
                                @endforeach

                                <span>Email</span>
                                <input type="email" name="email" placeholder="{{ Auth::user()->email }}" value="{{ old('email') }}">
                                @foreach ($errors->get('email') as $email)
                                    <div class="validation-error-message">{{ $email }}</div>
                                @endforeach

                                <span>Phone Number</span>
                                <input type="text" name="phone" placeholder="{{ Auth::user()->phone}} " value="{{ old('phone') }}">
                                @foreach ($errors->get('phone') as $phone)
                                    <div class="validation-error-message">{{ $phone }}</div>
                                @endforeach

                                <input type="submit" value="Submit">
                            </div>

                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>

                    <form action="{{ route('update-admin-password', Auth::user()->id) }}" method="POST">

                        @method('PUT')

                        @csrf

                        <div class="container">
                            <div class="password-details">
                                <h3>Update Password</h3>
                                <span class="text">Ensure your account is using a long, random password to stay secure.</span>

                                <span>Current Password</span>
                                <input type="password" name="current_password" value="{{ old('current_password') }}">
                                @foreach ($errors->get('current_password') as $oldpass)
                                    <div class="validation-error-message">{{ $oldpass }}</div>
                                @endforeach
                                @error('password-error')
                                    <div class="validation-error-message">{{ $message }}</div>
                                @enderror

                                <span>New Password</span>
                                <input type="password" name="new_password" value="{{ old('new_password') }}">
                                @foreach ($errors->get('new_password') as $newpass)
                                    <div class="validation-error-message">{{ $newpass }}</div>
                                @endforeach

                                <span>Confirm Password</span>
                                <input type="password" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}">
                                @foreach ($errors->get('new_password_confirmation') as $confirmpass)
                                    <div class="validation-error-message">{{ $confirmpass }}</div>
                                @endforeach

                                <input type="submit" value="Submit">
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>

                </div>

            </main>

        </section>

    </div>

@endsection
