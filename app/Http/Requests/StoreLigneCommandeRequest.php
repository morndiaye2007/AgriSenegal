<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLigneCommandeRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Mettre à true si tous les utilisateurs autorisés peuvent faire la requête
        return true;
    }

    public function rules(): array
    {
        return [
            'id_commande' => 'required|exists:commandes,idCommande',
            'id_produit' => 'required|exists:produits,idProduit',
            'quantite' => 'required|integer|min:1',
            'prix_unitaire_vente' => 'required|integer|min:0',
        ];
    }
}
