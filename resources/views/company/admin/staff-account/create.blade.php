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

                <div class="create-form">
                    @foreach ($errors->get('new_staff_id') as $id)
                        <div class="error-message">{{ $id }}</div>
                    @endforeach
                    <form action="{{ route('staff-account.store') }}" method="POST">
                        @csrf

                        <input type="text" name="new_staff_id" value="{{ old('new_staff_id') }}" required>
                        <input type="submit" value="Create ID">
                        
                    </form>
                </div>
            </main>
        </section>
    </div>

@endsection
