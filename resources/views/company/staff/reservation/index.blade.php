@extends('company.staff.main')

@section('title', 'Reservation')

@section('content')

    <section>

        <div class="reservation-index">

            <main>

                <div class="content">

                    <div class="header">
                        <h1>Manage Customer Reservation</h1>
                    </div>

                    <div class="reservation-status">

                        <div class="container">
                            <i class='bx bxs-bell'></i>
                            <div class="data">
                                <span class="title">Reservation in-Progress ({{ date('d-M') }})</span>
                                <span class="data">Total bla bla bla</span>
                            </div>
                        </div>

                    </div>

                    <div class="bottom-section">

                        <div class="table-top">
                            <h3>Manage Reservation</h3>
                        </div>

                        <table>

                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                    <th>No. of Attendees</th>
                                    <th>Date & Time Arrival</th>
                                    <th>Table</th>
                                    <th>Status</th>
                                    <th>Message</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($reservation as $reserve)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>{{ $reserve->reservation_name }}</td>
                                        <td>{{ $reserve->reservation_email }}</td>
                                        <td>{{ $reserve->reservation_contact }}</td>
                                        <td>{{ $reserve->reservation_attendees }}</td>
                                        <td>
                                            {{ date('d-M', strtotime($reserve->reservation_date)) }} 
                                            {{ date('g:i A', strtotime($reserve->reservation_time)) }}
                                        </td>
                                        <td>
                                            @if ($reserve->dining_table_id)
                                                {{ $reserve->dining_table_id }}
                                            @else
                                                Not Chosen
                                            @endif
                                        </td>
                                        <td>{{ $reserve->reservation_status }}</td>
                                        <td>{{ $reserve->reservation_message }}</td>
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
