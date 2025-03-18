@extends('company.admin.main')
@section('title', 'Staff Account')
@section('content')

    <div class="staff-account-index">
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
                        <h1>Staff Account</h1>
                    </div>
                    <a href="{{ route('staff-account-create') }}" class="create">
                        <span>Create New Staff ID</span>
                    </a>
                </div>

                <!-- Staff Registered -->
                <div class="custom-card1">
                    <div class="container">
                        <div class="header">
                            <i class='bx bx-detail'></i>
                            <h3>Staff Details</h3>
                            <i class='bx bx-filter' ></i>
                            <form action="{{ route('staff-account-search-index') }}" method="GET" id="search-form">
                                <div class="search-field">
                                    <i class='bx bx-search' id="search-button"></i>
                                    <input type="text" name="search" placeholder="Search" value="{{ old('search') }}">
                                </div>
                            </form>
                        </div>

                        @include('partials.table1', [
                            'tableId' => 'CompanyStaffAccountIndex',
                            'tableAllCheckBoxId' => 'StaffAccountIndexAllCheckBox',
                            'tableCheckboxName' => 'StaffAccountIndexAllCheckBox',
                            'tableHeaders' => ['Staff ID', 'Name', 'Email', 'Phone'],
                            'tableBodyCheckBoxId' => 'StaffAccountIndexCheckBox_',
                            'tableBodyCheckBoxName' => 'StaffAccountIndexCheckBox',
                            'tableDatas' => $staff,
                            'tableFields' => ['staff_id', 'name', 'email', 'phone'],
                            'buttonLink' => fn($td) => route('staff-account-show', ['staff_account' => $td->id]),
                        ])

                        <div class="pagination">
                            <div class="count">Showing {{ $staff->firstItem() }} to {{ $staff->lastItem() }} out of {{ $staff->total()}} results</div>
                            <div class="pagination-number">
                                <div class="page-number">{{ $staff->render('partials.paginator') }}</div>
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
            $('#StaffAccountIndexAllCheckBox').on('change', function () {
                let allCheckBox = $(this);
                let isChecked = allCheckBox.prop('checked');
                let idList = [];

                $('input[id^="StaffAccountIndexCheckBox_"]').each(function () {
                    $(this).prop("checked", isChecked);
                    idList.push($(this).val());
                });
            });
        });
    </script>
@endsection
