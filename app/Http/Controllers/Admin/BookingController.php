<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function bookings()
    {
        // $this->v['list'] = $jobs->loadListWithPager();
        $booking = Booking::paginate(5);
        $this->v['title'] = '12 Zodiac - Đơn đặt phòng';
        return view('admin.booking.index', $this->v, compact('booking'))->with('i', (request()->input('page',1) -1) *5);
    }
    public function bookings_detail()
    {
        // $lbds = new CategoryLands();
        // $this->v['list_lbds'] = $lbds->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Chi tiết đơn';
        // $lands = new Lands();
        // $objItem = $lands->loadOne($id);
        // $this->v['objItem'] = $objItem;
        return view('admin/booking.detail', $this->v);
    }
}
