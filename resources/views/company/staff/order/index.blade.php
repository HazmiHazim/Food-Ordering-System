@extends('company.staff.main')

@section('title', 'Customer Orders')

@section('content')

    <section>

        <div class="order">

            <main>

                <div class="content">

                    <div class="header">
                        <h1>Manage Customer Orders</h1>
                    </div>
    
                    <div class="statistic">

                        <div class="item1">
                            <i class='bx bxs-check-circle'></i>
                            <div class="data">
                                <span class="title">Total Orders Completed (Today)</span>
                                <span class="data">Total of 51 Order</span>
                            </div>
                        </div>

                        <div class="item2">
                            <i class='bx bxs-info-circle'></i>
                            <div class="data">
                                <span class="title">Total Orders Pending (Today)</span>
                                <span class="data">51 Still Pending</span>
                            </div>
                        </div>
                
                        <div class="item"></div>
                    </div>

                    <div class="bottom-section">

                        <div class="table-top">
                            <h3>Manage Orders</h3>
                            <div class="button">
                                <a href="#" class="delete"><i class='bx bxs-minus-circle'></i><span>Delete</span></a>
                                <a href="#" class="add"><i class='bx bxs-plus-circle'></i><span>Create New Motherfucker</span></a>
                            </div>
                        </div>

                        <table>

                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Order ID</th>
                                    <th>Table Number</th>
                                    <th>Food Order</th>
                                    <th>Order Status</th>
                                    <th>Paid Status</th>
                                    <th>Customer Contact No.</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Hazmi Hazim</td>
                                    <td>Kambing@gmail.com</td>
                                    <td>Kuala Lumpur</td>
                                    <td>0123456789</td>
                                    <td>test</td>
                                    <td>test</td>
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
