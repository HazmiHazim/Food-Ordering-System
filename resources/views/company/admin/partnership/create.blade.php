@extends('company.admin.main')

@section('title', 'Create')

@section('content')

    <div class="partnership-create">

        <section>

            <main>

                @if (session('success-message'))
                    <div class="success-message">
                        <i class='bx bxs-check-circle'></i>
                        <div class="text">
                            <span>Success</span>
                            <span class="message">{{ session('success-message') }}</span>
                        </div>
                    </div>
                @endif

                <div class="header">
                    <div class="left">
                        <h1>Add Partnership</h1>
                    </div>
                </div>

                <div class="create-section">

                    <form action="{{ route('partnership.store') }}" method="POST" enctype="multipart/form-data" id="imageForm">

                        @csrf

                        <div class="container">

                            <div class="drag-area">
                                <i class='bx bxs-cloud-upload'></i>
                                <h2 class="drag-text">Drag and drop to upload logo</h2>
                                <input type="file" hidden name="image" accept="image/*" class="select-image-input">
                            </div>

                            <div class="details">
                                <div class="data">
                                    <span>Company Name</span>
                                    <input type="text" name="company_name" placeholder="Enter Company Name" required>

                                    <span>Owner Name</span>
                                    <input type="text" name="owner_name" placeholder="Enter Owner's Name" required>

                                    <span>Date Join</span>
                                    <input type="date" name="date" placeholder="Select Partnership Join Date" required>

                                    <span>Location</span>
                                    <input type="text" name="location" placeholder="Enter Company Location" required>
                                </div>
                            </div>

                        </div>

                        <div class="button-section">
                            <div class="button">
                                <input type="submit" value="Add Partner">
                                <a href="{{ route('partnership') }}"><span>Cancel</span></a>
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                </div>
                
            </main>

        </section>

    </div>

@endsection
