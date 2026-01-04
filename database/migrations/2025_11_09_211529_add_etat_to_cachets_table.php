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
        Schema::table('cachet_paiement_loyers', function (Blueprint $table) {

             $table->integer('etat')->default(1)->after('chemin_cachet');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cachet_paiement_loyers', function (Blueprint $table) {
            //
              $table->dropColumn('etat');
        });
    }
};
