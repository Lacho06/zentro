@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Ingredient</h2>
    <hr>

    <h3>Ingredient id - <span>{{ $ingredient->id }}</span></h3>
    <h3>Ingredient name - <span>{{ $ingredient->name }}</span></h3>

@endsection