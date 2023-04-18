<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billdetails;
use App\Models\Bills;
use App\Models\Booking;
use App\Models\Bookingdetail;
use App\Models\CategoryRooms;
use App\Models\Rooms;
use App\Models\Service;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillDetailController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    public function bill_detail($id)
    {
        $booking_id = Bills::find($id)->booking_id;
        dd($booking_id);
        $this->v['listUsers'] = DB::table('users')->get();
        $Bookingdetail = new Bookingdetail();
        $this->v['bookingDetails'] = $Bookingdetail->loadIdBooking($booking_id);
        $rooms = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->leftjoin('service_room', 'service_room.room_id', '=', 'rooms.id')
            ->leftjoin('bookings', 'bookings.id', '=', 'service_room.booking_id')
            ->select('rooms.name', 'rooms.cate_room', 'rooms.images', 'rooms.adult', 'category_rooms.description', 'service_room.room_id', 'service_room.id', 'rooms.bed', 'category_rooms.price', 'service_room.service_id', 'service_room.booking_id')
            ->where('service_room.booking_id','=',$booking_id)
            ->get();

        $price = 0;
        foreach ($rooms as $item) {
            $price = $item->price + $price;
        }
        $arrService = array();
        foreach ($rooms as $item){
            $arrService = array_merge($arrService,explode(',' ,$item->service_id));
        }
        $Service = new Service();
        $this->v['listServices'] = $Service->loadAll();
        foreach ($arrService as $item){
            foreach ($this->v['listServices'] as $service){
                if ($item == $service->id){
                    $price = $price + $service->price;
                }
            }
        }
        $this->v['listRooms'] = $rooms;
        $this->v['price'] = $price;
        $booking = Booking::find($booking_id);
        $this->v['booking'] = $booking;
        $this->v['user'] = Users::find($booking->user_id);
        $Cate_rooms = new Categoryrooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $Service = new Service();
        $this->v['listServices'] = $Service->loadAll();
        $history = DB::table('bookings')
            ->where('bookings.user_id', '=', $this->v['user']['id'])
            ->where('bookings.id', '!=', $booking_id)
            ->orderByDesc('bookings.checkin_date')
            ->get();
        $this->v['history'] = $history;
        $bills = new Bills();
        $arrBills = array();
        foreach ($bills->loadAll() as $index => $bill_bk) {
            $arrBill_bk = array($index => $bill_bk->booking_id);
            $arrBills = $arrBill_bk + $arrBills;
        }
        $this->v['list'] = $arrBills;

        $this->v['title'] = 'Chi tiết hóa đơn';


        return view('admin.bill_detail.detail', $this->v);
    }

}
