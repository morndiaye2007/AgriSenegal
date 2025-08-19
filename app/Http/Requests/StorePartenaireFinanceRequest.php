<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartenaireFinanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom_partenaire' => 'required|string|max:255',
            'type' => 'required|in:banque,fintech',
        ];
    }
}
