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
Schema::create('acteur', function (Blueprint $table) {
    $table->id('id_acteur'); 
    $table->string('nom_prenom', 100);
    $table->date('date_naissance');
    $table->string('cin_passport', 50);
    $table->string('nationalite', 50);
    $table->text('adresse');
    $table->string('telephone', 20);
    $table->string('email')->nullable();
    $table->string('photo')->nullable();
    $table->date('date_inscription')->useCurrent();
    $table->enum('statut', ['Actif', 'Suspendu', 'Archive'])->default('Actif');            
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acteur');
    }
};
