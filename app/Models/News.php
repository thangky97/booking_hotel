<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    public function loadOne($id, $params = []) {
        $query = DB::table($this->table)->where('id', '=', $id);
        $obj = $query->first();
        return $obj;
    }

    public function cate_new(){
        return $this->belongsTo(Category_new::class, 'cate_id');
    }

}
