<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Appeler les seeders
        $this->call([
            UserSeeder::class,
            ProduitSeeder::class,
            CommandeSeeder::class,
        ]);
    }
}
