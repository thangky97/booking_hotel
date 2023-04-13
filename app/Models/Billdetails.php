<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Billdetails extends Model
{
    use HasFactory;
    protected $table = "bill_detail";
    protected $fillable = ['id', 'service_id', 'room_id', 'bill_id','date', 'status','created_at', 'updated_at'];

    public function loadListWithPager($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)->orderBy('id', 'desc');
        $list = $query->paginate(10);
        return $list;
    }

    public function loadAll($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
        $list = $query->get();
        return $list;
    }

    public function saveNew($params)
    {
        $data = array_merge($params['cols']); // array_merge để nối 2 hay nhiều mảng lại thành 1 mảng
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }

    public function loadOne($id, $param = [])
    {
        $query = DB::table($this->table)
            ->where('id', '=', $id);
        $obj = $query->first();
        return $obj;
    }

    public function loadOneBillDetail($id, $params = []) {
        $query = DB::table($this->table)->where('bill_id', '=', $id);
        $obj = $query->first();
        return $obj;
    }
    //phương thức update
    public function saveUpdate($params)
    {
        if (empty($params['cols']['id'])) {
            Session::flash('error', 'Không xác định bản ghi cập nhật');
            return null;
        }
        $dataUpdate = [];
        foreach ($params['cols'] as $colName => $val) {
            if ($colName == 'id') continue;
            if (in_array($colName, $this->fillable)) {
                $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
            }
        }
        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($dataUpdate);
        return $res;
    }

    public function bill()
    {
        return $this->belongsTo(Bills::class, 'bill_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }
}
