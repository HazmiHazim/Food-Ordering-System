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
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>haha</td>
                                    <td>haha</td>
                                    <td>haha</td>
                                    <td>haha</td>
                                    <td>haha</td>
                                    <td>haha</td>
                                    <td>haha</td>
                                    <td>haha</td>
                                    <td><a href="#"><i class='bx bxs-pencil'></i><span>Edit</span></a></td>
                                </tr>
                            </tbody>

                        </table>

                    </div>

                </div>

            </main>

        </div>

    </section>

@endsection
