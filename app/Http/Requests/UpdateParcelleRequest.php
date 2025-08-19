<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParcelleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // autorise la requête, adapte selon ta logique auth
    }

    public function rules(): array
    {
        return [
            'idAgriculteur' => 'required|exists:agriculteurs,idAgriculteur',
            'nomParcelle' => 'required|string|max:255',
            'superficie' => 'required|string|max:255',
            'localisation_gps' => 'required|string|max:255',
        ];
    }
}
