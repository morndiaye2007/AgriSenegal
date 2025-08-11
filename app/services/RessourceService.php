<?php

namespace App\services;

use App\Models\Ressource;

class RessourceService
{
    public function create(array $data){
        return Ressource::create($data);
    }
    public function update(Ressource $ressource, array $data){
        $ressource->update($data);
        return $ressource;
    }
    public function delete(Ressource $ressource){
        $ressource->delete();
    }
    public function list(){
        return Ressource::latest()->paginate(10);
    }

    public function find($id){
        return Ressource::findOrFail($id);
    }

}
