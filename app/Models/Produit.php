<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'collection_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'prix' => 'decimal:2', // Ensures proper decimal handling
    ];

    /**
     * Relationship with Collection
     */
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
