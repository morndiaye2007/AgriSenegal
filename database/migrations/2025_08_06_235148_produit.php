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
        Schema::create('produits', function (Blueprint $table) {
            $table->id('idProduit'); // clé primaire
            $table->unsignedBigInteger('idAgriculteur'); // clé étrangère
            $table->string('nomProduit');
            $table->string('description');
            $table->decimal('prix_unitaire', 10, 2); // prix avec 2 décimales
            $table->double('qualite_disponible', 15, 8); // double précision
            $table->boolean('etat')->default(true); // état par défaut à true
            $table->timestamps();

            // clé étrangère vers agriculteurs
            $table->foreign('idAgriculteur')->references('idAgriculteur')->on('agriculteurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
