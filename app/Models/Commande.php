<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commande extends Model
{
    protected $table = 'commandes';

    protected $primaryKey = 'idCommande';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'idAcheteur',
        'dateCommande',
        'etat_commande',
        'montant_total',
        'id_partenaire_livraison',
    ];

    
    public function acheteur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idAcheteur', 'idUtilisateur');
    }

   
    public function partenaireLivraison(): BelongsTo
    {
        return $this->belongsTo(PartenaireLivraison::class, 'id_partenaire_livraison', 'idPartenaireLivraison');
    }
}
