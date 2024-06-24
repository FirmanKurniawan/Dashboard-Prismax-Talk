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
        Schema::create('maps', function (Blueprint $table) {
            $table->id();
            $table->string('id_dmr')->nullable();
            $table->decimal('latitude', 10, 6)->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->decimal('speed', 10, 2)->nullable();
            $table->decimal('altitude', 10, 2)->nullable();
            $table->string('timestamp')->nullable();
            $table->string('gps_type')->nullable();
            $table->decimal('angle', 10, 2)->nullable();
            $table->integer('satellite')->nullable();
            $table->string('quality')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maps');
    }
};
