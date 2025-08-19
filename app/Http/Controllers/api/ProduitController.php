<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Services\ProduitService;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;

class ProduitController extends Controller
{
    protected ProduitService $produitService;

    public function __construct(ProduitService $produitService)
    {
        $this->produitService = $produitService;
    }

    public function index()
    {
        $produits = $this->produitService->getAll();
        return view('produits.index', ['produits' => $produits]);
    }

    public function create()
    {
        return view('produits.create');
    }

    public function store(StoreProduitRequest $request)
    {
        $this->produitService->create($request->validated());
        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
    }

    public function show($id)
    {
        $produit = $this->produitService->findById($id);
        return view('produits.show', ['produit' => $produit]);
    }

    public function edit($id)
    {
        $produit = $this->produitService->findById($id);
        return view('produits.edit', ['produit' => $produit]);
    }

    public function update(UpdateProduitRequest $request, $id)
    {
        $this->produitService->update($id, $request->validated());
        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->produitService->delete($id);
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
