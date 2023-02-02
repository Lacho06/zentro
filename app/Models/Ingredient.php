<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // relacion con foods
    public function foods(){
        return $this->belongsToMany(Food::class);
    }
}
