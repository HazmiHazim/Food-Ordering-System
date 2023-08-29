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
                    <a href="#" class="create"><span>Add New Partnership</span></a>
                </div>

                <div class="bottom-section">

                    <!-- foreach -->

                    <div class="container">

                        <div class="partner">
                            <div class="display">
                                <img src="{{ asset('images/starbucks.png') }}" alt="KFC Logo">
                                <div class="name">
                                    <h2>Kentucky Fried Chicken (KFC)</h2>
                                    <div class="details">
                                        <div class="label">
                                            <span>Owner</span>
                                            <span>Date Join</span>
                                            <span>Location</span>
                                        </div>
                                        <div class="output">
                                            <span>test1</span>
                                            <span>test2</span>
                                            <span>test3</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="action">
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

                    <!-- End foreach -->

                    <div class="container">

                        <div class="partner">
                            <div class="display">
                                <img src="{{ asset('images/burger-king.png') }}" alt="KFC Logo">
                                <div class="name">
                                    <h2>Kentucky Fried Chicken (KFC)</h2>
                                    <div class="details">
                                        <div class="label">
                                            <span>Owner</span>
                                            <span>Date Join</span>
                                            <span>Location</span>
                                        </div>
                                        <div class="output">
                                            <span>test1</span>
                                            <span>test2</span>
                                            <span>test3</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="action">
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

                </div>

            </main>

        </section>

    </div>

@endsection
