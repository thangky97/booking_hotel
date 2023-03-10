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
        Schema::create('property_room', function (Blueprint $table) {
            $table->id();
<<<<<<< refs/remotes/origin/hoang
=======
            $table->integer('room_id')->comment("Phòng");
            $table->integer('properties_id')->comment("Thuộc tính phòng");
            $table->unsignedInteger('status');
>>>>>>> local
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_room');
    }
};
