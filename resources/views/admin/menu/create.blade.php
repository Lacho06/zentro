@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Menu</h2>
    <hr>

    <form action="{{ route('menu.store') }}" method="post">
        @csrf
        <div class="row">
            <x-adminlte-input name="name" label="Name" placeholder="Name"
                fgroup-class="col-md-12" />
        </div>
        @php
            $config = [
                "title" => "Select multiple options...",
                "liveSearch" => true,
                "liveSearchPlaceholder" => "Search...",
                "showTick" => true,
                "actionsBox" => true,
            ];
        @endphp
        <x-adminlte-select-bs id="addFoods" name="addFoods[]" label="Add Foods"
            label-class="text-info" igroup-size="sm" :config="$config" multiple>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fa fa-cutlery"></i>
                </div>
            </x-slot>
            @forelse ($foods as $food)
                <option value="{{ $food->id }}">{{ $food->name }}</option>
            @empty
                <option disabled>Not foods allowed</option>
            @endforelse
        </x-adminlte-select-bs>

        <x-adminlte-input-switch name="active" label="Active" data-on-text="YES" data-off-text="NO"
        data-on-color="teal"/>
        <x-adminlte-button type="submit" label="Send" theme="success" />
    </form>


@endsection