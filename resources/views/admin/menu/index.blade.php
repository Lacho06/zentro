@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Menu</h2>
    <hr>

    <div class="d-flex flex-column">
        <a href="{{ route('menu.create') }}" class="ml-auto my-2">
            <x-adminlte-button label="Add Menu" theme="success" />
        </a>

        @php
            $heads = [
                'ID',
                'Name',
                'Active',
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
            ];
        @endphp
    
        <x-adminlte-datatable id="tableMenu" :heads="$heads">
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>@if ($menu->active)
                        Activo
                    @else
                        Inactivo                        
                    @endif</td>
                    <td class="d-flex">
                        <a href="{{ route('menu.edit', $menu) }}">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                        </a>
                        <form action="{{ route('menu.destroy', $menu) }}" method="post">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('menu.show', $menu) }}">
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