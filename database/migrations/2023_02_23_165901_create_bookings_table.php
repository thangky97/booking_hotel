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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->date('checkin_date')->comment("Ngày đến");
            $table->date('checkout_date')->comment("Ngày đi");
            $table->string('people');
            $table->string('cate_room_id');
            $table->string('status_booking')->comment("Trạng thái đặt phòng");
            $table->string('status_pay')->comment("Trạng thái thanh toán");
            $table->string('staff_id')->comment("Nhân viên");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
