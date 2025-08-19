<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{
    // Récupérer tous les utilisateurs
    public function getAllUsers()
    {
        return User::all();
    }

    // Récupérer un utilisateur par ID
    public function getUserById(int $id): ?User
    {
        return User::find($id); // retourne null si non trouvé
    }

    // Créer un nouvel utilisateur
    public function createUser(array $data): User
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return User::create($data);
    }

    // Mettre à jour un utilisateur
    public function updateUser(int $id, array $data): ?User
    {
        $user = User::find($id);

        if (!$user) {
            return null;
        }

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        return $user;
    }

    // Supprimer un utilisateur
    public function deleteUser(int $id): bool
    {
        $user = User::find($id);

        if (!$user) {
            return false;
        }

        $user->delete();
        return true;
    }
}
