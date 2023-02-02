@extends('adminlte::page')
@section('content')
    
    <h2 class="py-2">Preferences</h2>
    <hr>

    <form action="{{ route('preference.update', $preference) }}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <x-adminlte-input name="name" label="Name" placeholder="Name"
                fgroup-class="col-md-6" value="{{ old('name', $preference->name) }}" />
            <x-adminlte-input name="title" label="Title" placeholder="Title"
                fgroup-class="col-md-6" value="{{ old('title', $preference->title) }}" />
        </div>
        <div class="row">
            <x-adminlte-input name="subtitle" label="Subtitle" placeholder="Subtitle"
                fgroup-class="col-md-6" value="{{ old('subtitle', $preference->subtitle) }}" />
            <x-adminlte-input name="phone" label="Phone" placeholder="Phone"
                fgroup-class="col-md-6" value="{{ old('phone', $preference->phone) }}" />
        </div>
        <div class="row">
            <x-adminlte-input name="location" label="Location" placeholder="Location"
                fgroup-class="col-md-6" value="{{ old('location', $preference->location) }}" />
            <x-adminlte-input name="open_sunday" label="Open Sunday" placeholder="Open Sunday"
                fgroup-class="col-md-6" value="{{ old('open_sunday', $preference->open_sunday) }}" />
        </div>
        <div class="row">
            <x-adminlte-input name="open_saturday" label="Open Saturday" placeholder="Open Saturday"
                fgroup-class="col-md-6" value="{{ old('open_saturday', $preference->open_saturday) }}" />
            <x-adminlte-input name="open_monday" label="Open Monday" placeholder="Open Monday"
                fgroup-class="col-md-6" value="{{ old('open_monday', $preference->open_monday) }}" />
        </div>
        <div class="row">
            <x-adminlte-input-file fgroup-class="col-md-6" name="cover_image" label="Cover image" placeholder="Choose a image..." />
            <x-adminlte-input-file fgroup-class="col-md-6" name="back_image" label="Back image" placeholder="Choose a image..." />
        </div>
        <input type="hidden" name="form_type" value="edit">
        <x-adminlte-button type="submit" label="Send" theme="success" />
    </form>


@endsection