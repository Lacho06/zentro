<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'price'];

    // relacion con ingredients
    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
    }
    // relacion con menus
    public function menus(){
        return $this->belongsToMany(Menu::class);
    }
}
