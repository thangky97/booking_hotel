<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Vnpay extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'vnpay';
    protected $fillable = [

        'vnp_Amount',
        'vnp_BankTranNo',
        'vnp_CardType',
        'vnp_OrderInfo',
        'vnp_PayDate',
        'vnp_TmnCode',
        'vnp_TransactionStatus',
        'vnp_TxnRef',
        'vnp_SecureHash',
        'vnp_BankCode',
        'vnp_ResponseCode',
        'vnp_TransactionNo',
    ];
}
