@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Ingredient</h2>
    <hr>

    <form action="{{ route('ingredient.update', $ingredient) }}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <x-adminlte-input name="name" label="Name" value="{{ old('name', $ingredient->name) }}" placeholder="Name"
                fgroup-class="col-md-12" />
        </div>
        {{-- <x-adminlte-select name="add_food">
            @forelse ($foods as $food)
                @if ($loop->first)
                    <option selected>{{ $food->name }}</option>
                @else
                    <option>{{ $food->name }}</option>
                @endif
            @empty
                <option disabled selected>Foods not allowed</option>
            @endforelse
        </x-adminlte-select> --}}
        <x-adminlte-button type="submit" label="Send" theme="success" />
    </form>

@endsection