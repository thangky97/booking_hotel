<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    public $timestamp = true;

    protected $fillable = [
        'id','name','images','description','title','date','cate_id', 'admin_id', 'status'
    ];
    // function category_new(){
    //     return $this->hasMany(\App\Models\Category_new::class,'cate_id','id');
    // }

    public function cate_new(){
        return $this->belongsTo(Category_new::class, 'cate_id');
    }

    public function admin_name(){
        return$this->belongsTo(Admin::class, 'admin_id');
    }
    public function loadAll($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)->orderBy('id', 'desc');
        $list = $query->get();
        return $list;
    }
}
