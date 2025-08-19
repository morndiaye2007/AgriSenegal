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
        Schema::create('partenaire_finances', function (Blueprint $table) {
            $table->id('id_partenaire_finance'); // Clé primaire
            $table->string('nom_partenaire');
            $table->enum('type', ['banque', 'fintech']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partenaire_finances');
    }
};
