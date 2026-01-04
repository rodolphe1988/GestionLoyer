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
        Schema::table('table_detenteurs', function (Blueprint $table) {

            $table->integer('etat')->default(1); // Ajoute une colonne INT avec valeur par défaut 0
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_detenteurs', function (Blueprint $table) {

            $table->dropColumn('etat'); // Supprime la colonne en cas de rollback
            //
        });
    }
};
