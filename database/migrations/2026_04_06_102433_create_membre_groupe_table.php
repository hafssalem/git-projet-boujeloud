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
        Schema::create('membre_groupe', function (Blueprint $table) {
            $table->id('id_membre_groupe');
            $table->foreignId('id_acteur')->constrained('acteur', 'id_acteur');
            $table->foreignId('id_groupe')->constrained('groupe', 'id_groupe');
            $table->string('role')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membre_groupe');
    }
};
