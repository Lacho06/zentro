@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Food</h2>
    <hr>

    <div class="d-flex flex-column">
        <a href="{{ route('food.create') }}" class="ml-auto my-2">
            <x-adminlte-button label="Add Food" theme="success" />
        </a>

        @php
            $heads = [
                'ID',
                'Name',
                'Price',
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
            ];
        @endphp
    
        <x-adminlte-datatable id="tableFood" :heads="$heads">
            @foreach($foods as $food)
                <tr>
                    <td>{{ $food->id }}</td>
                    <td>{{ $food->name }}</td>
                    <td>{{ $food->price }}</td>
                    <td class="d-flex">
                        <a href="{{ route('food.edit', $food) }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                        <form action="{{ route('food.destroy', $food) }}" method="post">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('food.show', $food) }}">
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