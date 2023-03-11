<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\BookingRequest;
use App\Models\Bookingdetail;
use App\Models\Rooms;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Categoryrooms;

class BookingController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function bookings()
    {
        $Users = new Users();
        $this->v['listUsers'] = $Users->loadAll();
        $Cate_rooms = new Categoryrooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $Bookings = new Booking();
        $this->v['listBookings'] = $Bookings->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
        return view('admin.booking.index', $this->v);
    }

    public function add()
    {
        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();
        $Cate_rooms = new Categoryrooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $this->v['usernew'] = Users::find(\DB::table('users')->max('id'));
        $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
        return view('admin.booking.add', $this->v);
    }

    public function adduser()
    {
        $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
        return view('admin.booking.adduser', $this->v);
    }

    public function createuser(UserRequest $request)
    {
        Users::create($request->all());
        $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
        return redirect()->route('route_BackEnd_Bookings_Add');
    }

    public function create(BookingRequest $request)
    {
        $booking = Booking::create($request->all());
        $id = (string)$booking->id;
        $bookings_detail = new Bookingdetail();
        $bookings_detail->booking_id = $id;
        $bookings_detail->room_id = $request->room_id;
        $bookings_detail->status = 1;

        $bookings_detail->save();

        $usernew = Users::find(\DB::table('usermains')->max('id'));
        $usernew->name = $request->name;
        $usernew->phone = $request->phone;
        $usernew->email = $request->email;
        $usernew->address = $request->address;
        $usernew->cccd = $request->cccd;
        $usernew->date = $request->date;
        $usernew->room_id = $request->room_id;
        $usernew->save();

        $room = Rooms::find($request->room_id);
        $room->status = 0;
        $room->save();

        $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
        return redirect()->route('route_BackEnd_Bookings_List');
    }

    public function bookings_detail($id)
    {
        $Bookingdetail = new Bookingdetail();
        $this->v['bookingDetail'] = $Bookingdetail->loadOne($id);
        $room = Rooms::find($Bookingdetail->loadOne($id)->room_id);
        $this->v['room']=$room;
        $room_cate_id = $room->cate_room;
        $booking = Booking::find($id);
        $this->v['booking']=$booking;
        $this->v['user'] = Users::find($booking->user_id);
        $this->v['categoryRoom'] = Categoryrooms::find($room_cate_id);
        $this->v['title'] = '12 Zodiac - Chi tiết đơn';
        return view('admin.booking.detail', $this->v);
    }
}
