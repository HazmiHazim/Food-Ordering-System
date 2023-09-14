@extends('company.staff.main')

@section('title', 'Edit Profile')

@section('content')

    <section>

        <div class="staff-profile-edit">

            <main>

                @error('error-message')
                    <div class="error-message left-red">
                        <i class='bx bxs-x-circle'></i>
                        <div class="text">
                            <span>Error</span>
                            <span class="message">{{ $message }}</span>
                        </div>
                    </div>
                @enderror

                <div class="content">

                    <div class="header">
                        <h1>Edit Profile</h1>
                    </div>

                    <form action="{{ route('staff-profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">

                        @method('PUT')

                        @csrf

                        <div class="container">

                            <div class="drag-area">
                                <i class='bx bxs-cloud-upload'></i>
                                <h2 class="drag-text">Drag and drop to upload image</h2>
                                <input type="file" hidden name="profile_image" accept="image/*" class="select-image-input">
                            </div>

                            <div class="profile-data">
                                <span class="label">Name</span>
                                <input type="text" name="profile_name" placeholder="{{ $user->name }}" value="{{ old('profile_name') }}">

                                <span class="label">Email</span>
                                <input type="email" name="profile_email" placeholder="{{ $user->email }}" value="{{ old('profile_email') }}">

                                <span class="label">Phone No.</span>
                                <input type="text" name="profile_phone" placeholder="{{ $user->phone }}" value="{{ old('profile_phone') }}">

                                <span class="label">Address</span>
                                <input type="text" name="profile_address" placeholder="{{ $user->address }}" value="{{ old('profile_address') }}">

                                <span class="label">Position</span>
                                <input type="text" name="profile_position" placeholder="{{ $user->position }}" value="{{ old('profile_position') }}">

                                <span class="label">Gender</span>
                                <div class="input-radio">
                                    <label><input type="radio" value="Male" name="profile_gender"><span>Male</span></label>
                                    <label><input type="radio" value="Female" name="profile_gender"><span>Female</span></label>
                                </div>
                            </div>

                        </div>

                        <div class="button">
                            <input type="submit" value="Update Profile">
                            <a href="{{ route('staff-profile-show', Auth::user()->id) }}" class="cancel"><span>Cancel</span></a>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    </form>

                </div>

            </main>

        </div>

    </section>

@endsection
