<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Bills;
use App\Models\Booking;
use App\Models\CategoryRooms;
use App\Models\Rooms;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StatisticalController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index()
    {
        $this->v['title'] = 'Dashboard';

        $this->v['totals'] = DB::table('bookings')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when status_booking = '2' then 1 end) as active") //đã sử dụng
            ->selectRaw("count(case when status_booking = '1' then 1 end) as noActive") //Phòng trống
            ->selectRaw("count(case when status_booking = '3' then 1 end) as maintenance") //bảo trì
            ->selectRaw("count(checkin_date) as checkin")
            ->selectRaw("count(checkout_date) as checkout")
            ->first();

        //Tổng số phòng hôm nay đặt
        $this->v['countBookingToday'] = DB::table('bookings')
            ->whereDate('created_at', today())
            ->count();

        //Tổng tiền theo tháng
        $this->v['totalMoneyToday'] = DB::table('bills')
            ->whereDate('created_at', today())
            ->sum('total_money');

        $this->v['countBookingMonth'] = DB::table('bookings')
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->count();

        //Tổng tiền theo tháng
        $this->v['totalMoneyMonth'] = DB::table('bills')
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->sum('total_money');

        //Bao nhiêu đơn đã thanh toán
        $this->v['totalBookingPay'] = Booking::where('status_pay', "1")
            ->whereDate('created_at', today())
            ->count();

        $today = Carbon::today();
        //Bao nhiêu đơn chưa thanh toán
        $this->v['totalBooking'] = Booking::where('status_pay', "0")
            ->whereDate('created_at', today())
            ->count();

        $users = Users::all();
        $this->v['topUser'] = $users->map(function ($user) {
            $bookings = $user->bookingsThisMonth();
            $id = $bookings->count();
            return [
                'name' => $user->name,
                'id' => $id
            ];
        })->sortByDesc('id')->take(10);

        //Số phòng trống hôm nay

        // $this->v['emptyRoom'] = Rooms::where('status', '1')

        //     ->whereDoesntHave('bookings', function ($query) use ($today) {
        //         $query->whereDate('check_in', '<=', $today)
        //             ->whereDate('check_out', '>=', $today);
        //     })
        //     ->count();

        $countRoom = DB::table('rooms')->count();
        $rooms = DB::table('rooms')
            ->leftjoin('bookings_detail', 'bookings_detail.room_id', '=', 'rooms.id')
            ->leftjoin('bookings', 'bookings.id', '=', 'bookings_detail.booking_id')
            ->select('rooms.*', 'bookings.checkin_date', 'bookings.checkout_date')
            ->get();
        $count=0;
        foreach ($rooms as $index => $room) {
            if (strtotime($room->checkin_date) < strtotime('now') && strtotime($room->checkout_date) > strtotime('now')) {
                $count++;
            }
            if (strtotime($room->checkin_date) == strtotime('now') || strtotime($room->checkout_date) == strtotime('now')) {
                $count++;
            }
        }
        $this->v['countRoom'] = $countRoom;
        $this->v['count'] = $count;
        $this->v['emptyRoom'] = $countRoom - $count;
        return view("admin.dashboard", $this->v);
    }
}
