<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CategoryRooms;
use App\Models\Properties;
use App\Models\Rooms;
use App\Models\Users;
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

        //checkUser
        $this->v['users'] = Users::select('name', 'email', 'status')
            ->where("status", "=", 1)->get();
            // dd($this->v['users']);
   
        

        $property_rooms = DB::table('property_room')
            ->leftjoin('category_rooms', 'category_rooms.id', '=', 'property_room.cate_room')
            ->select('property_room.id','property_room.properties_id')
            ->get();
        $this->v['listProperty_rooms'] = $property_rooms;
        $Properties = new Properties();
        $this->v['listProperties'] = $Properties->loadAll();
        $this->v['listCaterooms'] = CategoryRooms::select('id', 'name', 'image', 'price', 'status')->where('status', '=', 1)->get();
        return view('home', $this->v);
    }
}
