<?php

namespace App\Http\Controllers;

use App\Http\Requests\PreferenceRequest;
use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreferenceController extends Controller
{
    public function store(PreferenceRequest $request){
        // subir las imagenes
        $urlCoverImage = Storage::put('images', $request->cover_image);
        $urlBackImage = Storage::put('images', $request->back_image);

        // guardar los datos
        Preference::create([
            'name' => $request->name,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'phone' => $request->phone,
            'location' => $request->location,
            'cover_image' => $urlCoverImage,
            'back_image' => $urlBackImage,
            'open_sunday' => $request->open_sunday,
            'open_saturday' => $request->open_saturday,
            'open_monday' => $request->open_monday
        ]);

        return redirect()->route('admin');
    }

    public function edit(Preference $preference){
        return view('admin.preference.edit', compact('preference'));
    }

    public function update(PreferenceRequest $request, Preference $preference){
        if($request->cover_image){
            // borrar la imagen
            Storage::delete($preference->cover_image);
            // guardar la nueva imagen
            $urlCoverImage = Storage::put('images', $request->cover_image);
            // actualizar los datos
            $preference->update([
                'cover_image' => $urlCoverImage
            ]);
        }
        if($request->back_image){
            // borrar la imagen
            Storage::delete($preference->back_image);
            // guardar la nueva imagen
            $urlBackImage = Storage::put('images', $request->back_image);
            // actualizar los datos
            $preference->update([
                'back_image' => $urlBackImage
            ]);
        }
        if($request->name){
            $preference->update([
                'name' => $request->name
            ]);
        }
        if($request->title){
            $preference->update([
                'title' => $request->title
            ]);
        }
        if($request->subtitle){
            $preference->update([
                'subtitle' => $request->subtitle
            ]);
        }
        if($request->phone){
            $preference->update([
                'phone' => $request->phone
            ]);
        }
        if($request->location){
            $preference->update([
                'location' => $request->location
            ]);
        }
        if($request->open_sunday){
            $preference->update([
                'open_sunday' => $request->open_sunday
            ]);
        }
        if($request->open_saturday){
            $preference->update([
                'open_saturday' => $request->open_saturday
            ]);
        }
        if($request->open_monday){
            $preference->update([
                'open_monday' => $request->open_monday
            ]);
        }

        return redirect()->route('admin');
    }
}
