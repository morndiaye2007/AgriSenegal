<?php

namespace App\Services;

use App\Models\PartenaireFinance;

class PartenaireFinanceService
{
    public function getAll()
    {
        return PartenaireFinance::all();
    }

    public function findById($id)
    {
        return PartenaireFinance::findOrFail($id);
    }

    public function create(array $data)
    {
        return PartenaireFinance::create($data);
    }

    public function update($id, array $data)
    {
        $partenaire = $this->findById($id);
        $partenaire->update($data);
        return $partenaire;
    }

    public function delete($id)
    {
        $partenaire = $this->findById($id);
        $partenaire->delete();
    }
}
