<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Bookingdetail;
use App\Models\CategoryRooms;
use App\Models\Rooms;
use App\Models\Users;
use Illuminate\Http\Request;

class BillController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        return view('admin.bill.index');
    }
    public function bill($id)
    {
        $Bookingdetail = new Bookingdetail();
        $this->v['bookingDetails'] = $Bookingdetail->loadIdBooking($id);
        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();
        $booking = Booking::find($id);
        $this->v['booking'] = $booking;
        $use_date =(strtotime($this->v['booking']['checkout_date'])-strtotime($this->v['booking']['checkin_date'])) /(60*60*24);
        $this->v['user'] = Users::find($booking->user_id);
        $Cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $this->v['title'] = ' Bill thanh toán';
        $this->v['count']= count($this->v['bookingDetails']);
        $this->v['use_date'] = $use_date;
        return view('admin.bill.add', $this->v);
    }


    public function store()
    {
        //lưu thêm
    }

    public function edit()
    {
        //sửa
    }

    public function update()
    {
        //lưu sửa
    }
}
