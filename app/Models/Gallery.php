<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    use HasFactory;

    protected $fillable = [
        'id',
        'cate_room_id',
        'images',
    ];
}

