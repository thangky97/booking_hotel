<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'checkin_date',
        'checkout_date',
        'people',
        'cate_room_id',
        'status_booking',
        'status_pay',
        'staff_id',
    ];
}
