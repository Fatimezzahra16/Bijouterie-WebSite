<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
    ];

    public function products()
    {
    return $this->hasMany(Produit::class);
    }
}
