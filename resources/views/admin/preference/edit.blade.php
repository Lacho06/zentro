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
            @php
                $config = ['format' => 'LT'];
            @endphp
            <div class="d-flex flex-column flex-md-row col-12">
                <x-adminlte-input-date name="open_sunday" value="{{ old('open_sunday', $preference->open_sunday) }}" label="Open Sunday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
                <x-adminlte-input-date name="close_sunday" value="{{ old('close_sunday', $preference->close_sunday) }}" label="Close Sunday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
        </div>
        <div class="row">
            <div class="d-flex flex-column flex-md-row col-12">
                <x-adminlte-input-date name="open_saturday" value="{{ old('open_saturday', $preference->open_saturday) }}" label="Open Saturday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
                <x-adminlte-input-date name="close_saturday" value="{{ old('close_saturday', $preference->close_saturday) }}" label="Close Saturday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
            <div class="d-flex flex-column flex-md-row col-12">
                <x-adminlte-input-date name="open_monday" value="{{ old('open_monday', $preference->open_monday) }}" label="Open Monday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
                <x-adminlte-input-date name="close_monday" value="{{ old('close_monday', $preference->close_monday) }}" label="Close Monday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
        </div>
        <div class="row">
            <x-adminlte-input name="facebook_link" label="Facebook link" placeholder="Facebook link"
                fgroup-class="col-md-6" value="{{ old('facebook_link', $preference->facebook_link) }}" />
            <x-adminlte-input name="instagram_link" label="Instagram link" placeholder="Instagram link"
                fgroup-class="col-md-6" value="{{ old('instagram_link', $preference->instagram_link) }}" />
        </div>
        <div class="row">
            <x-adminlte-input name="whatsapp_link" label="WhatsApp link" placeholder="WhatsApp link"
                fgroup-class="col-md-6" value="{{ old('whatsapp_link', $preference->whatsapp_link) }}" />
        </div>
        <div class="row">
            <x-adminlte-input-file fgroup-class="col-md-6" name="cover_image" label="Cover image" placeholder="Choose a image..." />
            <x-adminlte-input-file fgroup-class="col-md-6" name="back_image" label="Back image" placeholder="Choose a image..." />
        </div>
        <input type="hidden" name="form_type" value="edit">
        <x-adminlte-button type="submit" label="Update" theme="warning" />
    </form>


@endsection
