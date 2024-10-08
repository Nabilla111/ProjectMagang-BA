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
        Schema::create('juldabelums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bas_id');
            $table->foreign('bas_id')->references('id')->on('bas')->onDelete('cascade');
            $table->text('juduldata_belum');
            $table->text('julket_belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juldabelums');
    }
};
