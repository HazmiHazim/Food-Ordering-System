@extends('company.admin.main')

@section('title', 'Staff Account')

@section('content')

    <div class="staff-account-index">

        <section>

            <main>

                <div class="header">
                    <div class="left">
                        <h1>Staff Account</h1>
                    </div>
                    <a href="{{ route('staff-account-create') }}" class="create">
                        <span>Create New Staff ID</span>
                    </a>
                </div>

                <!--ID Registered -->
                <div class="mid-section">
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

                <!-- Staff Registered -->
                <div class="bottom-section">
                    <div class="staff">
                        <div class="header">
                            <i class='bx bx-detail'></i>
                            <h3>Staff Details</h3>
                            <i class='bx bx-filter' ></i>
                            <i class='bx bx-search' ></i>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Staff ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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
                                        <td><a href="#"><i class='bx bxs-pencil'></i><span>Edit</span></a></td>
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
