<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCultureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nomCulture' => 'required|string|max:255',
            'description' => 'required|string',
            'conseils' => 'required|string',
        ];
    }
}
