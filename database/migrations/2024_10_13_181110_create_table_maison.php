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
        Schema::create('table_maison', function (Blueprint $table) {
            $table->id();
            $table->string('denomination')->unique();
            $table->integer('idtypeimmob');
            $table->string('typeimmob');
            $table->string('ville');
            $table->string('commune');
            $table->string('quartier');
            $table->string('adresse');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_maison');
    }
};
