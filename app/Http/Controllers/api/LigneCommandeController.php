<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLigneCommandeRequest;
use App\Http\Requests\UpdateLigneCommandeRequest;
use App\Services\LigneCommandeService;

class LigneCommandeController extends Controller
{
    protected LigneCommandeService $ligneCommandeService;

    public function __construct(LigneCommandeService $ligneCommandeService)
    {
        $this->ligneCommandeService = $ligneCommandeService;
    }

    public function index()
    {
        $ligneCommandes = $this->ligneCommandeService->getAll();
        return view('ligne_commandes.index', ['ligneCommandes' => $ligneCommandes]);
    }

    public function create()
    {
        return view('ligne_commandes.create');
    }

    public function store(StoreLigneCommandeRequest $request)
    {
        $this->ligneCommandeService->create($request->validated());

        return redirect()->route('ligne_commandes.index')->with('success', 'Ligne de commande créée avec succès.');
    }

    public function show($id)
    {
        $ligneCommande = $this->ligneCommandeService->findById($id);
        return view('ligne_commandes.show', ['ligneCommande' => $ligneCommande]);
    }

    public function edit($id)
    {
        $ligneCommande = $this->ligneCommandeService->findById($id);
        return view('ligne_commandes.edit', ['ligneCommande' => $ligneCommande]);
    }

    public function update(UpdateLigneCommandeRequest $request, $id)
    {
        $this->ligneCommandeService->update($id, $request->validated());

        return redirect()->route('ligne_commandes.index')->with('success', 'Ligne de commande mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->ligneCommandeService->delete($id);

        return redirect()->route('ligne_commandes.index')->with('success', 'Ligne de commande supprimée avec succès.');
    }
}
