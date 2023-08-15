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
                        </div>

                        <div class="button">
                            <input type="submit" value="Create">
                            <a href="{{ route('staff-account') }}"><span>Cancel</span></a>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>

                </div>

            </main>

        </section>
    </div>

@endsection
