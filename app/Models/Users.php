<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Users extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "users";
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'cccd',
        'date',
        'gender',
        'room_id',
        'status',
    ];

    public function saveNew($params)
    {
        $data = array_merge(
            $params['cols'],
            [
                'password' => Hash::make($params['cols']['password']),
            ]
        );

        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }

    public function loadListWithPager($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)->where('status', 1);
        $list = $query->paginate(10);
        return $list;
    }

    public function loadAll($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)->where('status', 1);
        $list = $query->get();
        return $list;
    }

    public function loadOne($id, $params = [])
    {
        $query = DB::table($this->table)->where('id', '=', $id);
        $obj = $query->first();
        return $obj;
    }

    public function saveUpdate($params)
    {
        if (empty($params['cols']['id'])) {
            Session::push('errors', 'không xác định bản ghi cập nhập');
        }

        $dataUpdate = [];
        foreach ($params['cols'] as $colName => $val) {
            if ($colName == 'id') continue;
            $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
        }
        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($dataUpdate);
        return $res;
    }
}
