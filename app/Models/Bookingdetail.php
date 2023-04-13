<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Bookingdetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "bookings_detail";
    protected $fillable = [
        'id',
        'booking_id',
        'room_id',
        'status',
    ];

    public function loadListWithPager($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)->where('status', 1)->orderBy('id', 'desc');
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

    public function loadIdBooking($id, $param = [])
    {
        $query = DB::table($this->table)
            ->where('booking_id', '=', $id);
        $obj = $query->get();
        return $obj;
    }
}
