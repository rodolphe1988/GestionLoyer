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
              $table->integer('montantrelicatloyer')->nullable()->after('moisenregloyer');
              $table->date('dateversementrelicatloyer')->nullable()->after('montantrelicatloyer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_paiement_loyer', function (Blueprint $table) {
            //
        $table->dropColumn(['montantrelicatloyer', 'dateversementrelicatloyer']);

        });
    }
    
};
