@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Place</h2>
    <hr>

    <form action="{{ route('place.update', $place) }}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <x-adminlte-input name="name" label="Name" placeholder="Name"
                fgroup-class="col-md-12" value="{{ old('name', $place->name) }}" />
        </div>
        <x-adminlte-input-file name="image" label="Upload image" placeholder="Choose a image..." />
        <input type="hidden" name="form_type" value="edit">
        <x-adminlte-button type="submit" label="Send" theme="success" />
    </form>

@endsection