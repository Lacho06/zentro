<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    public function index(){
        $places = Place::all();
        return view('admin.place.index', compact('places'));
    }

    public function create(){
        return view('admin.place.create');
    }

    public function store(PlaceRequest $request){
        // subir la imagen
        $url = Storage::put('images', $request->image);
        // guardar los datos
        Place::create([
            'name' => $request->name,
            'image' => $url
        ]);

        return redirect()->route('place.index');
    }

    public function show(Place $place){
        return view('admin.place.show', compact('place'));
    }

    public function edit(Place $place){
        return view('admin.place.edit', compact('place'));
    }

    public function update(PlaceRequest $request, Place $place){
        if($request->image){
            // eliminar la imagen
            Storage::delete($place->image);
            // subir la nueva imagen
            $url = Storage::put('images', $request->image);
            // actualizar los datos
            $place->update([
                'image' => $url
            ]);
        }
        if($request->name){
            // actualizar los datos
            $place->update([
                'name' => $request->name
            ]);
        }
        return redirect()->route('place.show', $place);
    }

    public function destroy(Place $place){
        // eliminar la imagen
        Storage::delete($place->image);
        // eliminar los datos
        $place->delete();
        return redirect()->route('place.index');
    }
}
