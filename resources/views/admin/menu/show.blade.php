@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Menu</h2>
    <hr>

    <h3>Menu id - <span>{{ $menu->id }}</span></h3>
    <h3>Menu name - <span>{{ $menu->name }}</span></h3>

    <h2 class="pt-4 pb-2">Foods List</h2>
    <hr>

    <ul>
        @foreach ($menu->foods as $food)
            <li class="h3"><a href="{{ route('food.show', $food) }}">{{ $food->name }}</a> ...... <b>$<span>{{ $food->price }}</span></b></li>
        @endforeach
    </ul>
    
@endsection