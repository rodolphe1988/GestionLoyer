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
        Schema::create('table_locataire', function (Blueprint $table) {
            $table->id();
            $table->integer('iddenomination');
            $table->integer('numappartement');
            $table->string('nom');
            $table->string('prenom');
            $table->string('numero1')->nullable();
            $table->string('numero2')->nullable();;
            $table->string('adresseemail')->nullable();;
            $table->string('occupation')->nullable();;
            $table->integer('montantcaution');
            $table->date('dateentree');
            $table->date('datesortie')->nullable();;
            $table->integer('reliquatcaution');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_locataire');
    }
};
