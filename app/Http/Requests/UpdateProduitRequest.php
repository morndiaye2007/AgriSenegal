<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'idAgriculteur' => 'required|exists:agriculteurs,idAgriculteur',
            'nomProduit' => 'required|string|max:255',
            'description' => 'required|string',
            'prix_unitaire' => 'required|numeric|min:0',
            'qualite_disponible' => 'required|numeric|min:0',
            'etat' => 'required|boolean',
        ];
    }
}
