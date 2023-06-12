@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Place</h2>
    <hr>

    <form action="{{ route('place.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <x-adminlte-input name="name" label="Name" placeholder="Name"
                fgroup-class="col-md-12" />
        </div>
        <x-adminlte-input-file name="image" label="Upload image" placeholder="Choose a image..." />
        <x-adminlte-button type="submit" label="Send" theme="success" />
    </form>

@endsection