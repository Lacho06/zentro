<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PreferenceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [AdminController::class, 'home'])->name('home');

Route::get('admin', [AdminController::class, 'index'])->middleware('auth')->name('admin');

Route::resource('admin/food', FoodController::class)->middleware('auth')->names('food');

Route::resource('admin/ingredient', IngredientController::class)->middleware('auth')->names('ingredient');

Route::resource('admin/menu', MenuController::class)->middleware('auth')->names('menu');

Route::resource('admin/place', PlaceController::class)->middleware('auth')->names('place');

Route::resource('admin/preference', PreferenceController::class)->except(['index', 'create', 'show', 'destroy'])->middleware('auth')->names('preference');