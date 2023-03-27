<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\BookingRequest;
use App\Models\Admin;
use App\Models\Bills;
use App\Models\Bookingdetail;
use App\Models\Rooms;
use App\Models\Service;
use App\Models\Serviceroom;
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
        $this->v['listUsers'] = DB::table('users')->get();
        $Cate_rooms = new Categoryrooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $Bookings = new Booking();
        $this->v['listBookings'] = $Bookings->loadListWithPager();
        $bills = new Bills();
        $arrBills = array();
        foreach ($bills->loadAll() as $index => $bill_bk){
            $arrBill_bk= array($index => $bill_bk->booking_id);
            $arrBills = $arrBill_bk + $arrBills;
        }
        $this->v['list'] = $arrBills;
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

        if($request->hasFile('cccd')) {
            $cccd = $request->cccd;
            $cccdName = $cccd->hashName();
            $cccdName = $request->username . '_' . $cccdName;
            $user->cccd = $cccd->storeAs('public/cccd', $cccdName);
        } else {
            $user->cccd = '';
        }

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
            $Rooms = new Rooms();
            $this->v['listRooms'] = $Rooms->loadAll();
            $this->v['people'] = $request->people;
            return view('admin.booking.add', $this->v);
        } else {
            $people = 0;
            foreach ($request->room_id as $ro_id) {
                $room = Rooms::find($ro_id);
                $people = $room->adult + $people;
            }
            if ($people < $request->people) {
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
                $Rooms = new Rooms();
                $this->v['listRooms'] = $Rooms->loadAll();
                $this->v['errorpeople'] = 'Số người trong phòng không đủ. Xin hãy chọn thêm phòng!';
                $this->v['people'] = $request->people;

                return view('admin.booking.add', $this->v);
            }
            $booking = Booking::create([
                'user_id' => $request->user_id,
                'checkin_date' => $request->checkin_date,
                'checkout_date' => $request->checkout_date,
                'people' => $people,
                'status_booking' => $request->status_booking,
                'status_pay' => $request->status_pay,
                'staff_id' => $request->staff_id,
            ]);
            $idBooking = (string)$booking->id;
            foreach ($request->room_id as $ro_id) {
                $room = Rooms::find($ro_id);
                $bookings_detail = new Bookingdetail();
                $bookings_detail->booking_id = $idBooking;
                $bookings_detail->room_id = $ro_id;
                $bookings_detail->status = 1;

                $bookings_detail->save();
            }
            $usernew = Users::find($id);
            $usernew->name = $request->name;
            $usernew->phone = $request->phone;
            $usernew->email = $request->email;
            $usernew->address = $request->address;
            // $usernew->cccd = $request->cccd;

            $usernew->date = $request->date;
            $usernew->room_id = implode(',', $request->room_id);
            $usernew->save();

            $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
            return redirect()->route('route_BackEnd_Bookings_Addservice', $idBooking);
        }
    }

    public function bookings_detail($id)
    {
        $Bookingdetail = new Bookingdetail();
        $this->v['bookingDetails'] = $Bookingdetail->loadIdBooking($id);
        $rooms = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->leftjoin('service_room', 'service_room.room_id', '=', 'rooms.id')
            ->leftjoin('bookings', 'bookings.id', '=', 'service_room.booking_id')
            ->select('rooms.name', 'rooms.cate_room', 'rooms.images', 'rooms.adult', 'rooms.description', 'service_room.room_id', 'service_room.id', 'rooms.bed', 'category_rooms.price', 'service_room.service_id', 'service_room.booking_id')->where('service_room.booking_id','=',$id)
            ->get();
        $price = 0;
        foreach ($rooms as $item){
            $price = $item->price + $price;
        }
        $this->v['listRooms'] = $rooms;
        $this->v['price'] = $price;
        $booking = Booking::find($id);
        $this->v['booking'] = $booking;
        $this->v['user'] = Users::find($booking->user_id);
        $Cate_rooms = new Categoryrooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $Service = new Service();
        $this->v['listServices'] = $Service->loadAll();
        $this->v['title'] = 'Chi tiết đơn';
        return view('admin.booking.detail', $this->v);
    }

    public function updatepay($id, Request $request)
    {
        $Booking = Booking::find($id);
        $Booking->status_pay = $request->status_pay;
        $Booking->save();
        return redirect()->route('route_BackEnd_Bookings_List');
    }

    public function addservice($id, Request $request)
    {
        $rooms = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->leftjoin('bookings_detail', 'bookings_detail.room_id', '=', 'rooms.id')
            ->leftjoin('bookings', 'bookings.id', '=', 'bookings_detail.booking_id')
            ->select('rooms.name', 'rooms.cate_room', 'rooms.images', 'rooms.adult', 'bookings_detail.id', 'bookings_detail.room_id', 'bookings_detail.booking_id', 'bookings.checkin_date', 'bookings.checkout_date', 'category_rooms.price')
            ->where('bookings.id','=',$id)
            ->get();
        $this->v['listRooms'] = $rooms;
        $Services = new Service();
        $this->v['listSevice'] = $Services->loadAll();
        $this->v['id'] = (int)$id;
        $this->v['title'] = 'Chọn dịch vụ';
        return view('admin.booking.addservice', $this->v);
    }

    public function createservice($id, Request $request)
    {
        $rooms = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->leftjoin('bookings_detail', 'bookings_detail.room_id', '=', 'rooms.id')
            ->leftjoin('bookings', 'bookings.id', '=', 'bookings_detail.booking_id')
            ->select('rooms.name', 'rooms.cate_room', 'rooms.images', 'rooms.adult', 'bookings_detail.id', 'bookings_detail.room_id', 'bookings_detail.booking_id', 'bookings.checkin_date', 'bookings.checkout_date', 'category_rooms.price')->where('bookings.id','=',$id)
            ->get();
        foreach ($rooms as $index => $room){
            $service = new Serviceroom();
            $booking_id = $room->booking_id;
            if ($index==0){
                if ($request->service_id_0){
                    $service_id = implode(',' ,$request->service_id_0);
                }else{
                    $service_id = null;
                }
            }
            if ($index==1){
                if ($request->service_id_1){
                    $service_id = implode(',' ,$request->service_id_1);
                }else{
                    $service_id = null;
                }
            }
            if ($index==2){
                if ($request->service_id_2){
                    $service_id = implode(',' ,$request->service_id_2);
                }else{
                    $service_id = null;
                }
            }
            if ($index==3){
                if ($request->service_id_3){
                    $service_id = implode(',' ,$request->service_id_3);
                }else{
                    $service_id = null;
                }
            }
            if ($index==4){
                if ($request->service_id_4){
                    $service_id = implode(',' ,$request->service_id_4);
                }else{
                    $service_id = null;
                }
            }
            if ($index==5){
                if ($request->service_id_5){
                    $service_id = implode(',' ,$request->service_id_5);
                }else{
                    $service_id = null;
                }
            }
            if ($index==6){
                if ($request->service_id_6){
                    $service_id = implode(',' ,$request->service_id_6);
                }else{
                    $service_id = null;
                }
            }
            if ($index==7){
                if ($request->service_id_7){
                    $service_id = implode(',' ,$request->service_id_7);
                }else{
                    $service_id = null;
                }
            }
            if ($index==8){
                if ($request->service_id_8){
                    $service_id = implode(',' ,$request->service_id_8);
                }else{
                    $service_id = null;
                }
            }
            if ($index==9){
                if ($request->service_id_9){
                    $service_id = implode(',' ,$request->service_id_9);
                }else{
                    $service_id = null;
                }
            }
            if ($index==10){
                if ($request->service_id_10){
                    $service_id = implode(',' ,$request->service_id_10);
                }else{
                    $service_id = null;
                }
            }
            if ($index==11){
                if ($request->service_id_11){
                    $service_id = implode(',' ,$request->service_id_11);
                }else{
                    $service_id = null;
                }
            }
            if ($index==12){
                if ($request->service_id_12){
                    $service_id = implode(',' ,$request->service_id_12);
                }else{
                    $service_id = null;
                }
            }
            if ($index==13){
                if ($request->service_id_13){
                    $service_id = implode(',' ,$request->service_id_13);
                }else{
                    $service_id = null;
                }
            }
            if ($index==14){
                if ($request->service_id_14){
                    $service_id = implode(',' ,$request->service_id_14);
                }else{
                    $service_id = null;
                }
            }
            if ($index==15){
                if ($request->service_id_15){
                    $service_id = implode(',' ,$request->service_id_15);
                }else{
                    $service_id = null;
                }
            }
            $room_id = $room->room_id;
            $service->create([
                'booking_id'=>$booking_id,
                'room_id'=>$room_id,
                'service_id'=>$service_id,
                'status'=>1
            ]);
        }
        return redirect()->route('route_BackEnd_Bookings_List');
    }

    public function editservice($id)
    {
        $room = DB::table('rooms')
            ->leftjoin('service_room', 'service_room.room_id', '=', 'rooms.id')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->leftjoin('bookings', 'bookings.id', '=', 'service_room.booking_id')
            ->select('rooms.name', 'rooms.cate_room', 'rooms.images', 'rooms.adult', 'service_room.id', 'service_room.booking_id', 'service_room.room_id', 'bookings.checkin_date', 'bookings.checkout_date', 'category_rooms.price', 'service_room.service_id')
            ->where('service_room.id','=',$id)
            ->get()->first();
        $this->v['room'] = $room;
        $this->v['services'] = explode(",", $room->service_id);
        $Service = new Service();
        $this->v['listService'] = $Service->loadAll();
        $this->v['id'] = $id;
        $this->v['title'] = '12 Zodiac - Chi tiết đơn';
        return view('admin.booking.editservice', $this->v);
    }

    public function updateservice($id, Request $request)
    {
        if ($request->service_id){
            $service_id = implode(',' ,$request->service_id);
        }else{
            $service_id=null;
        }
        Serviceroom::find($id)->update([
            'service_id' => $service_id,
        ]);
        $serviceroom = Serviceroom::find($id);
        return redirect()->route('route_BackEnd_Bookings_Detail',$serviceroom->booking_id);
    }
}
