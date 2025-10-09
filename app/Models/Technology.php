<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',         // nom
        'slug',         // slug unique
        'description',  // texte
        'website_url',  // URL officielle
        'image_path',   // chemin image (storage)
        'is_published', // bool publié ?
        'order',        // ordre d’affichage
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
