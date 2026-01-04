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
        Schema::table('table_appartement', function (Blueprint $table) {

            $table->integer('etatappartement')->default(0)->change();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_appartement', function (Blueprint $table) {
            //
             $table->integer('etatappartement')->default(1)->change();
        });
    }
};
