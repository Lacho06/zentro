@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Food</h2>
    <hr>

    <form action="{{ route('food.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <x-adminlte-input name="name" label="Name" placeholder="Name"
                fgroup-class="col-md-12" />
        </div>
        <div class="row">
            <x-adminlte-input name="price" label="Price" placeholder="Price"
                fgroup-class="col-md-12" />
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
            @forelse ($ingredients as $ingredient)
                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
            @empty
                <option disabled>Not ingredients allowed</option>
            @endforelse
        </x-adminlte-select-bs>
        <x-adminlte-button type="submit" label="Send" theme="success" />
    </form>


@endsection