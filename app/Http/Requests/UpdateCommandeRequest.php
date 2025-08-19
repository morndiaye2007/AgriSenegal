<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommandeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'idAcheteur' => 'required|exists:users,idUtilisateur',
            'dateCommande' => 'required|date',
            'etat_commande' => 'required|boolean',
            'montant_total' => 'required|numeric',
            'id_partenaire_livraison' => 'required|exists:partenaire_livraisons,idPartenaireLivraison',
        ];
    }
}
