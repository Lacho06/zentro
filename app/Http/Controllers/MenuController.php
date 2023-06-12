<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Food;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::all();
        return view('admin.menu.index', compact('menus'));
    }

    public function create(){
        $foods = Food::all();
        return view('admin.menu.create', compact('foods'));
    }

    public function store(MenuRequest $request){
        $active = false;
        if($request->active){
            $active = true;
            $menus = Menu::all();
            foreach($menus as $menu){
                $menu->update([
                    'active' => false
                ]);
            }
        }
        // guardar los datos
        $menu = Menu::create([
            'name' => $request->name,
            'active' => $active
        ]);

        $menu->foods()->sync($request->addFoods);

        return redirect()->route('menu.index');
    }

    public function show(Menu $menu){
        return view('admin.menu.show', compact('menu'));
    }

    public function edit(Menu $menu){
        $foods = Food::all();
        return view('admin.menu.edit', compact('menu', 'foods'));
    }

    public function update(MenuRequest $request, Menu $menu){
        $active = false;
        if($request->active){
            $active = true;
            $menus = Menu::all();
            foreach($menus as $menu){
                $menu->update([
                    'active' => false
                ]);
            }
        }
        // actualizar los datos
        $menu->update([
            'name' => $request->name,
            'active' => $active
        ]);

        $menu->foods()->sync($request->addFoods);

        return redirect()->route('menu.show', $menu);
    }

    public function destroy(Menu $menu){
        // borrar los datos
        $menu->delete();

        return redirect()->route('menu.index');
    }
}
