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
use App\Models\ServiceRoom;
use App\Models\Users;
use Illuminate\Database\DBAL\TimestampType;
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
    public function bill_room($id)
    {
        $Service = new Service();
        $this->v['service'] = $Service->loadAll();

        $Service_room = new ServiceRoom();
        $this->v['service_room'] = $Service_room->loadIdBooking($id);

        $Bookingdetail = new Bookingdetail();
        $this->v['bookingDetails'] = $Bookingdetail->loadIdBooking($id);

        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();

        $booking = Booking::find($id);
        $this->v['booking'] = $booking;

        $use_date = (strtotime($this->v['booking']['checkout_date']) - strtotime($this->v['booking']['checkin_date'])) / (60 * 60 * 24);
        $this->v['use_date'] = $use_date;

        $Cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();

        $money_room = 0; //tổng tiền phòng
        foreach (($this->v['bookingDetails']) as $index => $bk_dt) {
            foreach (($this->v['listRooms']) as $index => $room) {
                if ($bk_dt->room_id == $room->id) {
                    foreach (($this->v['listCaterooms']) as $index => $cate_room) {
                        if ($room->cate_room == $cate_room->id) {
                            foreach (explode(',', $cate_room->price) as $index => $price) {
                                $money_room += $price;
                            }
                        }
                    }
                }
            };
        };
        $total_money_room = $money_room * $use_date;
        $this->v['total_money_room'] = $total_money_room;

        $this->v['user'] = Users::find($booking->user_id);
        $this->v['title'] = 'Phí phòng';
        $this->v['count'] = count($this->v['bookingDetails']);


        return view('admin.bill.billroom', $this->v);
    }
    public function bill_service($id)
    {
        $Service = new Service();
        $this->v['service'] = $Service->loadAll();

        $Cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();

        $Bookingdetail = new Bookingdetail();
        $this->v['bookingDetails'] = $Bookingdetail->loadIdBooking($id);

        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();

        $booking = Booking::find($id);
        $this->v['booking'] = $booking;

        $use_date = (strtotime($this->v['booking']['checkout_date']) - strtotime($this->v['booking']['checkin_date'])) / (60 * 60 * 24);
        $this->v['use_date'] = $use_date;

        $Service_room = new ServiceRoom();
        $this->v['service_room'] = $Service_room->loadIdBooking($id);

        //Tổng tiền dịch  vụ
        $money_service = 0;
        foreach (($this->v['bookingDetails']) as $index => $bk_dt) {
            foreach (($this->v['listRooms']) as $index => $room) {
                if ($bk_dt->room_id == $room->id) {
                    foreach ($this->v['service_room'] as $index => $ser_room) {
                        if ($bk_dt->room_id == $ser_room->room_id) {
                            $s_r = explode(',', $ser_room->service_id);
                            foreach ($this->v['service'] as $index => $ser) {

                                foreach ($s_r as $inx => $sr_id) {
                                    if ($sr_id == $ser->id) {
                                        $money_service += array_sum(explode(',', $inx > 0 ? ',' . $ser->price : $ser->price));
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $total_money_service = $money_service;
        $this->v['total_money_service'] = $total_money_service;
        $this->v['title'] = 'Phí dịch vụ đi kèm';
        $this->v['user'] = Users::find($booking->user_id);
        $this->v['count'] = count($this->v['bookingDetails']);

        return view('admin.bill.billservice', $this->v);
    }


    public function bills($id)
    {
        $Service = new Service();
        $this->v['service'] = $Service->loadAll();

        $Service_room = new ServiceRoom();
        $this->v['service_room'] = $Service_room->loadIdBooking($id);


        $Bookingdetail = new Bookingdetail();
        $this->v['bookingDetails'] = $Bookingdetail->loadIdBooking($id);

        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();

        $booking = Booking::find($id);
        $this->v['booking'] = $booking;

        $use_date = (strtotime($this->v['booking']['checkout_date']) - strtotime($this->v['booking']['checkin_date'])) / (60 * 60 * 24);
        $this->v['use_date'] = $use_date;

        $Cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $money_room = 0; //tổng tiền phòng
        //vòng lặp tính tổng tiền room
        foreach (($this->v['bookingDetails']) as $index => $bk_dt) {
            foreach (($this->v['listRooms']) as $index => $room) {
                if ($bk_dt->room_id == $room->id) {
                    foreach (($this->v['listCaterooms']) as $index => $cate_room) {
                        if ($room->cate_room == $cate_room->id) {
                            foreach (explode(',', $cate_room->price) as $index => $price) {
                                $money_room += $price;
                            }
                        }
                    }
                }
            };
        };
        //Tổng tiền dịch  vụ
        $money_service = 0;
        foreach (($this->v['bookingDetails']) as $index => $bk_dt) {
            foreach (($this->v['listRooms']) as $index => $room) {
                if ($bk_dt->room_id == $room->id) {
                    foreach ($this->v['service_room'] as $index => $ser_room) {
                        if ($bk_dt->room_id == $ser_room->room_id) {
                            $s_r = explode(',', $ser_room->service_id);
                            foreach ($this->v['service'] as $index => $ser) {

                                foreach ($s_r as $inx => $sr_id) {
                                    if ($sr_id == $ser->id) {
                                        $money_service += array_sum(explode(',', $inx > 0 ? ',' . $ser->price : $ser->price));
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $total_money_room = $money_room * $use_date;
        $this->v['total_money_room'] = $total_money_room;
        $total_money_service = $money_service;
        $this->v['total_money_service'] = $total_money_service;

        $bills = new Bills();
        $arrBills = array();
        foreach ($bills->loadAll() as $index => $bill_bk) {
            $arrBill_bk = array($index => $bill_bk->booking_id);
            $arrBills = $arrBill_bk + $arrBills;
        }
        $this->v['list'] = $arrBills;
        if (!in_array($id, $this->v['list'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $bill_add = Bills::create([
                'booking_id' => $id,
                'total_money' => $total_money_room + $total_money_service,
                'status' => 1
            ]);
            $bill_id = $bill_add->id;

            foreach (($this->v['bookingDetails']) as $index => $bk_dt) {
                foreach (($this->v['listRooms']) as $index => $room) {
                    foreach ($this->v['service_room'] as $index => $ser_room) {
                        if ($bk_dt->room_id == $room->id) {
                            if ($bk_dt->room_id == $ser_room->room_id) {

                                if ($ser_room->service_id != null) {
                                    $service_id = $ser_room->service_id;
                                } else {
                                    $service_id = null;
                                }
                                Billdetails::create([
                                    'service_id' => $service_id,
                                    'room_id' => $bk_dt->room_id,
                                    'bill_id' => $bill_id,
                                    'date' => $use_date,
                                    'status' => 1
                                ]);
                            }
                        }
                    }
                }
            }
        }
        $this->v['title'] = 'Bills';
        $this->v['user'] = Users::find($booking->user_id);
        $this->v['count'] = count($this->v['bookingDetails']);

        return view('admin.bill.bill', $this->v);
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
