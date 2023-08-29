@extends('company.admin.main')

@section('title', 'Show')

@section('content')

    <div class="staff-account-show">

        <section>

            <main>

                @if (session('success-message'))
                    <div class="success-message left-green">
                        <i class='bx bxs-check-circle'></i>
                        <div class="text">
                            <span>Success</span>
                            <span class="message">{{ session('success-message') }}</span>
                        </div>
                    </div>
                @endif

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
                                <a href="{{ route('staff-account-edit', ['staff_account' => $user->id]) }}">
                                    <i class='bx bx-edit' ></i>
                                    <span>Edit</span>
                                </a>
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

                <form action="{{ route('staff-account.destroy', $user->id) }}" method="POST" id="deleteForm">

                    @method('DELETE')

                    @csrf

                    <div class="button">
                        <button type="button" class="delete-button-popup">Delete</button>
                        <a href="{{ route('staff-account') }}"><span>Cancel</span></a>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

                <div class="delete-confirmation" id="deletePopup">
                    <i class='bx bxs-info-circle' ></i>
                    <h1>Warning</h1>
                    <h3>Are you sure you want to delete this staff?</h3>
                    <p>Once deleted, you will not be able to recover this data!</p>
                    <div class="button">
                        <button class="close-popup">Cancel</button>
                        <button class="confirm-delete">Delete</button>
                    </div>
                </div>

            </main>

        </section>

    </div>

@endsection
