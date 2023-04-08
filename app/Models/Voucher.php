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
    public function update_limit_voucher(){
        $voucher = Session::get('voucher');
        if($voucher == true){
            foreach ($voucher as $value){
                $id = $value['id'];
                $limit = $value['limit'] - 1;
                Voucher::where('id',$id)->update(['limit'=>$limit]);
      }
            Session::forget('voucher');


        }
    }
}
