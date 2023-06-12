@extends('adminlte::page')
@section('content')

    <h2 class="py-2">Preferences</h2>
    <hr>

    @if ($preference)
        <div class="row d-flex flex-column mx-2 mx-md-4">
            <div class="d-flex mx-md-2">
                <h3 class="my-auto">Site name: {{ $preference->name }}</h3>
                <a class="my-auto ml-auto" href="{{ route('preference.edit', $preference) }}">
                    <x-adminlte-button label="Edit" theme="warning" />
                </a>
            </div>
            <div class="d-flex flex-column mx-md-2">
                <h5>Title: {{ $preference->title }}</h5>
                <h6>Subtitle: {{ $preference->subtitle }}</h6>
                <p>Phone: {{ $preference->phone }}</p>
                <p>Location: {{ $preference->location }}</p>
            </div>
            <div class="d-flex flex-column mx-md-2">
                <span>Open</span>
                <p>Sunday: {{ $preference->open_sunday." - ".$preference->close_sunday }}</p>
                <p>Monday - Friday: {{ $preference->open_monday." - ".$preference->close_monday }}</p>
                <p>Saturday: {{ $preference->open_saturday." - ".$preference->close_saturday }}</p>
            </div>
            <div class="d-flex flex-column mx-md-2">
                <span>Links</span>
                <p>Facebook: {{ $preference->facebook_link }}</p>
                <p>Instagram: {{ $preference->instagram_link }}</p>
                <p>WhatsApp: {{ $preference->whatsapp_link }}</p>
            </div>
            <div class="d-flex flex-column mx-md-2">
                <span>Images</span>
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-md-around">
                    <img src="{{ Storage::url($preference->cover_image) }}" class="my-2 my-md-0" width="200" height="200" alt="">
                    <img src="{{ Storage::url($preference->back_image) }}" class="my-2 my-md-0" width="200" height="200" alt="">
                </div>
            </div>
        </div>
    @else
        <form action="{{ route('preference.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <x-adminlte-input name="name" label="Name" placeholder="Name"
                    fgroup-class="col-md-6" value="{{ old('name') }}" />
                <x-adminlte-input name="title" label="Title" placeholder="Title"
                    fgroup-class="col-md-6" value="{{ old('title') }}" />
            </div>
            <div class="row">
                <x-adminlte-input name="subtitle" label="Subtitle" placeholder="Subtitle"
                    fgroup-class="col-md-6" value="{{ old('subtitle') }}" />
                <x-adminlte-input name="phone" label="Phone" placeholder="Phone"
                    fgroup-class="col-md-6" value="{{ old('phone') }}" />
            </div>
            <div class="row">
                <x-adminlte-input name="location" label="Location" placeholder="Location"
                    fgroup-class="col-md-6" value="{{ old('location') }}" />
                @php
                    $config = ['format' => 'LT'];
                @endphp
                <div class="d-flex flex-column flex-md-row col-12">
                    <x-adminlte-input-date name="open_sunday" value="{{ old('open_sunday') }}" label="Open Sunday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                    <x-adminlte-input-date name="close_sunday" value="{{ old('close_sunday') }}" label="Close Sunday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
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
                    <x-adminlte-input-date name="open_saturday" value="{{ old('open_saturday') }}" label="Open Saturday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                    <x-adminlte-input-date name="close_saturday" value="{{ old('close_saturday') }}" label="Close Saturday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
                <div class="d-flex flex-column flex-md-row col-12">
                    <x-adminlte-input-date name="open_monday" value="{{ old('open_monday') }}" label="Open Monday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                    <x-adminlte-input-date name="close_monday" value="{{ old('close_monday') }}" label="Close Monday" :config="$config" placeholder="Choose a time..." fgroup-class="col-md-6">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
            </div>
            <div class="row">
                <x-adminlte-input name="facebook_link" value="{{ old('facebook_link') }}" label="Facebook link" placeholder="Facebook link"
                    fgroup-class="col-md-6" />
                <x-adminlte-input name="instagram_link" value="{{ old('instagram_link') }}" label="Instagram link" placeholder="Instagram link"
                    fgroup-class="col-md-6" />
            </div>
            <div class="row">
                <x-adminlte-input name="whatsapp_link" value="{{ old('whatsapp_link') }}" label="WhatsApp link" placeholder="WhatsApp link"
                    fgroup-class="col-md-6" />
            </div>
            <div class="row">
                <x-adminlte-input-file fgroup-class="col-md-6" name="cover_image" label="Cover image" placeholder="Choose a image..." />
                <x-adminlte-input-file fgroup-class="col-md-6" name="back_image" label="Back image" placeholder="Choose a image..." />
            </div>
            <x-adminlte-button type="submit" label="Send" theme="success" />
        </form>

    @endif


@endsection
