@extends('company.staff.main')

@section('title', 'Dashboard')

@section('content')

    <section>

        <div class="dashboard">

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
                        <h1>Dashboard</h1>
                    </div>

                    <div class="statistic">

                        <div class="item1">
                            <i class='bx bxs-cart'></i>
                            <span>Total Orders</span>
                        </div>

                        <div class="item2">
                            <i class='bx bxl-product-hunt'></i>
                            <span>Total Products</span>
                        </div>

                        <div class="item3">
                            <i class='bx bxs-dollar-circle'></i>
                            <span>My Savings</span>
                        </div>

                    </div>

                    <div class="bottom-section">

                        <div class="table-top">
                            <h3>Manage Orders</h3>
                            <div class="button">
                                <a href="#" class="delete"><i class='bx bxs-minus-circle'></i><span>Delete</span></a>
                                <a href="#" class="add"><i class='bx bxs-plus-circle'></i><span>Create New</span></a>
                            </div>
                        </div>

                        <table>

                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Addess</th>
                                    <th>Phone</th>
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
                                    <td><a href="#"><i class='bx bxs-pencil'></i><span>Edit</span></a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Hazmi Hazim</td>
                                    <td>Kambing@gmail.com</td>
                                    <td>Kuala Lumpur</td>
                                    <td>0123456789</td>
                                    <td><a href="#"><i class='bx bxs-pencil'></i><span>Edit</span></a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Hazmi Hazim</td>
                                    <td>Kambing@gmail.com</td>
                                    <td>Kuala Lumpur</td>
                                    <td>0123456789</td>
                                    <td><a href="#"><i class='bx bxs-pencil'></i><span>Edit</span></a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Hazmi Hazim</td>
                                    <td>Kambing@gmail.com</td>
                                    <td>Kuala Lumpur</td>
                                    <td>0123456789</td>
                                    <td><a href="#"><i class='bx bxs-pencil'></i><span>Edit</span></a></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Hazmi Hazim</td>
                                    <td>Kambing@gmail.com</td>
                                    <td>Kuala Lumpur</td>
                                    <td>0123456789</td>
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
