<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomsRequest;
use App\Models\CategoryRooms;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    //Danh sách phòng
    public function rooms(Request $request)
    {
        $this->v['title'] = ' Phòng';

        $name = $request->get('name');
        if ($name) {
            $this->v['list'] = Rooms::where('name', 'like', '%' . $name . '%')
                ->paginate(10);
        } else {
            $rooms = new rooms();
            $this->v['list'] = $rooms->loadListWithPager();
        }

        $cate_rooms = new CategoryRooms();
        $this->v['loai_phong'] = $cate_rooms->loadListWithPager();


        return view("admin.room.index", $this->v, compact('name'));
    }
    //Thêm mới phòng
    public function rooms_add(RoomsRequest $request)
    {
        $this->v['title'] = ' Thêm mới phòng';
        $cate_rooms = new CategoryRooms();
        $this->v['cate_rooms'] = $cate_rooms->loadListWithPager();
        $method_route = 'route_BackEnd_Rooms_Add';

        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();

            unset($params['cols']['_token']);
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                $params['cols']['images'] = $this->uploadFile($request->file('images'));
            }

            $modelTest = new Rooms();
            $res = $modelTest->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm thành công!');
                return redirect()->route('route_BackEnd_Rooms_List');

            } else {
                Session::flash('error', 'Thêm mới không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.room.add', $this->v);
    }
    //Chi tiết phòng
    public function rooms_detail($id)
    {
        $this->v['title'] = 'Chi tiết phòng';
        $cate_rooms = new CategoryRooms();
        $this->v['cate_rooms'] = $cate_rooms->loadListWithPager();
        $rooms = new Rooms();
        $objItem = $rooms->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('admin.room.detail', $this->v);
    }
    public function rooms_update($id, RoomsRequest $request)
    {
        $method_route = "route_BackEnd_Rooms_Detail";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $params['cols']['images'] = $this->uploadFile($request->file('images'));
        }
        $rooms = new Rooms();
        $objItem = $rooms->loadOne($id);
        $params['cols']['id'] = $id;
        $res = $rooms->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Rooms_List');
        } else {
            Session::flash('error', 'Cập nhật thất bại!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('rooms', $fileName, 'public');
    }
}
