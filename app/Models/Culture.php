<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    // Nom de la table (facultatif si le nom est "cultures")
    protected $table = 'cultures';

    // Clé primaire personnalisée
    protected $primaryKey = 'idCulture';

    protected $fillable = [
        'nomCulture',
        'description',
        'conseils',
    ];
}
