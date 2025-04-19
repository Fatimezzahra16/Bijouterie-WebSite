<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\LigneCommande;
use App\Models\Produit;
use App\Models\Collection;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
        public function validerCommande()
{
    // Vérifie que le panier n’est pas vide
    if (Cart::count() == 0) {
        return redirect()->back()->with('error', 'Votre panier est vide.');
    }

    // Créer la commande
    $commande = Commande::create([
        'user_id' => Auth::id(),
        'etat' => 'en attente',
        'date' => now(),
    ]);

    // Créer chaque ligne de commande
    foreach (Cart::content() as $item) {
        LigneCommande::create([
            'commande_id' => $commande->id,
            'produit_id' => $item->id,
            'quantite' => $item->qty,
            'prix_unitaire' => $item->price
        ]);
    }

    // Vider le panier
    Cart::destroy();

    return redirect()->route('dashboard.products')->with('success', 'Votre commande a été passée avec succès !');
}

    public function checkout()
    {
        // Affiche la page de validation
        if (Cart::count() == 0) {
            return redirect()->route('dashboard.products')->with('error', 'Votre panier est vide.');
        }

        return view('user.checkout'); // Crée ce fichier Blade
    }

    public function historique()
{
    $commandes = Commande::where('user_id', auth()->id())
                    ->with('lignes.produit') // pour charger les produits
                    ->orderBy('created_at', 'desc')
                    ->get();

    return view('user.commandes.historique', compact('commandes'));
}


    
}
