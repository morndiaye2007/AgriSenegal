<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCultureRequest extends FormRequest
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
