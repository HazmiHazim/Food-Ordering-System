@extends('company.admin.main')

@section('title', 'Edit')

@section('content')

    <div class="staff-account-edit">

        <section>

            <main>
                
                <div class="header">
                    <div class="left">
                        <h1>Edit Staff Details</h1>
                    </div>
                </div>

                <div class="edit-section">

                    <div class="user">
                        <div class="header">
                            <h3>Edit Profile <span>{{ $user->name }}</span></h3>
                        </div>
                    </div>

                    <div class="form-staff-update">

                        <form action="/" method="POST">

                            @csrf

                            <div class="label">
                                <span>ID</span>
                                <span>Name</span>
                                <span>Email</span>
                                <span>Phone No</span>
                                <span>Position</span>
                                <span>Address</span>
                            </div>

                            <div class="input">
                                <input type="text" placeholder="ID DISABLED" value="{{ $user->staff_id }}" disabled>
                                <input type="text" placeholder="Enter update staff name">
                                <input type="text" placeholder="Enter update staff email">
                                <input type="text" placeholder="Enter update staff phone number">
                                <input type="text" placeholder="Enter update staff position">
                                <input type="text" placeholder="Enter updaate staff address">
                            </div>

                            <div class="button">
                                <input type="submit" value="Update Profile">
                                <a href="{{ route('staff-account-show', ['staff_account' => $user->id]) }}"><span>Cancel</span></a>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        </form>

                    </div>

                </div>

            </main>

        </section>

    </div>

@endsection
