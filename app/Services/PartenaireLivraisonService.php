<?php

namespace App\Services;

use App\Models\PartenaireLivraison;

class PartenaireLivraisonService
{
    public function store(array $data): PartenaireLivraison
    {
        return PartenaireLivraison::create($data);
    }

    public function update(array $data, PartenaireLivraison $partenaireLivraison): PartenaireLivraison
    {
        $partenaireLivraison->update($data);
        return $partenaireLivraison;
    }
}
