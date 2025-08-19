<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartenaireLivraison extends Model
{
    protected $table = 'partenaire_livraisons';

    protected $primaryKey = 'idPartenaireLivraison';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'nom_partenaire',
        'contact',
    ];
}
