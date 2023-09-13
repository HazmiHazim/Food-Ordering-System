@extends('company.admin.main')

@section('title', 'Partnership')

@section('content')

    <div class="partnership-index">

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
                        <h1>Partnership</h1>
                    </div>
                    <a href="{{ route('partnership-create') }}" class="create"><span>Add New Partnership</span></a>
                </div>

                <div class="bottom-section">

                    @foreach ($partner as $partner)

                        <div class="container">

                            <div class="partner">
                                <div class="display">
                                    <img src="{{ asset($partner->image) }}" alt="KFC Logo">
                                    <div class="name">
                                        <h2>{{ $partner->company_name }}</h2>
                                        <div class="details">
                                            <div class="label">
                                                <span>Owner</span>
                                                <span>Date Join</span>
                                                <span>Location</span>
                                            </div>
                                            <div class="output">
                                                <span>{{ $partner->owner_name }}</span>
                                                <span>{{ date('F Y', strtotime($partner->date_join)) }}</span>
                                                <span>{{ $partner->location }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="action">
                                    <a href="{{ route('partnership-edit', ['partnership' => $partner->id]) }}"><i class='bx bxs-show'></i><span>Edit</span></a>
                                    <form action="{{ route('partnership.destroy', $partner->id) }}" method="POST" id="deleteForm">
                                        @method('DELETE')

                                        @csrf

                                        <button type="button" class="delete-button-popup">
                                            <i class='bx bxs-trash-alt'></i>
                                            <span>Remove</span>
                                        </button>

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </div>
                            </div>

                        </div>

                    @endforeach

                </div>

                <div class="delete-confirmation" id="deletePopup">
                    <i class='bx bxs-info-circle'></i>
                    <h1>Warning</h1>
                    <h3>Are you sure you want to delete this staff?</h3>
                    <p>Once deleted, you will not be able to recover this data!</p>
                    <div class="button">
                        <button class="close-popup">Cancel</button>
                        <button class="confirm-delete">Delete</button>
                    </div>
                </div>

            </main>

        </section>

    </div>

@endsection
