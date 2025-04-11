<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    protected $model = Produit::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'prix' => $this->faker->randomFloat(2, 10, 500),
            'stock' => $this->faker->numberBetween(1, 50),
            'image' => 'example-product.jpg',  // Tu peux ajouter des images fictives
        ];
    }
}
