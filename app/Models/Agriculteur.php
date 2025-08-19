<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agriculteur extends Model
{
    use HasFactory;

    protected $table = 'agriculteurs';
    protected $primaryKey = 'idAgriculteur';
    public $timestamps = true;

    protected $fillable = [
        'idUtilisateur',
        'nomExploitation',
        'region',
    ];

    // Relation avec User (si elle existe)
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'idUtilisateur');
    }
}
