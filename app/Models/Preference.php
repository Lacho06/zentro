<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'title', 'subtitle', 'phone', 'location', 'cover_image', 'back_image', 'open_sunday', 'open_saturday', 'open_monday', 'close_sunday', 'close_saturday', 'close_monday', 'facebook_link', 'instagram_link', 'whatsapp_link'];
}
