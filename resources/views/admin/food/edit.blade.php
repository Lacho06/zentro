@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Food</h2>
    <hr>

    <form action="{{ route('food.update', $food) }}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <x-adminlte-input name="name" label="Name" placeholder="Name"
                fgroup-class="col-md-12" value="{{ old('name', $food->name) }}" />
        </div>
        <div class="row">
            <x-adminlte-input name="price" label="Price" placeholder="Price"
                fgroup-class="col-md-12" value="{{ old('name', $food->price) }}" />
        </div>
        <x-adminlte-input-file name="image" label="Upload image" placeholder="Choose a image..." />
        @php
            $config = [
                "title" => "Select multiple options...",
                "liveSearch" => true,
                "liveSearchPlaceholder" => "Search...",
                "showTick" => true,
                "actionsBox" => true,
            ];
        @endphp
        <x-adminlte-select-bs id="addIngredients" name="addIngredients[]" label="Add Ingredients"
            label-class="text-info" igroup-size="sm" :config="$config" multiple>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fa fa-cutlery"></i>
                </div>
            </x-slot>
            @php
                $exist = false;
            @endphp
            @foreach ($ingredients as $ingredient)
                @foreach ($food->ingredients as $i)
                    @if ($ingredient->id == $i->id)
                        <option value="{{ $ingredient->id }}" selected>{{ $ingredient->name }}</option>
                        @php
                            $exist = true;
                        @endphp
                    @endif
                @endforeach
                @if ($exist == false)
                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endif
                @php
                    $exist = false;
                @endphp
            @endforeach
        </x-adminlte-select-bs>
        <input type="hidden" name="form_type" value="edit">
        <x-adminlte-button type="submit" label="Send" theme="success" />
    </form>


@endsection