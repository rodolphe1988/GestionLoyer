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
        Schema::create('table_appartement', function (Blueprint $table) {
            $table->id();
            $table->integer('idmaison');
            $table->integer('numappartement')->unique();
            $table->string('typeappartement');
            $table->string('typelocation');
            $table->string('montantloyer');
            $table->integer('nbremoiscaution');
            $table->integer('montanttotalcaution');
            $table->integer('etatappartement');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_appartement');
    }
};
