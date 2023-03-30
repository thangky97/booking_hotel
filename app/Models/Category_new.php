<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_new extends Model
{
    use HasFactory;
    protected $table = 'category_new';
    public $timestamp = true;
    protected $fillable = ['id', 'name', 'status'];
    
}
