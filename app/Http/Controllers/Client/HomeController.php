<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CategoryRooms;
use App\Models\Properties;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }
    public function index(Request $request)
    {
        $name = $request->get('name');
        $this->v['banners'] = Banner::select('images', 'status')
            ->where('status', '=', 1)
            ->get();
            // dd($this->v['banners']);

        $property_rooms = DB::table('property_room')
            ->leftjoin('rooms', 'rooms.id', '=', 'property_room.room_id')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'rooms.cate_room')
            ->select('property_room.id','property_room.properties_id')
            ->get();
        $this->v['listProperty_rooms'] = $property_rooms;
        $Properties = new Properties();
        $this->v['listProperties'] = $Properties->loadAll();
        $this->v['listCaterooms'] = CategoryRooms::select('id', 'name', 'image', 'price', 'status')->where('status', '=', 1)->get();
        return view('home', $this->v);
    }
}
