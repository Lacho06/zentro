@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Ingredient</h2>
    <hr>

    <div class="d-flex flex-column">
        <a href="{{ route('ingredient.create') }}" class="ml-auto my-2">
            <x-adminlte-button label="Add Ingredient" theme="success" />
        </a>

        @php
            $heads = [
                'ID',
                'Name',
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
            ];
        @endphp
    
        <x-adminlte-datatable id="tableIngredient" :heads="$heads">
            @foreach($ingredients as $ingredient)
                <tr>
                    <td>
                        {{ $ingredient->id }}
                    </td>
                    <td>
                        {{ $ingredient->name }}
                    </td>
                    <td class="d-flex">
                        <a href="{{ route('ingredient.edit', $ingredient) }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                        <form action="{{ route('ingredient.destroy', $ingredient) }}" method="post">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('ingredient.show', $ingredient) }}">
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