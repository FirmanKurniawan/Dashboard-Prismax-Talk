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
        Schema::create('peer_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peer_id')->constrained()->onDelete('cascade');
            $table->integer('slot_number');
            $table->string('color')->nullable();
            $table->string('bgcolor')->nullable();
            $table->string('ts')->nullable();
            $table->string('type')->nullable();
            $table->string('sub')->nullable();
            $table->integer('src')->nullable();
            $table->string('dest')->nullable();
            $table->double('timeout')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peer_slots');
    }
};
