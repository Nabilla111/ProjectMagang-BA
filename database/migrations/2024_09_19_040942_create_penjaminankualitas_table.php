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
        Schema::create('penjaminankualitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bageos_id');
            $table->foreign('bageos_id')->references('id')->on('bageos')->onDelete('cascade');
            $table->text('kelengkapan_dataset');
            $table->text('konsistensi_logis');
            $table->text('akurasi_posisi');
            $table->text('akurasi_tematik');
            $table->text('akurasi_temporal');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjaminankualitas');
    }
};
