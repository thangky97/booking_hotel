<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Rooms extends Model
{
    use HasFactory;
    protected $table = "rooms";
    protected $fillable = ['id','name','cate_room','images','floor','description','adult','childrend','bed','status','created_at','updated_at'];

    public function loadListWithPager($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
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


    //Lọc phòng theo loại phòng
    public function loadListWithCategory($param = [],$cate=[])
    {   if(isset($_GET['category_room'])){
        $category_room = $_GET['category_room'];
        }else{
        $category_room = $cate;
        }
        $query = DB::table($this->table)
            ->select($this->fillable)
            ->where('cate_room_id','=',$category_room);
        $list = $query->paginate(10);
        return $list;
    }

    //Lọc phòng theo trạng thái
    public function loadAllStatus($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable)
            ->where('status','=',1);
        $list = $query->get();
        return $list;
    }
    //Lọc phòng trừ đơn đã order
    public function loadAllOrder($param = []){
     //biến thời gian hiện tại
        $query = DB::table($this->table)
        ->select('rooms.id','rooms.name','rooms.cate_room','rooms.images','rooms.floor','rooms.description','rooms.adult','rooms.childrend','rooms.bed','rooms.status','bookings.checkin_date','bookings.checkout_date') //truy vấn DB
        ->leftJoin('bookings_detail','bookings_detail.id','=','rooms.id')
        ->leftJoin('bookings','bookings.id','=','bookings_detail.booking_id');
        //Điều kiện trạng thái phòng đang trống
        $list = $query->get();
        return $list;
    }


    //phương thức thêm mới

    public function saveNew($params)
    {
        $data = array_merge($params['cols']);// array_merge để nối 2 hay nhiều mảng lại thành 1 mảng
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
    //phương thức lấy 1 mảng dữ liệu
    public function loadOne($id, $param = [])
    {
        $query = DB::table($this->table)
            ->where('id', '=', $id);
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

   
}
