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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
<<<<<<< refs/remotes/origin/hoang
=======
            $table->integer('bill_id');
            $table->string('content');
            $table->string('star')->comment("Số sao");
            $table->string('title');
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
        Schema::dropIfExists('feedback');
    }
};
