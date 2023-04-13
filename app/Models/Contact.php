<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    public $timestamp = true;
    protected $fillable = [
       'name',
        'phone',
        'email',
        'content',
        'title',
        'status'
    ];
    use HasFactory;
}
