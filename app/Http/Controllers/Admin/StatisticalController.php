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
        $this->v['title'] = 'Thống kê';
        $this->v['totals'] = DB::table('bookings')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when status_booking = '2' then 1 end) as active") //đã sử dụng
            ->selectRaw("count(case when status_booking = '1' then 1 end) as noActive") //Phòng trống
            ->selectRaw("count(case when status_booking = '3' then 1 end) as maintenance") //bảo trì
            ->selectRaw("count(checkin_date) as checkin")
            ->selectRaw("count(checkout_date) as checkout")
            ->first();

        for ($i=1;$i<=30;$i++){
            $this->v['totalMoney'.(string)$i] = DB::table('bills')
                ->whereDay('created_at', '=', date((string)$i))
                ->whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', date('Y'))
                ->sum('total_money');
        }
//        dd($this->v['totalMoney'.'4']);
        $this->v['countBookingMonth'] = DB::table('bookings')
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->count();
        for ($i=1;$i<=30;$i++){
            $this->v['countBooking'.(string)$i] = DB::table('bookings')
                ->whereDay('created_at', '=', date((string)$i))
                ->whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', date('Y'))
                ->count();
        }

        for ($i=1;$i<=12;$i++){
            $this->v['countBookingYear'.(string)$i] = DB::table('bookings')
                ->whereMonth('created_at', '=', date((string)$i))
                ->whereYear('created_at', '=', date('Y'))
                ->count();
        }
        for ($i=1;$i<=12;$i++){
            $this->v['totalMoneyYear'.(string)$i] = DB::table('bills')
                ->whereMonth('created_at', '=', date((string)$i))
                ->whereYear('created_at', '=', date('Y'))
                ->sum('total_money');
        }

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
        $this->v['monthToday'] = date('m');

        return view('admin.statistical.index', $this->v);
    }

    public function month(Request $request){
        $this->v['title'] = 'Thống kê';
        $this->v['monthToday'] = date((string)$request->month);
        $this->v['totals'] = DB::table('bookings')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when status_booking = '2' then 1 end) as active") //đã sử dụng
            ->selectRaw("count(case when status_booking = '1' then 1 end) as noActive") //Phòng trống
            ->selectRaw("count(case when status_booking = '3' then 1 end) as maintenance") //bảo trì
            ->selectRaw("count(checkin_date) as checkin")
            ->selectRaw("count(checkout_date) as checkout")
            ->first();

        for ($i=1;$i<=30;$i++){
            $this->v['totalMoney'.(string)$i] = DB::table('bills')
                ->whereDay('created_at', '=', date((string)$i))
                ->whereMonth('created_at', '=', date((string)$request->month))
                ->whereYear('created_at', '=', date('Y'))
                ->sum('total_money');
        }
        for ($i=1;$i<=30;$i++){
            $this->v['countBooking'.(string)$i] = DB::table('bookings')
                ->whereDay('created_at', '=', date((string)$i))
                ->whereMonth('created_at', '=', date((string)$request->month))
                ->whereYear('created_at', '=', date('Y'))
                ->count();
        }
        for ($i=1;$i<=12;$i++){
            $this->v['countBookingYear'.(string)$i] = DB::table('bookings')
                ->whereMonth('created_at', '=', date((string)$i))
                ->whereYear('created_at', '=', date('Y'))
                ->count();
        }
        for ($i=1;$i<=12;$i++){
            $this->v['totalMoneyYear'.(string)$i] = DB::table('bills')
                ->whereMonth('created_at', '=', date((string)$i))
                ->whereYear('created_at', '=', date('Y'))
                ->sum('total_money');
        }
        $this->v['countBookingMonth'] = DB::table('bookings')
            ->whereMonth('created_at', '=', date((string)$request->month))
            ->whereYear('created_at', '=', date('Y'))
            ->count();

        //Tổng tiền theo tháng
        $this->v['totalMoneyMonth'] = DB::table('bills')
            ->whereMonth('created_at', '=', date((string)$request->month))
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

        return view('admin.statistical.index', $this->v);
    }
}
