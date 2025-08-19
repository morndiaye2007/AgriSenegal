<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgriculteurRequest;
use App\Http\Requests\UpdateAgriculteurRequest;
use App\Services\AgriculteurService;

class AgriculteurController extends Controller
{
    protected AgriculteurService $agriculteurService;

    public function __construct(AgriculteurService $agriculteurService)
    {
        $this->agriculteurService = $agriculteurService;
    }

    public function index()
    {
        return response()->json($this->agriculteurService->getAll());
    }

    public function store(StoreAgriculteurRequest $request)
    {
        $agriculteur = $this->agriculteurService->create($request->validated());
        return response()->json($agriculteur, 201);
    }

    public function show($id)
    {
        return response()->json($this->agriculteurService->findById($id));
    }

    public function update(UpdateAgriculteurRequest $request, $id)
    {
        $agriculteur = $this->agriculteurService->update($id, $request->validated());
        return response()->json($agriculteur);
    }

    public function destroy($id)
    {
        $this->agriculteurService->delete($id);
        return response()->json(null, 204);
    }
}
