@extends('company.admin.main')

@section('title', 'Partnership')

@section('content')

    <div class="partnership-index">

        <section>

            <main>

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
                                                <span>{{ \Carbon\Carbon::parse($partner->date_join)->formatLocalized('%B %Y') }}</span>
                                                <span>{{ $partner->location }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="action">
                                    <a href="#"><i class='bx bxs-show'></i><span>Edit</span></a>
                                    <form action="/" method="POST" id="deleteForm">
                                        @method('DELETE')

                                        @csrf

                                        <button>
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

            </main>

        </section>

    </div>

@endsection
