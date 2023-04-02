<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryRooms;
use App\Models\Properties;
use App\Models\Rooms;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Property;

class RoomController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    public function cateroom() {
        $this->v['title'] = '12 Zodiac - Loại phòng';
        return view('templates.pages.room', $this->v);
    }

    public function index(Request $request)
    {
        $rooms = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->select('rooms.*', 'category_rooms.name', 'category_rooms.price')
            ->get();
        $this->v['listRooms'] = $rooms;
        $cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $cate_rooms->loadAll();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
        return view('templates.pages.booking_search', $this->v);
    }

    public function search(Request $request)
    {
        if ($request->people){
            $people = $request->people;
        }else{
            $people = "1";
        }
        $check_in = strtotime($request->check_in);
        $check_out = strtotime($request->check_out);
        $rooms = DB::table('rooms')
            ->leftjoin('bookings_detail', 'bookings_detail.room_id', '=', 'rooms.id')
            ->leftjoin('bookings', 'bookings.id', '=', 'bookings_detail.booking_id')
            ->select('rooms.id', 'bookings.checkin_date', 'bookings.checkout_date', 'rooms.cate_room')
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
        $cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $cate_rooms->loadAll();
        $Rooms = new Rooms();
        $arrCateRooms = array();
        foreach ($Rooms->loadAll() as $index => $item){
            if (!in_array($item->id,$arrRoomworks)){
                $arrCate = array($index => $item->cate_room);
                $arrCateRooms = $arrCate + $arrCateRooms;
            }
        }
        $cateRooms = array_count_values($arrCateRooms);
        $this->v['arrCateRooms'] = $arrCateRooms;
        $this->v['cateRooms'] = $cateRooms;
        $roomByCate = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->select('category_rooms.*', 'rooms.adult', 'rooms.adult', 'rooms.floor', 'rooms.bed')
            ->distinct()
            ->get();
        $this->v['listRooms'] = $roomByCate;
        $this->v['check_in'] = strtotime($request->check_in);
        $this->v['check_out'] = strtotime($request->check_out);
        $this->v['people'] = $people;
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
        return view('templates.pages.booking_search', $this->v);
    }

    public function search_cate($id)
    {
        $listRooms = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->select('rooms.*', 'category_rooms.name', 'category_rooms.price')->where('rooms.cate_room','=',$id)
            ->get();
        $this->v['listRooms'] = $listRooms;
        $cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $cate_rooms->loadAll();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';

        return view('templates.pages.booking_search', $this->v);
    }

    public function loadfilter(Request $request)
    {

    }

    public function roomdetail($id)
    {
        $room = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->leftjoin('property_room', 'property_room.cate_room', '=', 'category_rooms.id')
            ->select('rooms.*', 'category_rooms.name', 'category_rooms.price', 'category_rooms.description', 'property_room.properties_id')
            ->where('category_rooms.id','=',$id)
            ->where('property_room.cate_room','=',$id)
            ->first();
        $caterooms = new CategoryRooms();
        $this->v['listCaterooms'] = $caterooms->loadAll();
        $services = new Service();
        $this->v['listService'] = $services->loadAll();
        $this->v['room'] = $room;
        $property = new Properties();
        $this->v['listProperty'] = $property->loadAll();
        $this->v['title'] = 'Chi tiết phòng';
        return view('templates.pages.room_detail', $this->v);
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

