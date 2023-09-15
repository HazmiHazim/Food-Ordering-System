@extends('company.staff.main')

@section('title', 'Create')

@section('content')

    <section>

        <div class="customer-order-create">

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

                <div class="content">

                    <div class="header">
                        <h1>Create Dining Table No.</h1>
                    </div>

                    <form action="{{ route('customer-order.store') }}" method="POST">

                        @csrf

                        <div class="create-section">

                            <div class="header">
                                <h4>Dining Table Details</h4>
                            </div>

                            <span class="star">Table No.</span>
                            <input type="text" name="table_number" placeholder="Enter Table Number e.g. 12" required>
                            @foreach ($errors->get('validation-error-message') as $error)
                                <div class="validation-error-message">{{ $error }}</div>
                            @endforeach

                        </div>

                        <div class="button-section">
                            <input type="submit" value="Add Table">
                            <a href="{{ route('customer-order') }}"><span>Cancel</span></a>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    </form>

                    <div class="dining-table-section">

                        <div class="table-top">
                            <h3>Dining Tables</h3>
                        </div>

                        <table>

                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Table No.</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($diningTable as $table)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>{{ $table->table_name }}</td>
                                        <td>
                                            @if ($table->isOccupied)
                                                Occupied
                                            @else
                                                Available
                                            @endif
                                        </td>
                                        <td><a href="#"><i class='bx bxs-pencil'></i><span>Edit</span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>

            </main>

        </div>

    </section>

@endsection
