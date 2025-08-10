<?php

namespace App\services;

use App\Models\Commande;
use App\Models\Produit;

class CommandeService
{
    public function create(array $data)
    {
        return Commande::created($data);
    }
    public function update(Commande $commande, array $data){
        $commande->update($data);
        return $commande;
    }
    public function delete(Commande $commande){
        $commande->delete();
    }

    public function list(){
        return Commande::latest()->paginate(10);
    }
    public function find($id){
        return Commande::findOrFail($id);
    }

}
