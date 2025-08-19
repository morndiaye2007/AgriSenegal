<?php

namespace App\Http\Controllers;

use App\Models\PartenaireLivraison;
use App\Services\PartenaireLivraisonService;
use App\Http\Requests\StorePartenaireLivraisonRequest;
use App\Http\Requests\UpdatePartenaireLivraisonRequest;

class PartenaireLivraisonController extends Controller
{
    protected $service;

    public function __construct(PartenaireLivraisonService $service)
    {
        $this->service = $service;
    }

    public function store(StorePartenaireLivraisonRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('partenairelivraison.index')->with('success', 'Partenaire ajouté avec succès.');
    }

    public function update(UpdatePartenaireLivraisonRequest $request, PartenaireLivraison $partenaireLivraison)
    {
        $this->service->update($request->validated(), $partenaireLivraison);
        return redirect()->route('partenairelivraison.index')->with('success', 'Partenaire mis à jour avec succès.');
    }
}
