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
        Schema::create('juldas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bas_id');
            $table->foreign('bas_id')->references('id')->on('bas')->onDelete('cascade');
            $table->text('judul_data');
            $table->text('julket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juldas');
    }
};
