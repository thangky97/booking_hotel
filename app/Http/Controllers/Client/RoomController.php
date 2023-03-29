<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryRooms;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $room = new Rooms();
        $this->v['listRooms'] = $room->loadAllStatus();
        $cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $cate_rooms->loadAll();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
        return view('templates.pages.booking_search', $this->v);
    }

    public function search(Request $request)
    {
//        if(isset($request->cateroom_id)){
//            $listRooms = DB::table('rooms')
//                ->select('*')->where('cate_room','=',$request->cateroom_id)
//                ->get();
//            $this->v['listRooms'] = $listRooms;
//            $cate_rooms = new CategoryRooms();
//            $this->v['listCaterooms'] = $cate_rooms->loadAll();
//            $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
//            return view('templates.pages.booking_search', $this->v);
//        }
//        $check_in = strtotime($request->check_in);
//        $check_out = strtotime($request->check_out);
//        $rooms = DB::table('rooms')
//            ->leftjoin('bookings_detail', 'bookings_detail.room_id', '=', 'rooms.id')
//            ->leftjoin('bookings', 'bookings.id', '=', 'bookings_detail.booking_id')
//            ->select('rooms.id', 'bookings.checkin_date', 'bookings.checkout_date')
//            ->get();
//        $arrRoomworks = array();
//        foreach ($rooms as $index => $room) {
//            if (strtotime($room->checkin_date) <= $check_in && strtotime($room->checkout_date) >= $check_out) {
//                $arrRoom = array($index => $room->id);
//                $arrRoomworks = $arrRoom + $arrRoomworks;
//            }
//            if (strtotime($room->checkin_date) > $check_in && strtotime($room->checkout_date) < $check_out) {
//                $arrRoom = array($index => $room->id);
//                $arrRoomworks = $arrRoom + $arrRoomworks;
//            }
//            if (strtotime($room->checkin_date) > $check_in && strtotime($room->checkin_date) <= $check_out) {
//                $arrRoom = array($index => $room->id);
//                $arrRoomworks = $arrRoom + $arrRoomworks;
//            }
//            if (strtotime($room->checkout_date) >= $check_in && strtotime($room->checkout_date) < $check_out) {
//                $arrRoom = array($index => $room->id);
//                $arrRoomworks = $arrRoom + $arrRoomworks;
//            }
//        }
//        $this->v['listRoomwork'] = array_unique($arrRoomworks);
//        $cate_rooms = new CategoryRooms();
//        $this->v['listCaterooms'] = $cate_rooms->loadAll();
//        $Rooms = new Rooms();
//        $this->v['listRooms'] = $Rooms->loadAll();
//        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
//        return view('templates.pages.booking_search', $this->v);

        $check_in = strtotime($request->check_in);
        $check_out = strtotime($request->check_out);
        $rooms = DB::table('rooms')
            ->leftjoin('bookings_detail', 'bookings_detail.room_id', '=', 'rooms.id')
            ->leftjoin('bookings', 'bookings.id', '=', 'bookings_detail.booking_id')
            ->select('rooms.id', 'bookings.checkin_date', 'bookings.checkout_date')
            ->get();
        $arrRoomworks = array();
        foreach ($rooms as $index => $room) {
            if (strtotime($room->checkin_date) <= $check_in && strtotime($room->checkout_date) >= $check_out) {
                $arrRoom = array($index => $room->id);
                $arrRoomworks = $arrRoom + $arrRoomworks;
            }
            if (strtotime($room->checkin_date) > $check_in && strtotime($room->checkout_date) < $check_out) {
                $arrRoom = array($index => $room->id);
                $arrRoomworks = $arrRoom + $arrRoomworks;
            }
            if (strtotime($room->checkin_date) > $check_in && strtotime($room->checkin_date) <= $check_out) {
                $arrRoom = array($index => $room->id);
                $arrRoomworks = $arrRoom + $arrRoomworks;
            }
            if (strtotime($room->checkout_date) >= $check_in && strtotime($room->checkout_date) < $check_out) {
                $arrRoom = array($index => $room->id);
                $arrRoomworks = $arrRoom + $arrRoomworks;
            }
        }
        $people = $request->people;
        $Rooms = new Rooms();
        $listRoomwork = array_unique($arrRoomworks);
        $r=0;
        $filterRoom = array();
        foreach ($Rooms->loadOrderByPeople() as $item){
            if (empty(in_array($item->id, $listRoomwork))) {
                if ($people>$item->adult){
                    $people = $people - $item->adult;
                    $room = array($r => $item->id);
                    $filterRoom = $filterRoom + $room;
                    $r++;
                    continue;
                }
                if ($people==$item->adult){
                    $room = array($r => $item->name);
                    $filterRoom = $filterRoom + $room;
                    $people=0;
                    $r++;
                }
            }
        }
        if ($people>0){
            return;
        }
        $cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $cate_rooms->loadAll();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
        return view('templates.pages.booking_search', $this->v);
    }

    public function search_cate($id)
    {
        $cate_rooms = new CategoryRooms();
        $this->v['loai_phong'] = $cate_rooms->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
        $room = new Rooms();
        $this->v['room'] = $room->loadAllstatus()
            ->where('cate_room', '=', $id);
        //     ->where('status', '=', 1)
        // ->where(function ($query) use ($check_in, $check_out) {
        //     $query->where([$check_in, '<', 'checkin_date'], [$check_out, '<', 'checkout_date']);
        //     $query->orWhere([$check_out, '>', 'checkin_date'], [$check_out, '>', 'checkout_date']);
        // });
        $this->v['room'] = $room;

        return view('templates.pages.booking_search', $this->v);
    }

    public function loadfilter(Request $request)
    {

    }


    public function add()
    {
        //thêm
        return view('admin.room.add');
    }

    public function store()
    {
        //lưu thêm
    }

    public function edit($user)
    {
        //sửa
    }

    public function update()
    {
        //lưu sửa
    }
}

