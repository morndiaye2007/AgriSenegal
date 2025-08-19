<?php

namespace App\Services;

use App\Models\Agriculteur;

class AgriculteurService
{
    public function getAll()
    {
        return Agriculteur::all();
    }

    public function findById(int $id): Agriculteur
    {
        return Agriculteur::findOrFail($id);
    }

    public function create(array $data): Agriculteur
    {
        return Agriculteur::create($data);
    }

    public function update(int $id, array $data): Agriculteur
    {
        $agriculteur = $this->findById($id);
        $agriculteur->update($data);
        return $agriculteur;
    }

    public function delete(int $id): void
    {
        $agriculteur = $this->findById($id);
        $agriculteur->delete();
    }
}
