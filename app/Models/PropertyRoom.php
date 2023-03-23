<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PropertyRoom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "property_room";
    protected $fillable = [
        'id',
        'room_id',
        'properties_id',
        'status',
    ];

    public function loadListWithPager($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)->orderBy('room_id', 'asc');
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
