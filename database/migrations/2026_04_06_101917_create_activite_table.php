<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  
public function up()
{
    Schema::create('activite', function (Blueprint $table) {
        $table->id('id_activite');

        $table->string('type_performance')->nullable();
        $table->enum('mode_exercice', ['Individuel', 'Groupe', 'Association'])->nullable();
        $table->enum('frequence', ['Quotidienne', 'Hebdomadaire', 'Occasionnelle', 'Saisonniere'])->nullable();
        $table->string('lieu')->nullable();
        $table->string('langue')->nullable();

        $table->unsignedBigInteger('id_acteur');
<<<<<<< HEAD
        $table->unsignedBigInteger('id_groupe')->nullable();
=======
>>>>>>> cb156e4 (Premier commit)

        $table->foreign('id_acteur')
              ->references('id_acteur')
              ->on('acteur')
              ->onDelete('cascade')
              ->onUpdate('cascade');
<<<<<<< HEAD
              
        $table->foreign('id_groupe')
      ->references('id_groupe')
      ->on('groupe')
      ->onDelete('cascade')
      ->onUpdate('cascade');
=======
>>>>>>> cb156e4 (Premier commit)
        $table->timestamps();
    });
    
}
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activite');
    }
};
