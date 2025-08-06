<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\services\ProduitService;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $productService;

    public function __construct(ProduitService $productService)
    {
        $this->productService = $productService;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function index()
    {
        return response()->json($this->productService->list());

    }

    public function store(StoreProduitRequest $request)
    {
        $product = $this->productService->create($request->validated());
        return response()->json($product, 201);
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
    public function update(UpdateProduitRequest $request, $id)
    {
        $product = $this->productService->find($id);
        $this->productService->update($product, $request->validated());
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $product = $this->productService->find($id);
    $this->productService->delete($product);
    return response()->json(null, 204);
}
}
