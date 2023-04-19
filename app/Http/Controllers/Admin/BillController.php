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
use App\Models\Voucher;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Output\Output;

use function PHPUnit\Framework\isNull;

session_start();


class BillController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $title = 'Danh sách hóa đơn';
        $booking_id = $request->get('booking_id');
        $id = $request->get('id');
        if ($booking_id) {
            $bill = Bills::where('booking_id', 'like', '%' . $booking_id . '%')
                ->paginate(10);
        } elseif ($id) {
            $bill = Bills::where('id', 'like', '%' . $id . '%')
                ->paginate(10);
        } else {
            $bill = Bills::with('voucher')
                ->orderBy('status', 'asc')
                ->paginate(10);
        }

        return view('admin.bill.index', ['bills' => $bill, 'title' => $title, 'booking_id' => $booking_id, 'id' => $id]);
    }

    public function bill_detail($id)
    {
        $booking_id = Bills::find($id)->booking_id;
        $this->v['listUsers'] = DB::table('users')->get();
        $this->v['bill'] = Bills::find($id);
        $vouchers = new Voucher();
        $this->v['vouchers'] = $vouchers->loadAll();
        $Bookingdetail = new Bookingdetail();
        $this->v['bookingDetails'] = $Bookingdetail->loadIdBooking($booking_id);
        $rooms = DB::table('rooms')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->leftjoin('service_room', 'service_room.room_id', '=', 'rooms.id')
            ->leftjoin('bookings', 'bookings.id', '=', 'service_room.booking_id')
            ->select('rooms.name', 'rooms.cate_room', 'rooms.images', 'rooms.adult', 'category_rooms.description', 'service_room.room_id', 'service_room.id', 'rooms.bed', 'category_rooms.price', 'service_room.service_id', 'service_room.booking_id')
            ->where('service_room.booking_id', '=', $booking_id)
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


        return view('admin.bill_detail.index', $this->v);
    }

    public function print_order($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id));
        return $pdf->stream();
    }
    public function print_order_convert($id)
    {
        $room_service = DB::table('bookings_detail')
            ->select('bookings_detail.*', 'service_room.service_id')
            ->leftJoin('service_room', 'service_room.room_id', '=', 'bookings_detail.room_id')
            ->where('bookings_detail.booking_id', '=', $id)
            ->where('service_room.booking_id', '=', $id)
            ->get();
        $this->v['room_service'] = $room_service;

        $bill_mn = new Bills();
        $bill_mn_pdf = $bill_mn->loadIdBookings($id);
        $bill_mn_view_pdf = $bill_mn_pdf->total_money;

        $voucher = new Voucher();
        $this->v['voucher'] = $voucher->loadAll();

        $voucher_code = '';
        $voucher_price = 0;
        foreach ($this->v['voucher'] as $index => $v_c) {
            if ($v_c->id == $bill_mn_pdf->voucher_id) {
                $voucher_code = $v_c->code;
                $voucher_price = $v_c->discount;
            }
        }

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

        $money_service = 0; //tổng tiền dịch vụ
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
        $total_money_room_sv = $total_money_room + $total_money_service;
        $this->v['total_money_room_service'] = $total_money_room_sv;



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
                                        <th>Phí dịch vụ</th>
                                        <th >Tổng</th>

                                    </tr>
                                </thead>
                                <tbody>';
        foreach (($this->v['room_service']) as $room_sv) {
            foreach (($this->v['listRooms']) as $room) {
                if ($room_sv->room_id == $room->id) {
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
                                    ' . $cateRoom->name . '<br>(' . number_format($cateRoom->price) . 'đ)
                                </span>
                            </td>
                            <td>
                            ';
                            $s_r = explode(',', $room_sv->service_id);
                            foreach ($this->v['service'] as $ser) {
                                foreach ($s_r as $inx => $sr_id) {
                                    if ($sr_id == $ser->id) {
                                        $sv_name = trim(($inx > 0 ? ', ' . $ser->name : $ser->name), ',');
                                        $output .= ' <span class="text-primary d-block guest-bx">' .  $sv_name . '<br></span>';
                                    }
                                }
                            }

                            $output .= '
                            </td>
                            <td>';
                            $money = 0;
                            $ser_room_id = $room_sv->service_id;
                            $s_r = explode(',', $ser_room_id);

                            foreach ($this->v['service'] as $ser) {
                                foreach ($s_r as $inx => $sr_id) {
                                    if ($sr_id == $ser->id) {
                                        $money += array_sum(explode(',', $inx > 0 ? ',' . $ser->price : $ser->price));
                                    }
                                }
                            }
                            $output .= ' <span class="text-primary d-block guest-bx">' . number_format($money) . 'đ<br></span>';

                            $output .= '

                            </td>
                            <td>
                                <div>
                                    ';
                            $money = 0;
                            $ser_room_id = $room_sv->service_id;
                            $s_r = explode(',', $ser_room_id);

                            foreach ($this->v['service'] as $ser) {
                                foreach ($s_r as $inx => $sr_id) {
                                    if ($sr_id == $ser->id) {
                                        $money += array_sum(explode(',', $inx > 0 ? ',' . $ser->price : $ser->price));
                                    }
                                }
                            }
                            $total = ($cateRoom->price) * $use_date + $money;
                            $output .= '<span class="text-danger d-block guest-bx">' . number_format($total) . 'đ</span>
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
                                                    <i class="mb-2">Mã giảm giá:' . $voucher_code . ' </i>
                                                    <hr style="width:10%;" >
                                                    <h3 class="mb-0 card-title" style="color: blue;"><b><var>' . number_format($total_money_room_sv) . 'đ</var></b></h3>
                                                    <h3 class="mb-0 card-title" style="color: blue;"><b><var>-' . number_format($voucher_price) . 'đ</var></b></h3>
                                                    <hr style="width:20%;" >
                                                    <h3 class="mb-0 card-title" style="color: blue;"><b><var>' . number_format($total_money_room_sv - $voucher_price) . 'đ</var></b></h3>
                                                </div>
                                            </div>
        ';
        return $output;
    }
    public function bill_room($id)
    {
        $room_service = DB::table('bookings_detail')
            ->select('bookings_detail.*', 'service_room.service_id')
            ->leftJoin('service_room', 'service_room.room_id', '=', 'bookings_detail.room_id')
            ->where('bookings_detail.booking_id', '=', $id)
            ->where('service_room.booking_id', '=', $id)
            ->get();
        $this->v['room_service'] = $room_service;

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
        $money_service = 0; //tổng tiền dịch vụ
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

        $total_money_room_sv = $total_money_room + $total_money_service;
        $this->v['total_money_room_service'] = $total_money_room_sv;

        $this->v['user'] = Users::find($booking->user_id);
        $this->v['title'] = 'Phí phòng';
        $this->v['count'] = count($this->v['bookingDetails']);


        return view('admin.bill.billroom', $this->v);
    }
    public function bill_service($id)
    {
        $room_service = DB::table('bookings_detail')
            ->select('bookings_detail.*', 'service_room.service_id')
            ->leftJoin('service_room', 'service_room.room_id', '=', 'bookings_detail.room_id')
            ->where('bookings_detail.booking_id', '=', $id)
            ->where('service_room.booking_id', '=', $id)
            ->get();

        $this->v['room_service'] = $room_service;
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


    public function bills($id, Request $request)
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
        $total_money_room_sv = $total_money_room + $total_money_service;
        $this->v['total_money_room_service'] = $total_money_room_sv;


        $room_service = DB::table('bookings_detail')
            ->select('bookings_detail.*', 'service_room.service_id')
            ->leftJoin('service_room', 'service_room.room_id', '=', 'bookings_detail.room_id')
            ->where('bookings_detail.booking_id', '=', $id)
            ->where('service_room.booking_id', '=', $id)
            ->get();

        $this->v['room_service'] = $room_service;
        $bills = new Bills();


        $arrBills = array();
        foreach ($bills->loadAll() as $index => $bill_bk) {
            $arrBill_bk = array($index => $bill_bk->booking_id);
            $arrBills = $arrBill_bk + $arrBills;
        }
        $this->v['list'] = $arrBills;

        if (!in_array($id, $this->v['list'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            if (isset($request->voucher)) {

                $bill_add = Bills::create([
                    'booking_id' => $id,
                    'total_money' => $request->total_add_voucher,
                    'voucher_id' => $request->voucher,
                    'status' => 1
                ]);
                $bill_id = $bill_add->id;

                foreach (($this->v['room_service']) as $index => $room_sv) {

                    Billdetails::create([
                        'service_id' =>  $room_sv->service_id,
                        'room_id' => $room_sv->room_id,
                        'bill_id' => $bill_id,
                        'date' => $use_date,
                        'status' => 1
                    ]);
                }
            } else {

                $bill_add = Bills::create([
                    'booking_id' => $id,
                    'total_money' => $total_money_room + $total_money_service,
                    'status' => 1
                ]);
                $bill_id = $bill_add->id;

                foreach (($this->v['room_service']) as $index => $room_sv) {
                    Billdetails::create([
                        'service_id' =>  $room_sv->service_id,
                        'room_id' => $room_sv->room_id,
                        'bill_id' => $bill_id,
                        'date' => $use_date,
                        'status' => 1
                    ]);
                }
            }
        }
        $bill_mn = new Bills();
        $bill_vc = $bill_mn->loadIdBookings($id);
        $this->v['bill_mn'] = $bill_mn->loadIdBookings($id);

        $voucher = new Voucher();
        $this->v['voucher'] = $voucher->loadOne($bill_vc->voucher_id);


        $this->v['title'] = 'Bills';
        $this->v['user'] = Users::find($booking->user_id);
        $this->v['count'] = count($this->v['bookingDetails']);
        //update voucher
        $voucher = Session::get('voucher');
        if (isset($voucher)) {
            foreach ($voucher as $value) {
                $id = $value['id'];
                $limit = $value['limit'] - 1;
                Voucher::where('id', $id)->update(['limit' => $limit]);
            }
            Session::forget('voucher');
        }
        return view('admin.bill.bill', $this->v);
    }
}
