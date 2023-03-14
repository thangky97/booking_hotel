<?php

namespace App\Http\Controllers;

use App\Models\CategoryRooms;
use App\Models\Rooms;
use Illuminate\Http\Request;

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
        $this->v['room']=$room->loadAllStatus();
        $cate_rooms = new CategoryRooms();
        $this->v['loai_phong'] = $cate_rooms->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Tìm Kiếm Phòng';

        return view('templates.pages.booking_search',$this->v);
    }

    public function search(Request $request) {
        $search = $request->all();
        dd($search);
        return view('templates.pages.booking_search');
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

    public function edit( $user)
    {
        //sửa
    }

    public function update() 
    {
        //lưu sửa
    }
}
