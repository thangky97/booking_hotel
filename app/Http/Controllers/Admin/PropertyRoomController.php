<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRoomRequest;
use App\Models\Rooms;
use App\Models\Propertyroom;
use App\Models\Properties;
use Illuminate\Http\Request;

class PropertyRoomController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function propertyrooms()
    {
        $Propertyrooms = new Propertyroom();
        $this->v['listPropertyrooms'] = $Propertyrooms->loadListWithPager();
        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadListWithPager();
        $Properties = new Properties();
        $this->v['listProperties'] = $Properties->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Thuộc tính phòng';
        return view("admin.property_room.index", $this->v);
    }

    public function add()
    {
        $Property_rooms = new Propertyroom();
        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();
        $arrProperty_rooms = array();
        foreach ($Property_rooms->loadAll() as $index => $property_room){
            $arrProperty_room= array($index => $property_room->room_id);
            $arrProperty_rooms = $arrProperty_room + $arrProperty_rooms;
        }
        $arrRoomIds = array();
        foreach ($Rooms->loadAll() as $inx =>$room){
            $arrRooms= array($inx => $room->id);
            $arrRoomIds = $arrRooms + $arrRoomIds;
        }
        $this->v['list'] = array_diff($arrRoomIds, $arrProperty_rooms);
        $Properties = new Properties();
        $this->v['listProperties'] = $Properties->loadAll();
        $this->v['title'] = '12 Zodiac - Thêm mới';
        return view('admin.property_room.add', $this->v);
    }

    public function create(PropertyRoomRequest $request)
    {
        $property_ids = implode(',' ,$request->properties_id);
        Propertyroom::create([
            'room_id' => $request->room_id,
            'properties_id' => $property_ids,
            'status' => $request->status
        ]);
        $this->v['title'] = '12 Zodiac - Thêm thuộc tính';
        return redirect()->route('route_BackEnd_PropertyRoom_list');
    }

    public function edit($id, Request $request)
    {
        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();
        $Properties = new Properties();
        $this->v['listProperties'] = $Properties->loadAll();
        $this->v['property_rooms'] = Propertyroom::find($id);
        $this->v['title'] = '12 Zodiac - Sửa ';
        return view('admin.property_room.edit', $this->v);
    }

    public function update($id, Request $request)
    {
        Propertyroom::find($id)->update($request->all());
        $this->v['title'] = '12 Zodiac - Thuộc tính phòng';
        return redirect()->route('route_BackEnd_PropertyRoom_list');
    }
}
