<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
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
    public function service(Request $request)
    {
        $this->v['title'] = 'Dịch Vụ';

        $name = $request->get('name');
        if ($name) {
            $this->v['list'] = Service::where('name', 'like', '%' . $name . '%')
                ->paginate(20);
        } else {
            $service = new Service();
            $this->v['list'] = $service->loadListWithPager();
        }

        return view("admin.service.index", $this->v, ['name' => $name]);
    }

    public function service_add(Request $request)
    {
        $this->v['title'] = 'Thêm mới dịch vụ';
        $method_route = 'route_BackEnd_Service_Add';

        if ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required|min:3|max:70',
                'price' => 'required|numeric',
                'status' => 'required',
                'images' =>
                [
                    'required',
                    'image',
                    'mimes:jpeg,png,jpg',
                    'mimetypes:image/jpeg,image/png',
                    'max:2048',
                ],
            ], [
                'name.required' => 'Tên bắt buộc nhập!',
                'name.min' => 'Tên tối thiểu 3 ký tự!',
                'name.max' => 'Tên tối đa là 70 ký tự!',
                'price.required' => 'Giá bắt buộc nhập!',
                'price.numeric' => 'Giá phải là số!',
                'status.required' => 'Bạn chưa chọn trạng thái!',
                'images.required' => 'Ảnh bắt buộc nhập!',
                'images.image' => 'Bắt buộc phải là ảnh!',
                'images.max' => 'Ảnh không được lớn hơn 2MB!',
            ], []);

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
                Session::flash('success', 'Thêm thành công!');
                return redirect()->route('route_BackEnd_Service_List');
            } else {
                Session::flash('error', 'Thêm không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.service.add', $this->v);
    }

    public function service_detail($id)
    {
        $this->v['title'] = 'Chi tiết dịch vụ';
        $service = new Service();
        $objItem = $service->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('admin.service.detail', $this->v);
    }

    public function service_update($id, ServiceRequest $request)
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
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Service_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('service', $fileName, 'public');
    }
}
