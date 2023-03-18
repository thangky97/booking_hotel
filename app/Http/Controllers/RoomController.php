<?php

namespace App\Http\Controllers;

use App\Models\CategoryRooms;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index(Request $request)
    {
        $room = new Rooms();
        $this->v['room'] = $room->loadAllStatus();
        $cate_rooms = new CategoryRooms();
        $this->v['loai_phong'] = $cate_rooms->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
        return view('templates.pages.booking_search', $this->v);
    }
    public function search(Request $request)
    {
        $check_in = date("Y-m-d", strtotime($request->check_in));
        $check_out= date("Y-m-d", strtotime($request->check_out));
//        dd($check_in);
        $cate_rooms = new CategoryRooms();
        $this->v['loai_phong'] = $cate_rooms->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';
        // $room = new Rooms();
        // $this->v['room'] = $room->loadAllOrder()
        //     ->where('status', '=', 1)
        // ->where(function ($query) use ($check_in, $check_out) {
        //     $query->where([$check_in, '<', 'checkin_date'], [$check_out, '<', 'checkout_date']);
        //     $query->orWhere([$check_out, '>', 'checkin_date'], [$check_out, '>', 'checkout_date']);
        // });
        $room = DB::table('rooms')
        ->join('bookings_detail','bookings_detail.id','=','rooms.id')
        ->join('bookings','bookings.id','=','bookings_detail.booking_id')
        ->select('rooms.*','bookings.checkin_date','bookings.checkout_date')
        ->where('rooms.status','=',1)
        ->where(function($query) use($check_in,$check_out){
            $query->where('bookings.checkin_date', '<',$check_in );
           $query->Where('bookings.checkout_date', '<', $check_out);
        })
        ->orWhere(function ($query) use($check_in,$check_out){
            $query->where('bookings.checkin_date', '>', $check_in);
           $query->Where('bookings.checkout_date', '>', $check_out);
        })
        ->get();
        $this->v['room'] = $room;

// dd($this->v);

        return view('templates.pages.booking_search', $this->v);
    }
    public function loadfilter(Request $request)
    {
        $room = new Rooms();
        $this->v['room'] = $room->loadAllStatus();
        $cate_rooms = new CategoryRooms();
        $this->v['loai_phong'] = $cate_rooms->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';

        return view('templates.pages.booking_search', $this->v);
    }




    public function add()
    {
        //thêm
        return view('admin.room.add');
    }

    public function store()
    {
        //lưu thêm
    }

    public function edit($user)
    {
        //sửa
    }

    public function update()
    {
        //lưu sửa
    }
}
