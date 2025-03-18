<table id="{{ $tableId ?? 'table1' }}" class="table1">
    <thead>
        <tr>
            <th width="5%">
                <input type="checkbox" name="{{ $tableCheckboxName }}" id="{{ $tableAllCheckBoxId }}">
            </th>
            @foreach ($tableHeaders as $th)
                <th>{{ $th }}</th>
            @endforeach
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tableDatas as $td)
            <tr>
                <td>
                    <input type="checkbox" name="{{ $tableBodyCheckBoxName }}" id="{{ $tableBodyCheckBoxId . $td->id }}" value="{{ $td->id }}">
                </td>
                @foreach ($tableFields as $field)
                    <td>
                        @if ($field == 'image')
                            <img src="{{ asset($td->image) }}">
                        @elseif ($field == 'description')
                            {{ Str::limit($td->$field, 30) }}
                        @elseif ($field == 'price')
                            RM {{ $td->$field }}
                        @elseif(str_contains($field, '.'))
                            {{ data_get($td, $field) }}
                        @else
                            {{ $td->$field }}
                        @endif
                    </td>
                @endforeach
                <td>
                    <a href="{{ $buttonLink($td) }}">
                        <i class='bx bxs-pencil'></i>
                        <span>Edit</span>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>