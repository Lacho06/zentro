@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Food</h2>
    <hr>

    <div class="row d-flex">
        <div class="d-flex flex-column col-md-7">
            <img width="300" height="300" src="{{ asset('storage/'.$food->image) }}" alt="{{ $food->name }}">
        </div>
        <div class="d-flex flex-column col-md-5">
            <h3>Food id - <span>{{ $food->id }}</span></h3>
            <h3>Food name - <span>{{ $food->name }}</span></h3>
            <h3>Food price - $<span>{{ $food->price }}</span></h3>
        </div>
    </div>
    
@endsection