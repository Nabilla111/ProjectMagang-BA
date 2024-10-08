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
        Schema::create('julda_geos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bageos_id');
            $table->foreign('bageos_id')->references('id')->on('bageos')->onDelete('cascade');
            $table->text('judul_data');
            $table->date('waktu_unggah');
            $table->text('duplikasi');
            $table->text('jenis_data');
            $table->text('periode');
            $table->text('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('julda_geos');
    }
};
