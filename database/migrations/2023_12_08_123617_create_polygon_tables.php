<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\text;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('polygon_tables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('polygon');
            $table->string('tipe');
            $table->enum('is_active', ['Active', 'NonActive'])->default('Active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polygon_tables');
    }
};
