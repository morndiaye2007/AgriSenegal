<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    // Inscription
    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'role' => 'nullable|string|in:user,admin',
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'role' => $request->role ?? 'user',
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'status' => 201,
            'user'   => $user,
            'token'  => $token
        ]);
    }

    // Connexion
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Identifiants invalides.'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Impossible de créer le token.'
            ], 500);
        }

        return response()->json([
            'status' => 200,
            'user' => Auth::user(),

            'token' => $token
        ]);
    }

    // Déconnexion
    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'status' => 200,
                'message' => 'Déconnecté avec succès.'
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Impossible de déconnecter l’utilisateur.'
            ], 500);
        }
    }

    // Rafraîchir le token
    public function refresh()
    {
        try {
            $token = JWTAuth::refresh(JWTAuth::getToken());
            return response()->json([
                'status' => 200,
                'user'  => auth()->user(),
                'token' => $token
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Impossible de rafraîchir le token.'
            ], 500);
        }
    }
}
