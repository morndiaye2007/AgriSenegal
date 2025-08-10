<?php

namespace App\services;

use App\Models\Categorie;

class CategorieService
{
    public function create(array $data){
        return Categorie::create($data);
    }
    public function list()
    {
        return Categorie::latest()->paginate(10);
    }

    public function update(Categorie $product, array $data){
        $product->update($data);
    }
    public function delete(Categorie $product){
        $product->delete();
    }
    public function find($id){
        return Categorie::findOrFail($id);
    }

}
