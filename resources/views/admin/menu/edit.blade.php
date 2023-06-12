@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Menu</h2>
    <hr>

    <form action="{{ route('menu.update', $menu) }}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <x-adminlte-input name="name" label="Name" placeholder="Name"
                fgroup-class="col-md-12" value="{{ old('name', $menu->name) }}" />
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
            @php
                $exist = false;
            @endphp
            @foreach ($foods as $food)
                @foreach ($menu->foods as $i)
                    @if ($food->id == $i->id)
                        <option value="{{ $food->id }}" selected>{{ $food->name }}</option>
                        @php
                            $exist = true;
                        @endphp
                    @endif
                @endforeach
                @if ($exist == false)
                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                @endif
                @php
                    $exist = false;
                @endphp
            @endforeach
        </x-adminlte-select-bs>
        @if ($menu->active == 1)
            <x-adminlte-input-switch name="active" label="Active" data-on-text="YES" data-off-text="NO"
            data-on-color="teal" checked />
        @else
            <x-adminlte-input-switch name="active" label="Active" data-on-text="YES" data-off-text="NO"
            data-on-color="teal" />
        @endif
        <x-adminlte-button type="submit" label="Send" theme="success" />
    </form>


@endsection