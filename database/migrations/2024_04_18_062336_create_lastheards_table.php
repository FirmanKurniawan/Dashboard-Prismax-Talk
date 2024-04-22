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
        Schema::create('lastheards', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time_utc');
            $table->string('mode', 20);
            $table->string('callsign', 20);
            $table->string('callsign_suffix', 20);
            $table->string('target', 20);
            $table->string('src', 20);
            $table->string('duration', 10);
            $table->string('loss', 10);
            $table->string('bit_error_rate', 10);
            $table->string('rssi', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lastheards');
    }
};
