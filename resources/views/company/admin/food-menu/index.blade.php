@extends('company.admin.main')
@section('title', 'Food Menu')
@section('content')

    <div class="food-menu-index">
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
                        <h1>Food Menu</h1>
                    </div>
                    <a href="{{ route('food-menu-create') }}" class="create">
                        <span>Create New Food Menu</span>
                    </a>
                </div>

                <!-- Food Menu -->
                <div class="custom-card1">
                    <div class="container">
                        <div class="header">
                            <i class='bx bx-detail'></i>
                            <h3>Menu</h3>
                            <i class='bx bx-filter' ></i>
                            <form action="{{ route('food-menu-search-index') }}" method="GET" id="search-form">
                                <div class="search-field">
                                    <i class='bx bx-search' id="search-button"></i>
                                    <input type="text" name="search" placeholder="Search" value="{{ old('search') }}">
                                </div>
                            </form>
                        </div>

                        @include('partials.table1', [
                            'tableId' => 'FoodMenuIndex',
                            'tableAllCheckBoxId' => 'FoodMenuIndexAllCheckBox',
                            'tableCheckboxName' => 'FoodMenuIndexAllCheckBox',
                            'tableHeaders' => ['Name', 'Description', 'Price', 'Category', 'Image'],
                            'tableBodyCheckBoxId' => 'FoodMenuIndexCheckBox_',
                            'tableBodyCheckBoxName' => 'FoodMenuIndexCheckBox',
                            'tableDatas' => $food,
                            'tableFields' => ['name', 'description', 'price', 'foodCategory.name', 'image'],
                            'buttonLink' => fn($td) => route('food-menu-show', ['food_menu' => $td->id]),
                        ])

                        <div class="pagination">
                            <div class="count">Showing {{ $food->firstItem() }} to {{ $food->lastItem() }} out of {{ $food->total()}} results</div>
                            <div class="pagination-number">
                                <div class="page-number">{{ $food->render('partials.paginator') }}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            $('#FoodMenuIndexAllCheckBox').on('change', function () {
                let allCheckBox = $(this);
                let isChecked = allCheckBox.prop('checked');
                let idList = [];

                $('input[id^="FoodMenuIndexCheckBox_"]').each(function () {
                    $(this).prop("checked", isChecked);
                    idList.push($(this).val());
                });
            });
        });
    </script>
@endsection
