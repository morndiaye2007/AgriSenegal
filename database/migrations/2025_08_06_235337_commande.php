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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id('idCommande'); // clé primaire
            $table->unsignedBigInteger('idAcheteur'); // clé étrangère vers users
            $table->date('dateCommande');
            $table->boolean('etat_commande')->default(false);
            $table->double('montant_total', 15, 2);
            $table->unsignedBigInteger('id_partenaire_livraison'); // clé étrangère
            $table->timestamps();

            // Contraintes FK corrigées
            $table->foreign('idAcheteur')
                ->references('user_id')   // <-- corrige ici
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('id_partenaire_livraison')
                ->references('idPartenaireLivraison')
                ->on('partenaire_livraisons')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
