@extends('company.admin.main')

@section('title', 'Edit')

@section('content')

    <div class="partnership-edit">

        <section>

            <main>

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
                        <h1>Edit Partnership</h1>
                    </div>
                </div>

                <div class="edit-section">

                    <form action="{{ route('partnership.update', $partner->id) }}" method="POST" enctype="multipart/form-data" id="imageForm">

                        @method('PUT')

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
                                    <input type="text" name="company_name" placeholder="{{ $partner->company_name }}">

                                    <span>Owner Name</span>
                                    <input type="text" name="owner_name" placeholder="{{ $partner->owner_name }}">

                                    <span>Date Join</span>
                                    <input type="date" name="date" placeholder="Date Join" value="{{ $partner->date_join }}">

                                    <span>Location</span>
                                    <input type="text" name="location" placeholder="{{ $partner->location }}">
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
