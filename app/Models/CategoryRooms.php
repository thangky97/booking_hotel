<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRooms extends Model
{
    protected $table = 'category_rooms';
    public $timestamp = true;
    use HasFactory;
}
