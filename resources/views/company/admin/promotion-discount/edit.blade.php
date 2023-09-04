@extends('company.admin.main')

@section('title', 'Edit')

@section('content')

    <div class="promotion-discount-edit">

        <section>

            <main>

                <div class="header">
                    <div class="left">
                        <h1>Edit Coupon</h1>
                    </div>
                </div>

                <div class="edit-section">

                    <form action="/" method="POST">

                        @method('PUT')

                        @csrf

                        <div class="container">

                            
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>

                </div>

            </main>

        </section>

    </div>

@endsection
