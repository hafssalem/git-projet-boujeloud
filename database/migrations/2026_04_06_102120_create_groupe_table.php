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
        Schema::create('groupe', function (Blueprint $table) {
            $table->id('id_groupe');
            $table->string('nom', 100);
            $table->string('logo')->nullable();
            $table->date('date_creation')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupe');
    }
};
