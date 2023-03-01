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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); 
            $table->string('name');
            $table->string('cate_room');
            $table->string('images');
            $table->string('title');
            $table->text('description');
            $table->integer('status');
            $table->integer('adult');
            $table->integer('childrend');
            $table->integer('ced');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
