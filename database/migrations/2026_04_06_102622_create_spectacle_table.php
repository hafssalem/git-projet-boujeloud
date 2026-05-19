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
        Schema::create('spectacle', function (Blueprint $table) {
            $table->id('id_spectacle');
            $table->string('titre', 150);
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->string('langue', 50)->nullable();
            $table->string('public_cible', 50)->nullable();
            $table->integer('duree')->nullable();
            $table->integer('nb_representations')->nullable();
            $table->text('equipements')->nullable();
            $table->enum('caractere', ['Gratuit', 'Chapeau', 'Contribution libre', 'Payant'])->nullable();
            $table->enum('classification', ['Traditionnel', 'Contemporain', 'Fusion'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spectacle');
    }
};
