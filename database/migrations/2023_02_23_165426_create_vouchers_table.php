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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->comment("Mã giảm giá");
            $table->string('name');
            $table->string('discount');
            $table->integer('max_uses_user')->comment("Giới hạn người sử dụng");
            $table->integer('limit')->comment("Số lượng mã giảm giá");
            $table->date('date_start')->comment("Ngày có hiệu lực");
            $table->date('date_end')->comment("Ngày hết hạn");
            $table->unsignedInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
