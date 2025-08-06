<?php

namespace App\services;


use App\Models\Produit;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProduitService
{




    public function create(array $data)
    {
        return Produit::create($data);
    }

    public function update(Produit $product, array $data)
    {
        $product->update($data);
        return $product;
    }

    public function delete(Produit $product)
    {
        return $product->delete();
    }

    public function list()
    {
        return Produit::latest()->paginate(10);
    }

    public function find($id)
    {
        return Produit::findOrFail($id);
    }

}
