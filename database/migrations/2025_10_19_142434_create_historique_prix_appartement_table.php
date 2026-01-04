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
        Schema::create('historique_prix_appartement', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('id_appartement');
            $table->decimal('montantloyer', 15, 2);
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();

            // Clé étrangère vers table_appartement
            $table->foreign('id_appartement')
                  ->references('id')
                  ->on('table_appartement')
                  ->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_prix_appartement');
    }
};
