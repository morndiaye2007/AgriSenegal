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
        Schema::create('partenaire_livraisons', function (Blueprint $table) {
            $table->id('idPartenaireLivraison'); // Clé primaire
            $table->string('nom_partenaire');
            $table->string('contact');
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partenaire_livraisons');
    }
};
