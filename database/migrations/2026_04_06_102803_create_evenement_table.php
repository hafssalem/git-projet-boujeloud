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
        Schema::create('evenement', function (Blueprint $table) {
            $table->id();
             $table->date('date_debut')->nullable();
             $table->date('date_fin')->nullable();
            $table->string('frequence', 50)->nullable();
            $table->string('saison', 50)->nullable();
            $table->enum('statut', ['Planifie', 'En cours', 'Termine', 'Annule'])->nullable();
            $table->foreignId('id_spectacle')->constrained('spectacle', 'id_spectacle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenement');
    }
};
