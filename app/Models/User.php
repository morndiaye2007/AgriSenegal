<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    // On garde user_id comme clé primaire
    protected $primaryKey = 'user_id';
    protected $keyType = 'int';
    public $incrementing = true;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'telephone',
        'adresse',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // JWT Identifier
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // JWT Custom Claims
    public function getJWTCustomClaims()
    {
        return [];
    }
}
