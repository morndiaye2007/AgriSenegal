<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->id('idLigne_Commande'); // clé primaire
            $table->unsignedBigInteger('id_commande'); // clé étrangère vers commandes
            $table->unsignedBigInteger('id_produit');  // clé étrangère vers produits
            $table->bigInteger('quantite');
            $table->integer('prix_unitaire_vente');
            $table->timestamps();

            // Contraintes FK
            $table->foreign('id_commande')->references('idCommande')->on('commandes')->onDelete('cascade');
            $table->foreign('id_produit')->references('idProduit')->on('produits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_commandes');
    }
};
