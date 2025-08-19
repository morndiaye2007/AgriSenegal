<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pret extends Model
{
    protected $table = 'prets';
    protected $primaryKey = 'id_pret';

    protected $fillable = [
        'idAgriculteur',
        'montant_demander',
        'motif',
        'etat_demander',
        'idPartenaireFinance',
    ];

    
    public function agriculteur()
    {
        return $this->belongsTo(Agriculteur::class, 'idAgriculteur', 'idAgriculteur');
    }

   
    public function partenaireFinance()
    {
        return $this->belongsTo(PartenaireFinance::class, 'idPartenaireFinance', 'id_partenaire_finance');
    }
}
