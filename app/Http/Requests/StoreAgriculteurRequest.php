<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgriculteurRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'idUtilisateur' => 'required|exists:users,idUtilisateur',
            'nomExploitation' => 'required|string|max:255',
            'region' => 'required|string|max:255',
        ];
    }
}
