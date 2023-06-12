@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Place</h2>
    <hr>

    <div class="d-flex flex-column">
        <a href="{{ route('place.create') }}" class="ml-auto my-2">
            <x-adminlte-button label="Add Place" theme="success" />
        </a>

        @php
            $heads = [
                'ID',
                'Name',
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
            ];
        @endphp
    
        <x-adminlte-datatable id="tablePlace" :heads="$heads">
            @foreach($places as $place)
                <tr>
                    <td>{{ $place->id }}</td>
                    <td>{{ $place->name }}</td>
                    <td class="d-flex">
                        <a href="{{ route('place.edit', $place) }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                        <form action="{{ route('place.destroy', $place) }}" method="post" enctype="multipart/form-data">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('place.show', $place) }}">
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>


@endsection