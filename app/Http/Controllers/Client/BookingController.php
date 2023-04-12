<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Bookingdetail;
use App\Models\CategoryRooms;
use App\Models\Rooms;
use App\Models\Service;
use App\Models\ServiceRoom;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    public function booking(Request $request)
    {
        $arrRooms = explode(",", $request->rooms);
        $caterooms = new CategoryRooms();
        $arrCateRoom = array();
        foreach ($caterooms->loadAll() as $item){
            foreach ($arrRooms as $index => $i){
                if ($i!="null"){
                    if (($index+1)==$item->id && $i>0){
                        $arrCate = array($item->id => $i);
                        $arrCateRoom = $arrCate + $arrCateRoom;
                    }
                }
            }
        }
        $check_in = strtotime($request->check_in);
        $check_out = strtotime($request->check_out);
        $roomWork = DB::table('rooms')
            ->leftjoin('bookings_detail', 'bookings_detail.room_id', '=', 'rooms.id')
            ->leftjoin('bookings', 'bookings.id', '=', 'bookings_detail.booking_id')
            ->select('rooms.id', 'bookings.checkin_date', 'bookings.checkout_date')
            ->get();
        $arrRoomworks = array();
        foreach ($roomWork as $index => $room) {
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
        $listRoomwork = array_unique($arrRoomworks);
        $roomNotWorks = array();
        $priceRoom = 0;
        foreach ($arrCateRoom as $index => $item){
            $roomNotWork = DB::table('rooms')
                ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
                ->select('rooms.id','rooms.cate_room','category_rooms.image','rooms.adult','rooms.bed','category_rooms.price','category_rooms.name')
                ->where('cate_room','=',$index)
                ->paginate($item)->items();
            $roomNotWorks = array_merge($roomNotWork,$roomNotWorks);
        }
        $this->v['checkin'] = $check_in;
        $this->v['checkout'] = $check_out;
        $this->v['peoples'] = $request->people;
        $this->v['listRooms'] = $roomNotWorks;
        $services = new Service();
        $this->v['listService'] = $services->loadAll();
        $cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $cate_rooms->loadAll();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
        return view('templates.pages.booking', $this->v);

    }

    public function autobooking(Request $request)
    {
        $cateRoom = DB::table('category_rooms')->select('*')->where('price','=',$request->price)->get()->first();
        $check_in = strtotime($request->check_in);
        $check_out = strtotime($request->check_out);
        $rooms = DB::table('rooms')
            ->leftjoin('bookings_detail', 'bookings_detail.room_id', '=', 'rooms.id')
            ->leftjoin('bookings', 'bookings.id', '=', 'bookings_detail.booking_id')
            ->select('rooms.id', 'rooms.cate_room', 'bookings.checkin_date', 'bookings.checkout_date')
            ->where('rooms.cate_room','=',$cateRoom->id)
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
        $roomWork = array_unique($arrRoomworks);
        $lishRoom = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->select('rooms.id')
            ->where('rooms.cate_room','=',$cateRoom->id)
            ->where('category_rooms.id','=',$cateRoom->id)
            ->get();
        $count=1;
        foreach ($lishRoom as $room){
            if (!in_array($room->id,$roomWork)&&$count==1){
                $roomChoose = $room->id;
                $count=0;
            }
        }
        if (empty($roomChoose)){
            return redirect()->route('route_FrontEnd_Home');
        }
        $this->v['listRooms'] = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->select('rooms.id','rooms.cate_room','category_rooms.image','rooms.adult','rooms.bed','category_rooms.price','category_rooms.name')
            ->where('rooms.id','=',$roomChoose)->get();
        $this->v['checkin'] = $check_in;
        $this->v['checkout'] = $check_out;
        $this->v['peoples'] = $request->people;
        $services = new Service();
        $this->v['listService'] = $services->loadAll();
        $cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $cate_rooms->loadAll();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
        return view('templates.pages.booking', $this->v);
    }

    public function createBooking(Request $request)
    {
        $user = Users::create($request->all());
        $booking = Booking::create([
            'user_id' => $user->id,
            'checkin_date' => date("Y-m-d", $request->checkin_date),
            'checkout_date' => date("Y-m-d", $request->checkout_date),
            'people' => $request->people,
            'status_booking' => 0,
            'status_pay' => 0,
        ]);
        $roomCreates = explode(",", $request->room_id);
        foreach ($roomCreates as $index => $item) {
            $bookingDetail = Bookingdetail::create([
                'booking_id' => $booking->id,
                'room_id' => $item,
                'status' => 1,
            ]);
            if ($index == 0) {
                if ($request->service_id_1) {
                    $service_id = implode(',', $request->service_id_1);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 1) {
                if ($request->service_id_2) {
                    $service_id = implode(',', $request->service_id_2);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 2) {
                if ($request->service_id_3) {
                    $service_id = implode(',', $request->service_id_3);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 3) {
                if ($request->service_id_4) {
                    $service_id = implode(',', $request->service_id_4);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 4) {
                if ($request->service_id_5) {
                    $service_id = implode(',', $request->service_id_5);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 5) {
                if ($request->service_id_6) {
                    $service_id = implode(',', $request->service_id_6);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 6) {
                if ($request->service_id_7) {
                    $service_id = implode(',', $request->service_id_7);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 7) {
                if ($request->service_id_8) {
                    $service_id = implode(',', $request->service_id_8);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 8) {
                if ($request->service_id_9) {
                    $service_id = implode(',', $request->service_id_9);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 9) {
                if ($request->service_id_10) {
                    $service_id = implode(',', $request->service_id_10);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 10) {
                if ($request->service_id_11) {
                    $service_id = implode(',', $request->service_id_11);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 11) {
                if ($request->service_id_12) {
                    $service_id = implode(',', $request->service_id_12);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 12) {
                if ($request->service_id_13) {
                    $service_id = implode(',', $request->service_id_13);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 13) {
                if ($request->service_id_14) {
                    $service_id = implode(',', $request->service_id_14);
                } else {
                    $service_id = null;
                }
            }
            if ($index == 14) {
                if ($request->service_id_15) {
                    $service_id = implode(',', $request->service_id_15);
                } else {
                    $service_id = null;
                }
            }
            Serviceroom::create([
                'booking_id' => $booking->id,
                'room_id' => $item,
                'service_id' => $service_id,
                'status' => 1
            ]);
        }
        $rooms = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->leftjoin('service_room', 'service_room.room_id', '=', 'rooms.id')
            ->leftjoin('bookings', 'bookings.id', '=', 'service_room.booking_id')
            ->select('category_rooms.name', 'rooms.cate_room', 'rooms.images', 'rooms.adult', 'category_rooms.description', 'service_room.room_id', 'service_room.id', 'rooms.bed', 'category_rooms.price', 'service_room.service_id', 'service_room.booking_id')
            ->where('service_room.booking_id', '=', $booking->id)
            ->get();

        $price = 0;
        foreach ($rooms as $item) {
            $price = $item->price + $price;
        }
        $arrService = array();
        foreach ($rooms as $item) {
            $arrService = array_merge($arrService, explode(',', $item->service_id));
        }
        $Service = new Service();
        $this->v['listServices'] = $Service->loadAll();
        foreach ($arrService as $item) {
            foreach ($this->v['listServices'] as $service) {
                if ($item == $service->id) {
                    $price = $price + $service->price;
                }
            }
        }
        $this->v['listRooms'] = $rooms;
        $this->v['price'] = $price*(($request->checkout_date-$request->checkin_date)/(60*60*24));
        $Cate_rooms = new Categoryrooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $this->v['user'] = $user;
        $this->v['booking'] = $booking;
        $this->v['title'] = 'Thanh toán';
        return view('templates/pages/checkout', $this->v);
    }
}
