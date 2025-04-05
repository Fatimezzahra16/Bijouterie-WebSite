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
       Schema::create('ligne_commandes', function (Blueprint $table) {
        $table->id();
         $table->unsignedBigInteger('produit_id');
        $table->unsignedBigInteger('commande_id');
        $table->integer('quantite');
        $table->decimal('prix_unitaire', 8, 2);
        $table->timestamps();
        $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
       $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligne_commandes');
    }
};
