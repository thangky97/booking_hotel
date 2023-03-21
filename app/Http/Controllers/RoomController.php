<?php

namespace App\Http\Controllers;

use App\Models\CategoryRooms;
use App\Models\Rooms;
use Faker\Core\Number;
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
        $this->v['listCaterooms'] = $cate_rooms->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
        return view('templates.pages.booking_search', $this->v);
    }
    public function search(Request $request)
    {
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
        $this->v['listRoomwork'] = array_unique($arrRoomworks);
        $cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $cate_rooms->loadAll();
        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();
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

        return view('templates.pages.booking_search', $this->v);
    }
    public function loadfilter(Request $request)
    {
        $room = new Rooms();
        $this->v['room'] = $room->loadAllStatus();
        $cate_rooms = new CategoryRooms();
        $this->v['loai_phong'] = $cate_rooms->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';

        return view('templates.pages.booking_search', $this->v);
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
