<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Models\Categorie;
use App\services\CategorieService;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function __construct(CategorieService $categorieService){
        $this->categorieService = $categorieService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->categorieService->list());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request)
    {
        $categorie = $this->categorieService->create($request->validated());
        return response()->json($categorie, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorieRequest $request, string $id)
    {
        $categorie = $this->categorieService->find($id);
        $this->categorieService->update($id, $request->validated());
        return response()->json($categorie, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = $this->categorieService->find($id);
            $this->categorieService->delete($id);
        return response()->json(null, 204);
    }
}
