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
        Schema::table('bageos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_ttd')->nullable();
            $table->foreign('id_ttd')->references('id')->on('ttd_kabids')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bageos', function (Blueprint $table) {
            //
        });
    }
};
