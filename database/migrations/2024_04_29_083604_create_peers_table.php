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
        Schema::create('peers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_id')->constrained()->onDelete('cascade');
            $table->integer('dmr_id')->nullable();
            $table->string('tx_freq')->nullable();
            $table->string('rx_freq')->nullable();
            $table->string('slots')->nullable();
            $table->string('software_id')->nullable();
            $table->string('package_id')->nullable();
            $table->string('colorcode')->nullable();
            $table->string('callsign')->nullable();
            $table->string('location')->nullable();
            $table->string('connection')->nullable();
            $table->string('connected')->nullable();
            $table->string('ip')->nullable();
            $table->integer('port')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peers');
    }
};
