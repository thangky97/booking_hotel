<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRoom as RequestsServiceRoom;
use App\Models\Rooms;
use App\Models\Service;
use App\Models\ServiceRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceRoomController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function service_rooms()
    {
        $Servicerooms = new ServiceRoom();
        $this->v['listServicerooms'] = $Servicerooms->loadListWithPager();
        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadListWithPager();
        $Service = new Service();
        $this->v['listServices'] = $Service->loadListWithPager();
        $this->v['title'] = 'Dịch vụ phòng';
        
        return view("admin.service_room.index", $this->v);
    }

    public function add()
    {
        $Service_rooms = new ServiceRoom();
        $Rooms = new Rooms();
        $this->v['listRooms'] = $Rooms->loadAll();
        $arrService_rooms = array();
        foreach ($Service_rooms->loadAll() as $index => $property_room){
            $arrService_rooms= array($index => $property_room->room_id);
            $arrService_rooms = $arrService_rooms + $arrService_rooms;
        }
        $this->v['list'] = $arrService_rooms;
        $Services = new Service();
        $this->v['listServices'] = $Services->loadAll();
        $this->v['title'] = ' Thêm mới';
        return view('admin.service_room.add', $this->v);
    }

    public function create(RequestsServiceRoom $request)
    {
        $service_ids = implode(',' ,$request->service_id);
        ServiceRoom::create([
            'room_id' => $request->room_id,
            'service_id' => $service_ids,
            'status' => $request->status
        ]);
        $this->v['title'] = ' Thêm dịch vụ';
       
        return redirect()->route('route_BackEnd_ServiceRoom_list');
    }

    public function edit($id, Request $request)
    {
        $Services = new Service();
        $this->v['listServices'] = $Services->loadAll();
        $this->v['idNotChecked'] = explode(',', ServiceRoom::find($id)->service_id);
        $this->v['service_rooms'] = ServiceRoom::find($id);
        $this->v['room'] = Rooms::find(ServiceRoom::find($id)->room_id);
        $this->v['title'] = 'Sửa';
        return view('admin.service_room.edit', $this->v);
    }

    public function update($id, Request $request)
    {
        $service_ids = implode(',' ,$request->service_id);
        ServiceRoom::find($id)->update([
                'service_id' => $service_ids,
        ]);
        $this->v['title'] = ' Dịch vụ phòng';
        return redirect()->route('route_BackEnd_ServiceRoom_list');
    }
}
