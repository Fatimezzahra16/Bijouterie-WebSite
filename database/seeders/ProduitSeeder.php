<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;  // Assure-toi que tu as bien ce modèle

class ProduitSeeder extends Seeder
{
    public function run()
    {
        // Créer 10 produits fictifs
        \App\Models\Produit::factory(10)->create();
    }
}
