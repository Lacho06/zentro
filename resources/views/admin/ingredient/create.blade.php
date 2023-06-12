@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Ingredient</h2>
    <hr>

    <form action="{{ route('ingredient.store') }}" method="post">
        @csrf
        <div class="row">
            <x-adminlte-input name="name" label="Name" placeholder="Name"
                fgroup-class="col-md-12" />
        </div>
        <x-adminlte-button type="submit" label="Send" theme="success" />
    </form>

@endsection