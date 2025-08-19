<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('parcelles', function (Blueprint $table) {
            $table->id('idParcelle'); 
            $table->unsignedBigInteger('idAgriculteur'); 
            $table->string('nomParcelle');
            $table->string('superficie');
            $table->string('localisation_gps');
            $table->timestamps();

            $table->foreign('idAgriculteur')->references('idAgriculteur')->on('agriculteurs')->onDelete('cascade');
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('parcelles');
    }
};
