<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // Liste des utilisateurs
    public function index()
    {
        return response()->json($this->userService->getAllUsers());
    }

    // Créer un utilisateur
    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->createUser($request->validated());
        return response()->json($user, 201);
    }

    // Afficher un utilisateur par ID
    public function show($id)
    {
        $user = $this->userService->getUserById($id);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        return response()->json($user);
    }

    // Mettre à jour un utilisateur
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userService->updateUser($id, $request->validated());

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        return response()->json($user);
    }

    // Supprimer un utilisateur
    public function destroy($id)
    {
        $deleted = $this->userService->deleteUser($id);

        if (!$deleted) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        return response()->json(null, 204);
    }
}
