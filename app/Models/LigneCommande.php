<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;

    protected $table = 'ligne_commandes';

    protected $fillable = [
        'produit_id',
        'commande_id',
        'quantite',
        'prix_unitaire',
    ];

    // Relation : chaque ligne de commande appartient à un produit
    public function produit()
    {
        return $this->belongsTo(Produit::class,'produit_id');
    }

    // Relation : chaque ligne de commande appartient à une commande
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
