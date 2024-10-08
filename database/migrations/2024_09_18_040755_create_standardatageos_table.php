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
        Schema::create('standardatageos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bageos_id');
            $table->foreign('bageos_id')->references('id')->on('bageos')->onDelete('cascade');
            $table->text('bentuk');
            $table->text('nomor');
            $table->date('tanggal');
            $table->text('konsep');
            $table->text('definisi');
            $table->text('klasifikasi');
            $table->text('ukuran');
            $table->text('satuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standardatageos');
    }
};
