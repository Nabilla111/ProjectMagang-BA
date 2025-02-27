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
        Schema::create('ttd_kabids', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->text('jabatan');
            $table->text('nip');
            $table->string('ttd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttd_kabids');
    }
};
