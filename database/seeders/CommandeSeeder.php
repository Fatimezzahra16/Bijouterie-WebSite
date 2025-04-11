<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commande;
use App\Models\LigneCommande;
use App\Models\Produit;
use App\Models\User;

class CommandeSeeder extends Seeder
{
    public function run()
    {
        // Créer une commande pour un utilisateur fictif
        $user = User::inRandomOrder()->first();  // Choisit un utilisateur aléatoire

        $commande = Commande::create([
            'user_id' => $user->id,
            'date_commande' => now(),
            'total' => 150.99,  // Exemple de total
        ]);

        // Ajouter des lignes de commande (produits)
        $produits = Produit::inRandomOrder()->take(3)->get();  // 3 produits aléatoires

        foreach ($produits as $produit) {
            LigneCommande::create([
                'commande_id' => $commande->id,
                'produit_id' => $produit->id,
                'quantite' => 1,
                'prix_unitaire' => $produit->prix,
            ]);
        }
    }
}
