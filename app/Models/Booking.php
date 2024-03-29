<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "bookings";
    protected $fillable = [
        'id',
        'user_id',
        'checkin_date',
        'checkout_date',
        'people',
        'money_paid',
        'status_cccd',
        'status_booking',
        'status_pay',
        'staff_id',
    ];

    public function loadListWithPager($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)->orderBy('id', 'desc');
        $list = $query->paginate(10);
        return $list;
    }

    public function loadAll($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
        $list = $query->get();
        return $list;
    }
}
