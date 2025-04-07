<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Collection; 
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;




class PanierController extends Controller
{
    /*
    public function addToCart(Request $request, $productId) {
        $product = Produit::findOrFail($productId);
    
        $cart = session()->get('cart', []);
    
        if(isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "nom" => $product->nom,
                "prix" => $product->prix,
                "photo" => $product->photo,
                "quantity" => 1
            ];
        }
    
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }
 */  
    public function showCart() {
        $cart = session()->get('cart');
        return view('user.panier', compact('cart'));
    }
    
 

public function add($id)
{
    $produit = Produit::findOrFail($id);

    Cart::add([
        'id' => $produit->id,
        'name' => $produit->nom,
        'qty' => 1,
        'price' => $produit->prix,
        'weight' => 0, 
        'options' => [
            'image' => $produit->photo,
            'stock' => $produit->stock,
        ],
    ]);
    return redirect()->back()->with('success', 'Produit ajouté au panier !');
}

}
