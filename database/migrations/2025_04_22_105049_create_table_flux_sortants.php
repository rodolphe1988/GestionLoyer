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
        Schema::create('table_flux_sortants', function (Blueprint $table) {
            $table->id();
            $table->string('beneficiaire');
            $table->integer('montant');
            $table->string('origine');
            $table->string('observation');
            $table->date('dateereng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_flux_sortants');
    }
};
