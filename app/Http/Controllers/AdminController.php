<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Menu;
use App\Models\Place;
use App\Models\Preference;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $preference = Preference::all()->first();
        return view('admin.index', compact('preference'));
    }

    public function home(){
        $preference = Preference::all()->first();
        $foods = Food::take(5)->get();
        $menu = Menu::where('active', true)->first();
        $places = Place::all();
        return view('index', compact('preference', 'foods', 'menu', 'places'));
    }
}
