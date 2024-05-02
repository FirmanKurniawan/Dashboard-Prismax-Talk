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
        Schema::create('masters', function (Blueprint $table) {
            // $table->id();
            // $table->string('name');
            // $table->string('repeat');
            // $table->string('dmr_id');
            // $table->string('tx_freq');
            // $table->string('rx_freq');
            // $table->string('slots');
            // $table->string('software_id');
            // $table->string('package_id');
            // $table->string('colorcode');
            // $table->string('callsign');
            // $table->string('location');
            // $table->string('connection');
            // $table->string('connected');
            // $table->string('ip');
            // $table->string('port');
            // $table->timestamps();
            $table->id();
            $table->string('name');
            $table->string('repeat_statusn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masters');
    }
};
