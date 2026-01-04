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
        Schema::table('table_paiement_loyer', function (Blueprint $table) {
            //
        $table->enum('type_versement', ['complet', 'partiel'])->nullable()
          ->default(null)->after('relicatloyer');
        $table->boolean('annule')->default(false)->after('dateversementrelicatloyer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_paiement_loyer', function (Blueprint $table) {
            //
              $table->dropColumn(['type_versement', 'annule']);
        });
    }
};
