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
        Schema::create('sanction', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50)->nullable();
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('id_acteur')
                  ->constrained('acteur', 'id_acteur')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanction');
    }
};
