<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partenaire_livraison;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Services\CommandeService;

class CommandeController extends Controller
{
    protected CommandeService $commandeService;

    public function __construct(CommandeService $commandeService)
    {
        $this->commandeService = $commandeService;
    }

    public function index()
    {
        $commandes = $this->commandeService->getAll();
        return view('commandes.index', ['commandes' => $commandes]);
    }

    public function create()
    {
        $acheteurs = User::all();
        $partenaires = PartenaireLivraison::all();
        return view('commandes.create', [
            'acheteurs' => $acheteurs,
            'partenaires' => $partenaires,
        ]);
    }

    public function store(StoreCommandeRequest $request)
    {
        $this->commandeService->create($request->validated());
        return redirect()->route('commandes.index')->with('success', 'Commande créée avec succès.');
    }

    public function show($id)
    {
        $commande = $this->commandeService->findById($id);
        return view('commandes.show', ['commande' => $commande]);
    }

    public function edit($id)
    {
        $commande = $this->commandeService->findById($id);
        $acheteurs = User::all();
        $partenaires = PartenaireLivraison::all();

        return view('commandes.edit', [
            'commande' => $commande,
            'acheteurs' => $acheteurs,
            'partenaires' => $partenaires,
        ]);
    }

    public function update(UpdateCommandeRequest $request, $id)
    {
        $this->commandeService->update($id, $request->validated());
        return redirect()->route('commandes.index')->with('success', 'Commande mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->commandeService->delete($id);
        return redirect()->route('commandes.index')->with('success', 'Commande supprimée avec succès.');
    }
}
