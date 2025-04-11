<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Créer 5 utilisateurs fictifs
        \App\Models\User::factory(5)->create();
    }
}
