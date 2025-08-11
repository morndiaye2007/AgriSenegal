<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRessourceRequest;
use App\Http\Requests\UpdateRessourceRequest;
use App\Models\Ressource;
use App\services\RessourceService;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    private $ressourceService;
    public function __construct(RessourceService $ressourceService){
        $this->ressourceService = $ressourceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->ressourceService->list());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRessourceRequest $request)
    {
        $ressource = $this->ressourceService->create($request->validated());
        return response()->json($ressource,201);
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
    public function update(UpdateRessourceRequest $request, string $id)
    {
        $ressource = $this->ressourceService->find($id);
        $this->ressourceService->update($ressource, $request->validated());
        return response()->json($ressource,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ressource = $this->ressourceService->find($id);
        $this->ressourceService->delete($ressource);
        return response()->json(null,204);
    }
}
