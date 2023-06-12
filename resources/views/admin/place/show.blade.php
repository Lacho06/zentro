@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Place</h2>
    <hr>

    <div class="row d-flex">
        <div class="d-flex flex-column col-md-7">
            <img width="300" height="300" src="{{ asset('storage/'.$place->image) }}" alt="{{ $place->name }}">
        </div>
        <div class="d-flex flex-column col-md-5">
            <h3>Place id - <span>{{ $place->id }}</span></h3>
            <h3>Place name - <span>{{ $place->name }}</span></h3>
        </div>
    </div>

@endsection