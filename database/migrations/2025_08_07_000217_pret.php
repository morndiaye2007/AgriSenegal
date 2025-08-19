<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prets', function (Blueprint $table) {
            $table->id('id_pret'); 
            $table->unsignedBigInteger('idAgriculteur'); 
            $table->double('montant_demander', 15, 2);
            $table->string('motif');
            $table->boolean('etat_demander')->default(false);
            $table->unsignedBigInteger('idPartenaireFinance'); 
            $table->timestamps();

            $table->foreign('idAgriculteur')
                ->references('idAgriculteur')
                ->on('agriculteurs')
                ->onDelete('cascade');

            $table->foreign('idPartenaireFinance')
                ->references('id_partenaire_finance')  
                ->on('partenaire_finances')
                ->onDelete('cascade');
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('prets');
    }
};
