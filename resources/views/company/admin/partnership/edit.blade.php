@extends('company.admin.main')

@section('title', 'Edit')

@section('content')

    <div class="partnership-edit">

        <section>

            <main>

                <div class="header">
                    <div class="left">
                        <h1>Edit Partnership</h1>
                    </div>
                </div>

                <form action="/" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                
            </main>

        </section>

    </div>

@endsection
