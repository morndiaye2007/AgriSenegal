<?php

namespace App\Http\Controllers;

use App\Models\Parcelle;
use Illuminate\Http\Request;

class ParcelleController extends Controller
{
    // Affiche la liste des parcelles
    public function index()
    {
        $parcelles = Parcelle::all();
        return view('parcelles.index', ['parcelles' => $parcelles]);
    }

    // Affiche le formulaire de création d'une parcelle
    public function create()
    {
        return view('parcelles.create');
    }

    // Enregistre une nouvelle parcelle
    public function store(Request $request)
    {
        $request->validate([
            'idAgriculteur' => 'required|exists:agriculteurs,idAgriculteur',
            'nomParcelle' => 'required|string|max:255',
            'superficie' => 'required|string|max:255',
            'localisation_gps' => 'required|string|max:255',
        ]);

        Parcelle::create($request->all());

        return redirect()->route('parcelles.index')->with('success', 'Parcelle créée avec succès.');
    }

    // Affiche une parcelle spécifique
    public function show($id)
    {
        $parcelle = Parcelle::findOrFail($id);
        return view('parcelles.show', ['parcelle' => $parcelle]);
    }

    // Affiche le formulaire d’édition d’une parcelle
    public function edit($id)
    {
        $parcelle = Parcelle::findOrFail($id);
        return view('parcelles.edit', ['parcelle' => $parcelle]);
    }

    // Met à jour une parcelle
    public function update(Request $request, $id)
    {
        $parcelle = Parcelle::findOrFail($id);

        $request->validate([
            'idAgriculteur' => 'required|exists:agriculteurs,idAgriculteur',
            'nomParcelle' => 'required|string|max:255',
            'superficie' => 'required|string|max:255',
            'localisation_gps' => 'required|string|max:255',
        ]);

        $parcelle->update($request->all());

        return redirect()->route('parcelles.index')->with('success', 'Parcelle mise à jour avec succès.');
    }

    // Supprime une parcelle
    public function destroy($id)
    {
        $parcelle = Parcelle::findOrFail($id);
        $parcelle->delete();

        return redirect()->route('parcelles.index')->with('success', 'Parcelle supprimée avec succès.');
    }
}
