<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parcelle extends Model
{
    protected $primaryKey = 'idParcelle';

    protected $fillable = [
        'idAgriculteur',
        'nomParcelle',
        'superficie',
        'localisation_gps',
    ];

    // Si tu veux désactiver l'auto-incrémentation (si idParcelle est géré manuellement)
    // public $incrementing = false;

    // Si tu veux définir la clé comme de type int (elle l’est par défaut)
    protected $keyType = 'int';

    /**
     * Relation avec l'agriculteur
     */
    public function agriculteur(): BelongsTo
    {
        return $this->belongsTo(Agriculteur::class, 'idAgriculteur', 'idAgriculteur');
    }
}
