@extends('company.admin.main')

@section('title', 'Edit')

@section('content')

    <div class="staff-account-edit">

        <section>

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

                        <form action="{{ route('staff-account.update', $user->id) }}" method="POST">

                            @method('PUT')

                            @csrf

                            <div class="input-section">
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
                                    <input type="text" name="name" placeholder="{{ $user->name }}">
                                    <input type="text" name="email" placeholder="{{ $user->email }}">
                                    <input type="text" name="phone" placeholder="{{ $user->phone }}">
                                    <input type="text" name="position" placeholder="{{ $user->position }}">
                                    <input type="text" name="address" placeholder="{{ $user->address }}">
                                </div>
                            </div>

                            <div class="button-section">
                                <div class="button">
                                    <input type="submit" value="Update Profile">
                                    <a href="{{ route('staff-account-show', ['staff_account' => $user->id]) }}"><span>Cancel</span></a>
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        </form>

                    </div>

                </div>

            </main>

        </section>

    </div>

@endsection
