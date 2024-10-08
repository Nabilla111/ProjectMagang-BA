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
        Schema::create('bageos', function (Blueprint $table) {
            $table->id();
            $table->text('jenis_ba');
            $table->text('instansi');
            $table->date('tanggal_bageo');
            $table->string('tahun');
            $table->unsignedBigInteger('ttd_id');
            $table->foreign('ttd_id')->references('id')->on('ttd_kabids')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bageos');
    }
};
