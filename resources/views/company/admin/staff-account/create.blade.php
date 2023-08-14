@extends('company.admin.main')

@section('title', 'Create')

@section('content')

    <div class="staff-account-create">
        <section>

            <main>

                <div class="main-container">

                    <div class="header">
                        <div class="left">
                            <h1>Create New Staff ID</h1>
                        </div>
                    </div>

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
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>

                    <a href="#" class="cancel"><span>Cancel</span></a>

                </div>

            </main>
            
        </section>
    </div>

@endsection
