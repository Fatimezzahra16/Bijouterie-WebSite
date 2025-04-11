<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Vérifie si la colonne 'collection_id' existe avant de l'ajouter
        if (!Schema::hasColumn('produits', 'collection_id')) {
            Schema::table('produits', function (Blueprint $table) {
                $table->foreignId('collection_id')->constrained()->onDelete('cascade'); // Ajoute la clé étrangère
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Vérifie si la colonne existe avant de la supprimer
        if (Schema::hasColumn('produits', 'collection_id')) {
            Schema::table('produits', function (Blueprint $table) {
                $table->dropColumn('collection_id'); // Supprime la colonne 'collection_id'
            });
        }
    }
};



