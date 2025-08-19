<?php

namespace App\Http\Controllers;

use App\Models\Pret;
use Illuminate\Http\Request;

class PretController extends Controller
{
    // Affiche la liste des prêts
    public function index()
    {
        $prets = Pret::with(['agriculteur', 'partenaireFinance'])->get();
        return view('prets.index', ['prets' => $prets]);
    }

    // Affiche le formulaire de création d’un prêt
    public function create()
    {
        return view('prets.create');
    }

    // Enregistre un nouveau prêt
    public function store(Request $request)
    {
        $request->validate([
            'idAgriculteur' => 'required|exists:agriculteurs,idAgriculteur',
            'montant_demander' => 'required|numeric|min:0',
            'motif' => 'required|string|max:255',
            'etat_demander' => 'boolean',
            'idPartenaireFinance' => 'required|exists:partenaire_finances,id_partenaire_finance',
        ]);

        Pret::create($request->all());

        return redirect()->route('prets.index')->with('success', 'Prêt créé avec succès.');
    }

    // Affiche un prêt spécifique
    public function show($id)
    {
        $pret = Pret::with(['agriculteur', 'partenaireFinance'])->findOrFail($id);
        return view('prets.show', ['pret' => $pret]);
    }

    // Affiche le formulaire d’édition d’un prêt
    public function edit($id)
    {
        $pret = Pret::findOrFail($id);
        return view('prets.edit', ['pret' => $pret]);
    }

    // Met à jour un prêt
    public function update(Request $request, $id)
    {
        $pret = Pret::findOrFail($id);

        $request->validate([
            'idAgriculteur' => 'required|exists:agriculteurs,idAgriculteur',
            'montant_demander' => 'required|numeric|min:0',
            'motif' => 'required|string|max:255',
            'etat_demander' => 'boolean',
            'idPartenaireFinance' => 'required|exists:partenaire_finances,id_partenaire_finance',
        ]);

        $pret->update($request->all());

        return redirect()->route('prets.index')->with('success', 'Prêt mis à jour avec succès.');
    }

    // Supprime un prêt
    public function destroy($id)
    {
        $pret = Pret::findOrFail($id);
        $pret->delete();

        return redirect()->route('prets.index')->with('success', 'Prêt supprimé avec succès.');
    }
}
