<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';

    protected $primaryKey = 'idProduit';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'idAgriculteur',
        'nomProduit',
        'description',
        'prix_unitaire',
        'qualite_disponible',
        'etat',
    ];

    public function agriculteur()
    {
        return $this->belongsTo(Agriculteur::class, 'idAgriculteur', 'idAgriculteur');
    }
}
