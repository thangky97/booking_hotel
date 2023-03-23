<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function service()
    {
        $service = new Service();
        $this->v['list'] = $service->loadListWithPager();

        $this->v['title'] = ' Dịch Vụ';
        return view("admin.service.index", $this->v);
    }



    public function service_add(Request $request)
    {
        $this->v['title'] = ' Thêm mới dịch vụ';
        // $cate_rooms = new Rooms();
        // $this->v['cate_rooms'] = $cate_rooms->loadListWithPager();
        $method_route = 'route_BackEnd_Service_Add';

        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();

            unset($params['cols']['_token']);
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                $params['cols']['images'] = $this->uploadFile($request->file('images'));
            }

            $modelTest = new Service();
            $res = $modelTest->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới thành công');
                return redirect()->route('route_BackEnd_Service_List');
            } else {
                Session::flash('error', 'Lỗi thêm mới');
                return redirect()->route($method_route);
            }
        }
        return view('admin/service.add', $this->v);
    }

    public function service_detail($id)
    {
        // $lbds = new CategoryLands();
        // $this->v['list_lbds'] = $lbds->loadListWithPager();
        $this->v['title'] = ' Chi tiết dịch vụ';
        $service = new Service();
        $objItem = $service->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('admin/service.detail', $this->v);
    }
    public function service_update($id,Request $request)
    {
        $method_route = "route_BackEnd_Service_Detail";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $params['cols']['images'] = $this->uploadFile($request->file('images'));
        }
        $service = new Service();
        $objItem = $service->loadOne($id);
        $params['cols']['id'] = $id;
        $res = $service->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thông tin mã #000' . $objItem->id . ' thành công !');
            return redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Lỗi cập nhật thông tin mã #000' . $objItem->id);
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('service', $fileName, 'public');
    }
}
