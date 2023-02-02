<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'active'];

    // relacion con foods
    public function foods(){
        return $this->belongsToMany(Food::class);
    }
}
