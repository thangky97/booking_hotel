<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\BookingRequest;
use App\Models\Admin;
use App\Models\Bookingdetail;
use App\Models\Rooms;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Categoryrooms;
use Illuminate\Support\Facades\DB;

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

    public function add($id)
    {
        $this->v['listEmployees'] = DB::table('admin')->get();
        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();
        $Cate_rooms = new Categoryrooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $this->v['usernew'] = Users::find($id);
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
        $today = date("Y/m/d", strtotime("now"));
        if (strtotime($request->date) >= strtotime($today)) {
            $this->v['error'] = 'Ngày sinh không hợp lệ phải nhỏ hơn hiện tại';
            $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
            return view('admin.booking.adduser', $this->v);
        }
        $user = Users::create($request->all());
        $userID = $user->id;
        $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
        return redirect()->route('route_BackEnd_Bookings_Add', $userID);
    }

    public function create($id, Request $request)
    {
        $today = date("Y/m/d", strtotime("now"));
        if (strtotime($request->checkin_date) < strtotime($today)) {
            $this->v['listEmployees'] = DB::table('admin')->get();
            $Rooms = new Rooms();
            $this->v['listRooms'] = $Rooms->loadAll();
            $Cate_rooms = new Categoryrooms();
            $this->v['listCaterooms'] = $Cate_rooms->loadAll();
            $this->v['usernew'] = Users::find($id);
            $this->v['errorin'] = 'Ngày đặt không nhỏ hơn ngày hiện tại';
            $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
            return view('admin.booking.add', $this->v);
        }
        if (strtotime($request->checkout_date) < strtotime($today)) {
            $this->v['listEmployees'] = DB::table('admin')->get();
            $Rooms = new Rooms();
            $this->v['listRooms'] = $Rooms->loadAll();
            $Cate_rooms = new Categoryrooms();
            $this->v['listCaterooms'] = $Cate_rooms->loadAll();
            $this->v['usernew'] = Users::find($id);
            $this->v['errorout'] = 'Ngày trả không nhỏ hơn ngày hiện tại';
            $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
            return view('admin.booking.add', $this->v);
        }
        if (strtotime($request->checkin_date) >= strtotime($request->checkout_date)) {
            $this->v['listEmployees'] = DB::table('admin')->get();
            $Rooms = new Rooms();
            $this->v['listRooms'] = $Rooms->loadAll();
            $Cate_rooms = new Categoryrooms();
            $this->v['listCaterooms'] = $Cate_rooms->loadAll();
            $this->v['usernew'] = Users::find($id);
            $this->v['errorout'] = 'Ngày trả không nhỏ hơn hoặc bằng ngày đặt';
            $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
            return view('admin.booking.add', $this->v);
        }
        if (empty($request->room_id)) {
            $this->v['listEmployees'] = DB::table('admin')->get();
            $Cate_rooms = new Categoryrooms();
            $this->v['listCaterooms'] = $Cate_rooms->loadAll();
            $this->v['usernew'] = Users::find($id);
            $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
            $this->v['checkin'] = $request->checkin_date;
            $this->v['checkout'] = $request->checkout_date;
            $check_in = strtotime($request->checkin_date);
            $check_out = strtotime($request->checkout_date);
            $rooms = DB::table('rooms')
                ->leftjoin('bookings_detail', 'bookings_detail.room_id', '=', 'rooms.id')
                ->leftjoin('bookings', 'bookings.id', '=', 'bookings_detail.booking_id')
                ->select('rooms.id', 'bookings.checkin_date', 'bookings.checkout_date')
                ->get();
            $arrRoomworks = array();
            foreach ($rooms as $index => $room) {
                if (strtotime($room->checkin_date) <= $check_in && strtotime($room->checkout_date) >= $check_out) {
                    $arrRoom = array($index => $room->id);
                    $arrRoomworks = $arrRoom+ $arrRoomworks;
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
            $Rooms = new Rooms();
            $this->v['listRooms'] = $Rooms->loadAll();
            return view('admin.booking.add', $this->v);
        } else {
            $booking = Booking::create([
                'user_id' => $request->user_id,
                'checkin_date' => $request->checkin_date,
                'checkout_date' => $request->checkout_date,
                'people' => 0,
                'status_booking' => $request->status_booking,
                'status_pay' => $request->status_pay,
                'staff_id' => $request->staff_id,
            ]);
            $idBooking = (string)$booking->id;
            $people = 0;
            foreach ($request->room_id as $ro_id) {
                $room = Rooms::find($ro_id);
                $people = $room->adult + $people;
                $bookings_detail = new Bookingdetail();
                $bookings_detail->booking_id = $idBooking;
                $bookings_detail->room_id = $ro_id;
                $bookings_detail->status = 1;

                $bookings_detail->save();
            }
            Booking::find($idBooking)->update([
                'people' => $people,
            ]);
            $usernew = Users::find($id);
            $usernew->name = $request->name;
            $usernew->phone = $request->phone;
            $usernew->email = $request->email;
            $usernew->address = $request->address;
            $usernew->cccd = $request->cccd;
            $usernew->date = $request->date;
            $usernew->room_id = implode(',', $request->room_id);
            $usernew->save();

            $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
            return redirect()->route('route_BackEnd_Bookings_List');
        }
    }

    public function bookings_detail($id)
    {
        $Bookingdetail = new Bookingdetail();
        $this->v['bookingDetails'] = $Bookingdetail->loadIdBooking($id);
        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();
        $booking = Booking::find($id);
        $this->v['booking'] = $booking;
        $this->v['user'] = Users::find($booking->user_id);
        $Cate_rooms = new Categoryrooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $this->v['title'] = '12 Zodiac - Chi tiết đơn';
        return view('admin.booking.detail', $this->v);
    }

    public function updatepay($id, Request $request)
    {
        $Booking = Booking::find($id);
        $Booking->status_pay = $request->status_pay;
        $Booking->save();
        return redirect()->route('route_BackEnd_Bookings_List');
    }
}
