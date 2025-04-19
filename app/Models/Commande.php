<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Commande extends Model
{
    use HasFactory;

    protected $table = 'commandes';

    protected $fillable = [
        'user_id',
        'total',
        'date',
        'etat',
        
    ];

    // Relation avec l'utilisateur (chaque commande appartient à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec les lignes de commande
    public function lignes()
    {
        return $this->hasMany(LigneCommande::class);
    }
    public function orders()
{
    return $this->hasMany(\App\Models\Commande::class);
}


}
