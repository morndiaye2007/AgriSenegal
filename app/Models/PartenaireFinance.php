<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartenaireFinance extends Model
{
    use HasFactory;

    protected $table = 'partenaire_finances'; 

    protected $primaryKey = 'id_partenaire_finance'; 

    protected $fillable = [
        'nom_partenaire',
        'type',
    ];
}
