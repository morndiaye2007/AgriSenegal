<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('user'); 

        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id . ',user_id',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            // 'role' n'est plus modifiable
        ];
    }
}
