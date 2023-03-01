<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * room_id properties_id
    
     */
    public function up(): void
    {
        Schema::create('properties_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id');
            $table->integer('properties_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties_rooms');
    }
};
