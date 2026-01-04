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
       
             // Change column to nullable and remove default
            $table->enum('type_versement', ['complet', 'partiel'])
                  ->nullable()
                  ->default(null)
                  ->change();
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_paiement_loyer', function (Blueprint $table) {

           $table->enum('type_versement', ['complet', 'partiel'])
                  ->default('partiel')
                  ->nullable(false)
                  ->change();
            //
        });
    }
};
