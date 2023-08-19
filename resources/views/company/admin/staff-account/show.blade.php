@extends('company.admin.main')

@section('title', 'Show')

@section('content')

    <div class="staff-account-show">

        <section>

            <main>

                <div class="header">
                    <div class="left">
                        <h1>Show Staff Accout</h1>
                    </div>
                </div>

                <div class="show-section">

                    <div class="user">

                        <div class="header">
                            <h3>Staff Details</h3>
                            <div class="edit-button">
                                <a href="{{ route('staff-account-edit', ['staff_account' => $user->id]) }}"><i class='bx bx-edit' ></i><span>Edit</span></a>
                            </div>
                        </div>

                        <div class="user-data">

                            <div class="label">
                                <span>Name</span>
                                <span>Staff ID</span>
                                <span>Email</span>
                                <span>Phone No</span>
                                <span>Position</span>
                                <span>Address </span>
                            </div>

                            <div class="data">
                                <span>{{ $user->name }}</span>
                                <span>{{ $user->staff_id }}</span>
                                <span>{{ $user->email }}</span>
                                <span>{{ $user->phone }}</span>
                                <span>{{ $user->position }}</span>
                                <span>{{ $user->address }}</span>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="cancel-button">
                    <span class="delete">Delete</span>
                    <a href="{{ route('staff-account') }}"><span>Cancel</span></a>
                </div>

            </main>

        </section>

    </div>

@endsection
