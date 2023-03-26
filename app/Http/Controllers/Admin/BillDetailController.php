<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Bookingdetail;
use App\Models\CategoryRooms;
use App\Models\Rooms;
use App\Models\Service;
use App\Models\Users;
use Illuminate\Http\Request;

class BillDetailController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }
    public function index(Request $request)
    {
        return view('admin.bill_detail.index');
    }

    public function bill_detail($id)
    {
        $Service = new Service();
        $this->v['service'] = $Service->loadAll();
        $Cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $this->v['title'] = ' Dịch vụ đi kèm';
        $Bookingdetail = new Bookingdetail();
        $this->v['bookingDetails'] = $Bookingdetail->loadIdBooking($id);
        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();
        $booking = Booking::find($id);
        $this->v['booking'] = $booking;
        $use_date = (strtotime($this->v['booking']['checkout_date']) - strtotime($this->v['booking']['checkin_date'])) / (60 * 60 * 24);
        $this->v['use_date'] = $use_date;
        $this->v['user'] = Users::find($booking->user_id);
        $this->v['count'] = count($this->v['bookingDetails']);


        return view('admin.bill_detail.detail', $this->v);
    }

    public function add()
    {
        //thêm
        return view('admin.bill_detail.add');
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
