<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;

class User extends Controller
{
    use HasFactory;

    protected $table = 'user';
    protected $fillable = [
        'id', 
        'name', 
        'email',
        'phone',
        'address',
        'cccd',
        'date',
        'gender',
        'role',
        //'room_id',
        'status'
    ];

    public function saveNew($params){
        $data = array_merge($params['cols'],[
                'password' => Hash::make($params['cols']['password']),
            ]
        );

        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }

     //load ra chi tiết người dùng
     public function loadOne($id, $params = []) {
        $query = DB::table($this->table)->where('id', '=', $id);
        $obj = $query->first();
        return $obj;
    }

    //Sửa
    public function saveUpdate($params) {
        if (empty($params['cols']['id'])) {
            Session::push('errors','không xác định bản ghi cập nhập');
        }

        $dataUpdate = [];
        foreach ($params['cols'] as $colName =>$val) {
            if ($colName == 'id') continue;
            $dataUpdate[$colName] = (strlen($val) == 0) ? null:$val;
        }
        $res = DB::table($this->table)
            ->where('id',$params['cols']['id'])
            ->update($dataUpdate);
        return $res;
    }

    public function room(){
        return $this->belongsTo(Rooms::class, 'room_id', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
