@extends('company.admin.main')

@section('title', 'Staff Account')

@section('content')

    <div class="staff-account-index">

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
                        <h1>Staff Account</h1>
                    </div>
                    <a href="{{ route('staff-account-create') }}" class="create">
                        <span>Create New Staff ID</span>
                    </a>
                </div>

                <!-- Staff Registered -->
                <div class="bottom-section">
                    <div class="staff">
                        <div class="header">
                            <i class='bx bx-detail'></i>
                            <h3>Staff Details</h3>
                            <i class='bx bx-filter' ></i>
                            <form action="{{ route('staff-account-search-index') }}" method="GET" id="search-form">
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
                                    <th>Staff ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($staff as $staffDetails)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $staffDetails->staff_id }}</td>
                                        <td>{{ $staffDetails->name }}</td>
                                        <td>{{ $staffDetails->email }}</td>
                                        <td>{{ $staffDetails->phone }}</td>
                                        <td><a href="{{ route('staff-account-show', ['staff_account' => $staffDetails->id]) }}"><i class='bx bxs-pencil'></i><span>Edit</span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pagination">
                            <div class="count">Showing {{ $staff->firstItem() }} to {{ $staff->lastItem() }} out of {{ $staff->total()}} results</div>
                            <div class="pagination-number">
                                <div class="page-number">{{ $staff->render('company.partials.paginator') }}</div>
                            </div>
                        </div>

                    </div>
                </div>

            </main>

        </section>

    </div>

@endsection
