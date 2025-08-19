<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    protected $table = 'ligne_commandes';
    protected $primaryKey = 'idLigne_Commande';

    protected $fillable = [
        'id_commande',
        'id_produit',
        'quantite',
        'prix_unitaire_vente',
    ];

    // Relations

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'id_commande', 'idCommande');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit', 'idProduit');
    }
}
