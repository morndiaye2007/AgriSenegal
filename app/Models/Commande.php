<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{

    Use HasFactory;
    protected $fillable = [
        'user_id',
        'produit_id',
        'quantite',
        'prix',
        'total',
        'image',
        'statut',
        'date',
    ];
}
