<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodIngredientRequest;
use App\Http\Requests\FoodRequest;
use App\Models\Food;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index(){
        $foods = Food::all();
        return view('admin.food.index', compact('foods'));
    }

    public function create(){
        $ingredients = Ingredient::all();
        return view('admin.food.create', compact('ingredients'));
    }

    public function store(FoodRequest $request){
        // subir la imagen
        $url = Storage::put('images', $request->image);
        // guardar los datos
        $food = Food::create([
            'name' => $request->name,
            'image' => $url,
            'price' => $request->price
        ]);
        
        $food->ingredients()->sync($request->addIngredients);

        return redirect()->route('food.index');
    }

    public function show(Food $food){
        return view('admin.food.show', compact('food'));
    }

    public function edit(Food $food){
        $ingredients = Ingredient::all();
        return view('admin.food.edit', compact('food', 'ingredients'));
    }

    public function update(FoodRequest $request, Food $food){
        if($request->image){
            // eliminar la imagen anterior
            Storage::delete($food->image);
            // subir la nueva imagen
            $url = Storage::put('images', $request->image);
            // actualizar los datos
            $food->update([
                'image' => $url
            ]);
        }
        if($request->price){
            $food->update([
                'price' => $request->price
            ]);    
        }

        $food->update([
            'name' => $request->name
        ]);

        $food->ingredients()->sync($request->addIngredients);

        return redirect()->route('food.show', $food);
    }

    public function destroy(Food $food){
        // eliminar la imagen
        Storage::delete($food->image);
        // eliminar los datos
        $food->delete();

        return redirect()->route('food.index');
    }
}
