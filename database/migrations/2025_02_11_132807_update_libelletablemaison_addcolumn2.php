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
        Schema::table('table_maison', function (Blueprint $table) {

            $table->string('detenteur')->after('denomination');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_maison', function (Blueprint $table) {

            $table->dropColumn('detenteur'); // Supprime la colonne en cas de rollback
            //
        });
    }
};
