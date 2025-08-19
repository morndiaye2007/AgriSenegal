<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartenaireFinanceRequest;
use App\Http\Requests\UpdatePartenaireFinanceRequest;
use App\Services\PartenaireFinanceService;

class PartenaireFinanceController extends Controller
{
    protected PartenaireFinanceService $partenaireFinanceService;

    public function __construct(PartenaireFinanceService $partenaireFinanceService)
    {
        $this->partenaireFinanceService = $partenaireFinanceService;
    }

    public function index()
    {
        $partenaires = $this->partenaireFinanceService->getAll();
        return view('partenaire_finances.index', ['partenaires' => $partenaires]);
    }

    public function create()
    {
        return view('partenaire_finances.create');
    }

    public function store(StorePartenaireFinanceRequest $request)
    {
        $this->partenaireFinanceService->create($request->validated());
        return redirect()->route('partenaire_finances.index')->with('success', 'Partenaire financier créé avec succès.');
    }

    public function show($id)
    {
        $partenaire = $this->partenaireFinanceService->findById($id);
        return view('partenaire_finances.show', ['partenaire' => $partenaire]);
    }

    public function edit($id)
    {
        $partenaire = $this->partenaireFinanceService->findById($id);
        return view('partenaire_finances.edit', ['partenaire' => $partenaire]);
    }

    public function update(UpdatePartenaireFinanceRequest $request, $id)
    {
        $this->partenaireFinanceService->update($id, $request->validated());
        return redirect()->route('partenaire_finances.index')->with('success', 'Partenaire financier mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->partenaireFinanceService->delete($id);
        return redirect()->route('partenaire_finances.index')->with('success', 'Partenaire financier supprimé avec succès.');
    }
}
