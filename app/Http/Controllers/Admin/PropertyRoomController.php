<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRoomRequest;
use App\Models\CategoryRooms;
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
        $this->v['listPropertyrooms'] = $Propertyrooms->loadAll();
        $cateRooms = new CategoryRooms();
        $this->v['listCategoryroom'] = $cateRooms->loadAll();
        $Properties = new Properties();
        $this->v['listProperties'] = $Properties->loadAll();
        $this->v['title'] = ' Thuộc tính phòng';
        return view("admin.property_room.index", $this->v);
    }

    public function add()
    {
        $Property_rooms = new Propertyroom();
        $cateRooms = new CategoryRooms();
        $this->v['listCategoryroom'] = $cateRooms->loadAll();
        $arrProperty_rooms = array();
        foreach ($Property_rooms->loadAll() as $index => $property_room){
            $arrProperty_room= array($index => $property_room->cate_room);
            $arrProperty_rooms = $arrProperty_room + $arrProperty_rooms;
        }
        $this->v['list'] = $arrProperty_rooms;
        $Properties = new Properties();
        $this->v['listProperties'] = $Properties->loadAll();
        $this->v['title'] = ' Thêm mới';
        return view('admin.property_room.add', $this->v);
    }

    public function create(PropertyRoomRequest $request)
    {
        $property_ids = implode(',' ,$request->properties_id);
        Propertyroom::create([
            'cate_room' => $request->cate_room,
            'properties_id' => $property_ids,
            'status' => $request->status
        ]);
        $this->v['title'] = ' Thêm thuộc tính';
        return redirect()->route('route_BackEnd_PropertyRoom_list');
    }

    public function edit($id, Request $request)
    {
        $Properties = new Properties();
        $this->v['listProperties'] = $Properties->loadAll();
        $this->v['idNotChecked'] = explode(',', Propertyroom::find($id)->properties_id);
        $this->v['property_rooms'] = Propertyroom::find($id);
        $this->v['cateRoom'] = CategoryRooms::find(Propertyroom::find($id)->cate_room);
        $this->v['title'] = ' Sửa ';
        return view('admin.property_room.edit', $this->v);
    }

    public function update($id, Request $request)
    {
        $property_ids = implode(',' ,$request->properties_id);
        Propertyroom::find($id)->update([
                'properties_id' => $property_ids,
        ]);
        $this->v['title'] = ' Thuộc tính phòng';
        return redirect()->route('route_BackEnd_PropertyRoom_list');
    }
}
