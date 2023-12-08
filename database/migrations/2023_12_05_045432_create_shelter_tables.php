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
        Schema::create('shelter_tables', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('alamat');
            $table->string('keterangan');
            $table->string('kontak');
            $table->integer('kapasitas');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shelter_tables');
    }
};
