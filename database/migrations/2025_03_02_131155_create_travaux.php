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
        Schema::create('travaux', function (Blueprint $table) {
            $table->id();
            $table->integer('idmaison');
            $table->integer('numappart');
            $table->string('intituletravaux');
            $table->date('datenreg')->nullable();
            $table->integer('montant');
            $table->date('date')->nullable(); // Ajoute la colonne date qui accepte null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travaux');
    }
};
