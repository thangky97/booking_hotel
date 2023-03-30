<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryRooms;
use App\Models\Rooms;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function autobooking(Request $request)
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
        if ($request->people){
            $people = $request->people;
            $this->v['peoples'] = $request->people;
        }else {
            $people = "1";
            $this->v['peoples'] = "1";
        }
        $Rooms = new Rooms();
        $listRoomwork = array_unique($arrRoomworks);
        $r=0;
        $filterRoom = array();
        foreach ($Rooms->loadOrderDescPeople() as $item){
            if (empty(in_array($item->id, $listRoomwork))) {
                if ($people>$item->adult){
                    $people = $people - $item->adult;
                    $room = array($r => $item->id);
                    $filterRoom = $filterRoom + $room;
                    $r++;
                    continue;
                }
                if ($people==$item->adult){
                    $room = array($r => $item->id);
                    $filterRoom = $filterRoom + $room;
                    $people=0;
                    $r++;
                }
            }
        }
        if ($people>0){
            foreach ($Rooms->loadOrderAscPeople() as $item){
                if ($people>0){
                    if (empty(in_array($item->id, $listRoomwork))){
                        if (empty(in_array($item->id, $filterRoom))){
                            $room = array($r => $item->id);
                            $filterRoom = $filterRoom + $room;
                            $people=0;
                            $r++;
                        }
                    }
                }
            }
        }
        $this->v['checkin'] = $check_in;
        $this->v['checkout'] = $check_out;
        $this->v['listRooms'] = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->select('rooms.*', 'category_rooms.name', 'category_rooms.price')
            ->get();
        $this->v['filterRoom'] = $filterRoom;
        $services = new Service();
        $this->v['listService'] = $services->loadAll();
        $cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $cate_rooms->loadAll();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
        return view('templates.pages.booking', $this->v);
    }
}
