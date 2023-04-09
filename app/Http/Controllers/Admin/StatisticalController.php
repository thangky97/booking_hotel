<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view("admin.statistical.index", $this->v);
    }
}
