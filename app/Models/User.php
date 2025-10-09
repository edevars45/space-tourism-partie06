<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;     // j’utilise la factory pour les seeds/tests
use Illuminate\Foundation\Auth\User as Authenticatable;    // base utilisateur Laravel
use Illuminate\Notifications\Notifiable;                   // notifications (mail, etc.)
use Spatie\Permission\Traits\HasRoles;                     // j’ajoute le trait Spatie pour rôles/permissions

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;                  // j’active HasRoles ici

    /**
     * Attributs assignables en masse (formulaires).
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Attributs cachés lors de la sérialisation (JSON, API).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts automatiques des colonnes.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',             // je parse la date de vérification
            'password' => 'hashed',                        // je hash automatiquement le mot de passe
        ];
    }
}
