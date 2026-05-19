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
        Schema::create('autorisation', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut')->nullable();
           $table->date('date_fin')->nullable();
           $table->string('statut', 50)->nullable();
           $table->foreignId('id_acteur')->constrained('acteur', 'id_acteur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorisation');
    }
};
