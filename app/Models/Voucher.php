<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'Vouchers';
    protected $fillable = [

        'name',
        'code',
        'discount',
        'limit',
        'date_start',
        'date_end',
        'status'
    ];
}
