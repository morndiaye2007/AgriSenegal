<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'name',
        'description',
        'price',
        'stock',
        'image_path',
    ];

    //  Relations
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function commandeProduit()
    {
        return $this->hasMany(CommandeProduit::class);
    }
}
