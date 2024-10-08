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
        Schema::create('informasikugis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bageos_id');
            $table->foreign('bageos_id')->references('id')->on('bageos')->onDelete('cascade');
            $table->text('kode_unsur');
            $table->text('nama_unsur');
            $table->text('nama_alias');
            $table->text('fitur');
            $table->text('format_data');
            $table->text('SRSCRS');
            $table->text('skala');
            $table->text('atribut');
            $table->text('catatan');
            $table->text('saran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasikugis');
    }
};
