@extends('company.admin.main')

@section('title', 'Create')

@section('content')

    <div class="staff-account-create">
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
                                <div class="validation-error-message">{{ $id }}</div>
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
                            <form action="{{ route('staff-account-search-create') }}" method="GET" id="search-form">
                                <div class="search-field">
                                    <i class='bx bx-search' id="search-button"></i>
                                    <input type="text" name="search" placeholder="Search" value="{{ old('search') }}">
                                </div>
                            </form>
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
                                        <td>
                                            <form action="/" method="POST" id="deleteForm">
                                                @method('DELETE')

                                                @csrf

                                                <button type="button" class="delete-button-popup">
                                                    <i class='bx bxs-trash-alt'></i>
                                                    <span>Delete</span>
                                                </button>

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>

                        <div class="pagination">
                            <div class="count">Showing {{ $staffid->firstItem() }} to {{ $staffid->lastItem() }} out of {{ $staffid->total()}} results</div>
                            <div class="pagination-number">
                                <div class="page-number">{{ $staffid->render('company.partials.paginator') }}</div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="delete-confirmation" id="deletePopup">
                    <i class='bx bxs-info-circle' ></i>
                    <h1>Warning</h1>
                    <h3>Are you sure you want to delete this ID?</h3>
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
