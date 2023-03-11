<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "users";
    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'address',
        'cccd',
        'date',
        'gender',
        'room_id',
    ];

    public function loadListWithPager($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)->where('status', 1);
        $list = $query->paginate(10);
        return $list;
    }

    public function loadAll($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)->where('status', 1);
        $list = $query->get();
        return $list;
    }
}
