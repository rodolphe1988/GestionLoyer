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
        Schema::create('table_paiement_loyer', function (Blueprint $table) {
            $table->id();
            $table->integer('idmaison');
            $table->integer('numappart');
            $table->integer('idlocataire');
            $table->string('nomlocataire');
            $table->integer('montantloyer');
            $table->integer('montantmensuelverse');
            $table->string('moispaieloyer');
            $table->integer('relicatloyer');
            $table->date('daterengloyer');
            $table->string('moisenregloyer');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_paiement_loyer');
    }
};
