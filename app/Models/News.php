<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public $timestamp = true;

    protected $fillable = [
        'id','name','images','description','title','date','cate_id','status'
    ];
    // function category_new(){
    //     return $this->hasMany(\App\Models\Category_new::class,'cate_id','id');
    // }

    public function cate_new(){
        return $this->belongsTo(Category_new::class, 'cate_id');
    }
    use HasFactory;
}
