<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientRequest;
use App\Models\Food;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index(){
        $ingredients = Ingredient::all();
        return view('admin.ingredient.index', compact('ingredients'));
    }

    public function create(){
        $foods = Food::all();
        return view('admin.ingredient.create', compact('foods'));
    }

    public function store(IngredientRequest $request){
        // guardar los datos
        Ingredient::create([
            'name' => $request->name
        ]);

        return redirect()->route('ingredient.index');
    }

    public function show(Ingredient $ingredient){
        return view('admin.ingredient.show', compact('ingredient'));
    }

    public function edit(Ingredient $ingredient){
        return view('admin.ingredient.edit', compact('ingredient'));
    }

    public function update(IngredientRequest $request, Ingredient $ingredient){
        // actualizar los datos
        $ingredient->update([
            'name' => $request->name
        ]);

        return redirect()->route('ingredient.show', $ingredient);
    }

    public function destroy(Ingredient $ingredient){
        // eliminar los datos
        $ingredient->delete();

        return redirect()->route('ingredient.index');
    }
}
