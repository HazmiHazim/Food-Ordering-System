@extends('company.admin.main')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard">

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
                        <h1>Dashboard</h1>
                        <ul class="breadcrumb">
                            <li><a href="#" class="active">Analytics</a></li>
                            /
                            <li><a href="#">Staff</a></li>
                        </ul>
                    </div>
                    <a href="#" class="report">
                        <i class='bx bx-cloud-download'></i>
                        <span>Download CSV</span>
                    </a>
                </div>

                <!-- Insight -->
                <ul class="insights">
                    <li><i class='bx bxs-user'></i><span class="info"><h3>300</h3><p>Total Staff</p></span></li>
                    <li><i class='bx bx-show-alt' ></i><span class="info"><h3>5,958</h3><p>Site Visit</p></span></li>
                    <li><i class='bx bx-line-chart' ></i><span class="info"><h3>RM 350,920</h3><p>Total Sales</p></span></li>
                </ul>

                <!-- Bottom Section -->
                <div class="bottom-section">
                    <div class="orders">
                        <div class="header">
                            <i class='bx bx-receipt'></i>
                            <h3>Recent Orders</h3>
                            <i class='bx bx-filter' ></i>
                            <i class='bx bx-search' ></i>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class='bx bxs-user-circle' ></i><p>Hazmi Hazim</p></td>
                                    <td>22-12-2050</td>
                                    <td><span class="status completed">Completed</span></td>
                                </tr>
                                <tr>
                                    <td><i class='bx bxs-user-circle' ></i><p>Muhammad Waiz</p></td>
                                    <td>22-12-2050</td>
                                    <td><span class="status pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td><i class='bx bxs-user-circle' ></i><p>Nor Aishah</p></td>
                                    <td>22-12-2050</td>
                                    <td><span class="status process">Processing</span></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <!-- Reminders -->
                    <div class="reminders">

                        <div class="header">
                            <i class='bx bx-note' ></i>
                            <h3>Reminders</h3>
                            <i class='bx bx-filter' ></i>
                            <i class='bx bx-plus' ></i>
                        </div>

                        <ul class="task-list">
                            <li class="completed"><div class="task-title"><i class='bx bx-check-circle' ></i><p>Start Our Meeting</p></div><i class='bx bx-dots-vertical-rounded' ></i></li>
                            <li class="completed"><div class="task-title"><i class='bx bx-check-circle' ></i><p>Start Our Meeting</p></div><i class='bx bx-dots-vertical-rounded' ></i></li>
                            <li class="not-completed"><div class="task-title"><i class='bx bx-x-circle' ></i><p>Play Football</p></div><i class='bx bx-dots-vertical-rounded' ></i></li>
                        </ul>

                    </div>
                    <!-- End of Reminders -->

                </div>

            </main>

        </section>

    </div>

@endsection
