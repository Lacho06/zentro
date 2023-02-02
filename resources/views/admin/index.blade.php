@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Preferences</h2>
    <hr>

    @if ($preference)
        <div class="row d-flex">
            <a class="ml-auto mr-2" href="{{ route('preference.edit', $preference) }}">
                <x-adminlte-button label="Edit" theme="warning" />
            </a>
        </div>
    @endif

    <form action="{{ route('preference.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <x-adminlte-input name="name" label="Name" placeholder="Name"
                fgroup-class="col-md-6" />
            <x-adminlte-input name="title" label="Title" placeholder="Title"
                fgroup-class="col-md-6" />
        </div>
        <div class="row">
            <x-adminlte-input name="subtitle" label="Subtitle" placeholder="Subtitle"
                fgroup-class="col-md-6" />
            <x-adminlte-input name="phone" label="Phone" placeholder="Phone"
                fgroup-class="col-md-6" />
        </div>
        <div class="row">
            <x-adminlte-input name="location" label="Location" placeholder="Location"
                fgroup-class="col-md-6" />
            <x-adminlte-input name="open_sunday" label="Open Sunday" placeholder="Open Sunday"
                fgroup-class="col-md-6" />
        </div>
        <div class="row">
            <x-adminlte-input name="open_saturday" label="Open Saturday" placeholder="Open Saturday"
                fgroup-class="col-md-6" />
            <x-adminlte-input name="open_monday" label="Open Monday" placeholder="Open Monday"
                fgroup-class="col-md-6" />
        </div>
        <div class="row">
            <x-adminlte-input-file fgroup-class="col-md-6" name="cover_image" label="Cover image" placeholder="Choose a image..." />
            <x-adminlte-input-file fgroup-class="col-md-6" name="back_image" label="Back image" placeholder="Choose a image..." />
        </div>
        <x-adminlte-button type="submit" label="Send" theme="success" />
    </form>


@endsection