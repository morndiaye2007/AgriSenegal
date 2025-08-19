<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCultureRequest;
use App\Http\Requests\UpdateCultureRequest;
use App\Services\CultureService;

class CultureController extends Controller
{
    protected CultureService $cultureService;

    public function __construct(CultureService $cultureService)
    {
        $this->cultureService = $cultureService;
    }

    public function index()
    {
        $cultures = $this->cultureService->getAll();
        return view('cultures.index', ['cultures' => $cultures]);
    }

    public function create()
    {
        return view('cultures.create');
    }

    public function store(StoreCultureRequest $request)
    {
        $this->cultureService->create($request->validated());
        return redirect()->route('cultures.index')->with('success', 'Culture créée avec succès.');
    }

    public function show($id)
    {
        $culture = $this->cultureService->findById($id);
        return view('cultures.show', ['culture' => $culture]);
    }

    public function edit($id)
    {
        $culture = $this->cultureService->findById($id);
        return view('cultures.edit', ['culture' => $culture]);
    }

    public function update(UpdateCultureRequest $request, $id)
    {
        $this->cultureService->update($id, $request->validated());
        return redirect()->route('cultures.index')->with('success', 'Culture mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->cultureService->delete($id);
        return redirect()->route('cultures.index')->with('success', 'Culture supprimée avec succès.');
    }
}
