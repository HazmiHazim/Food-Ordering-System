@extends('company.staff.main')

@section('title', 'Show Profile')

@section('content')

    <section>

        <div class="staff-profile-show">

            <main>

                <div class="content">

                    <div class="header">
                        <h1>Show Profile</h1>
                    </div>

                    <div class="container">

                        <div class="photo">
                            <img src="{{ asset($user->photo) }}" alt="User-Photo">
                        </div>

                        <div class="profile-data">
                            <span class="label">My Name</span>
                            <span class="data">{{ $user->name }}</span>

                            <span class="label">My Email</span>
                            <span class="data">{{ $user->email }}</span>

                            <span class="label">My Phone No.</span>
                            <span class="data">{{ $user->phone }}</span>

                            <span class="label">My Address</span>
                            <span class="data">{{ $user->address }}</span>

                            <span class="label">My Gender</span>
                            <span class="data">{{ $user->gender }}</span>

                            <span class="label">My Position in Company</span>
                            <span class="data">{{ $user->position }}</span>
                        </div>
                    </div>

                    <div class="button">
                        <a href="{{ route('staff-profile-edit', Auth::user()->id) }}" class="edit"><span>Edit My Profile</span></a>
                        <a href="{{ route('staff-dashboard') }}" class="back"><span>Back</span></a>
                    </div>

                </div>

            </main>

        </div>

    </section>

@endsection
