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
        Schema::table('activite', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_groupe')
                  ->nullable()
                  ->after('id_acteur');

            $table->foreign('id_groupe')
                  ->references('id_groupe')
                  ->on('groupe')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activite', function (Blueprint $table) {
            //
            $table->dropForeign(['id_groupe']);

            $table->dropColumn('id_groupe');
        });
    }
};
