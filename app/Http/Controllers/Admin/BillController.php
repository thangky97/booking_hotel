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
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Symfony\Component\Console\Output\Output;

use function PHPUnit\Framework\isNull;

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

    public function print_order($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id));
        return $pdf->stream();
    }
    public function print_order_convert($id)
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

        foreach (($this->v['bookingDetails']) as $bookingDetail) {
            foreach (($this->v['listRooms']) as $room) {
                foreach ($this->v['service_room'] as $ser_room) {
                    if ($bookingDetail->room_id == $ser_room->room_id) {
                        $s_r = explode(',', $ser_room->service_id);
                        foreach ($this->v['service'] as $ser) {
                            foreach ($s_r as $inx => $sr_id) {
                                if ($sr_id == $ser->id) {
                                    $name_sv[] = trim(($inx > 0 ? ', ' . $ser->name : $ser->name), ',');
                                }
                            }
                        }
                    }
                }
            }
        }

        $output = '';
        $output .= '
        <title>Hóa đơn thanh toán</title>
        <style>body{
            font-family:DejaVu Sans;
        }
        h2 {
            text-align: center;
        }
        i {
            font-size : 12px;            
        }
        table {
            border-collapse: collapse;
            width: 100%;
          }
          
          td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 0 8px 8px 8px;
          }
          
          tr:nth-child(even) {
            background-color: #dddddd;
          }
        </style>';
        $output .= '
        
        <h2>Hóa đơn thanh toán</h2>
        
        <i>Khách hàng :' . $this->v['user']['name'] . '</i><br>
        <i style="text-align:right;">Số điện thoại :' . $this->v['user']['phone'] . '</i><br>
        <i >Email :' . $this->v['user']['email'] . '</i><br>
        <i ">Địa chỉ :' . $this->v['user']['address'] . '</i>

        <div>
                           
                            <h5 > <i class="far fa-calendar-minus scale3 me-3"></i>Thời gian sử dụng: ' . (date("d/m/Y", strtotime($this->v['booking']['checkin_date']))) . ' - ' . (date("d/m/Y", strtotime($this->v['booking']['checkout_date']))) . '</h5>
                        </div>
        
        <table>
                                <thead>
                                    <tr>
                                        <th >Tên phòng</th>
                                        <th >Loại phòng</th>
                                        <th >Dịch vụ</th>
                                        <th >Tổng</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>';
        foreach (($this->v['bookingDetails']) as $bookingDetail) {
            foreach (($this->v['listRooms']) as $room) {
                if ($bookingDetail->room_id == $room->id) {
                    foreach (($this->v['listCaterooms']) as $cateRoom) {
                        if ($room->cate_room == $cateRoom->id) {



                            $output .= '
                            <tr>
                            <td>
                                <div class="guest-bx">
                                    
                                    <img src="" alt="">
                                    <div>
                                        <h4 class="mb-0 mt-1"><a class="text-black" href="">' . $room->name . '</a></h4>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="guest-bx">
                                    ' . $cateRoom->name . '(' . $cateRoom->price . '$)
                                </span>
                            </td>
                            <td>
                                <span class="text-primary d-block guest-bx">
                                
                                    
                                </span>
                            </td>
                            <td>
                                <div>
                                    <span class="text-danger d-block guest-bx">
                                        ' . ($cateRoom->price) * $use_date . '$
                                    </span>
                                </div>
                            </td>
                            
                            
                        </tr>
                                ';
                        }
                    }
                }
            }
        }


        $output .= ' 
                                        
                                            
                                       
                                   
                                </tbody>
                            </table>
                            <div style="text-align:center;">
                                                <div class="me-10 mb-sm-0 mb-3">
                                                    <h3 class="mb-2">Tổng thanh toán</h3>
                                                    <hr style="width:10%;" >
                                                    <h3 class="mb-0 card-title" style="color: blue;"><b><var>' . $total_money_room . '$</var></b></h3>
                                                </div>
                                            </div>
        ';
        return $output;
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

                foreach ($this->v['service_room'] as $index => $ser_room) {
                    
                    if (isNull($ser_room->room_id)) {  
                        dd('3');            
                    } else {
                        dd('0'); 
                        if ($bk_dt->room_id == $ser_room->room_id && $bk_dt->booking_id == $ser_room->booking_id) {
                            dd('1'); 
                            Billdetails::create([
                                'service_id' =>  $ser_room->service_id,
                                'room_id' => $bk_dt->room_id,
                                'bill_id' => $bill_id,
                                'date' => $use_date,
                                'status' => 1
                            ]);
                        }else{
                            dd('2'); 
                            Billdetails::create([
                                'service_id' => null,
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
