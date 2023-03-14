<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryRooms extends Model
{
    use HasFactory;

    protected $table = 'category_rooms';
    protected $fillable = [
        'id',
        'name',
//        'image',
        'price',
        'status',
//        'gallery_id',
//        'sort'
    ];

    public function loadListWithPager($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)->where('status', 1)->orderBy('id', 'asc');
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
    function gallery(){
        return $this->hasMany(gallery::class,'cate_room_id');
    }
}
