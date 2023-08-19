@extends('company.admin.main')

@section('title', 'Create')

@section('content')

    <div class="staff-account-create">
        <section>

            <main>

                <div class="header">
                    <div class="left">
                        <h1>Create New Staff ID</h1>
                    </div>
                </div>

                <div class="form-section">

                    <form action="{{ route('staff-account.store') }}" method="POST">
                        @csrf

                        <div class="create-form">

                            <label>New ID</label>
                            <input type="text" name="new_staff_id" value="{{ old('new_staff_id') }}" required>
                            @foreach ($errors->get('new_staff_id') as $id)
                                <div class="error-message">{{ $id }}</div>
                            @endforeach

                            <div class="button">
                                <input type="submit" value="Create">
                                <a href="{{ route('staff-account') }}"><span>Cancel</span></a>
                            </div>

                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>

                </div>

                <div class="bottom-section">

                    <div class="id">
                        
                        <div class="header">
                            <i class='bx bx-receipt'></i>
                            <h3>ID Registered</h3>
                            <i class='bx bx-filter' ></i>
                            <i class='bx bx-search' ></i>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($staffid as $id)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $id->staff_account_id }}</td>
                                        <td>{{ $id->created_at }}</td>
                                        <td><i class='bx bxs-trash-alt'></i><span>Delete</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>

                </div>

            </main>

        </section>
    </div>

@endsection
