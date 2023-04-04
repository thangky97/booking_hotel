<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Termwind\Components\Raw;

class BannerController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function banner()
    {
        $banner = new Banner();
        $this->v['list'] = $banner->loadListWithPager();

        $this->v['title'] = 'Danh sách banner';
        return view("admin.banner.index", $this->v);
    }


    public function banner_add(Request $request)
    {
        $this->v['title'] = ' Thêm mới banner';
        $method_route = 'route_BackEnd_Banner_Add';

        if ($request->isMethod('post')) {

            $request->validate([
                'images' =>
                [
                    'required',
                    'image',
                    'mimes:jpeg,png,jpg',
                    'mimetypes:image/jpeg,image/png',
                    'max:2048',
                ],
                'status' => 'required',
            ], [
                'images.required' => 'Ảnh không được để trống!',
                'images.image' => 'Bắt buộc phải là ảnh!',
                'images.max' => 'Ảnh không được lớn hơn 2MB!',
                'status.required' => 'Bạn chưa chọn trạng thái',
            ], []);
            $params = [];
            $params['cols'] = $request->post();

            unset($params['cols']['_token']);
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                $params['cols']['images'] = $this->uploadFile($request->file('images'));
            }

            $modelTest = new Banner();
            $res = $modelTest->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới thành công');
                return redirect()->route('route_BackEnd_Banner_List');
            } else {
                Session::flash('error', 'Lỗi thêm mới');
                return redirect()->route($method_route);
            }
        }
        return view('admin.banner.add', $this->v);
    }

    public function banner_detail($id)
    {
        $this->v['title'] = ' Chi tiết Banner';
        $banner = new Banner();
        $objItem = $banner->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('admin.banner.detail', $this->v);
    }
    public function banner_update($id,BannerRequest $request)
    {
        $method_route = "route_BackEnd_Banner_Detail";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $params['cols']['images'] = $this->uploadFile($request->file('images'));
        }
        $banner = new Banner();
        $objItem = $banner->loadOne($id);
        $params['cols']['id'] = $id;
        $res = $banner->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thông tin mã #' . $objItem->id . ' thành công !');
            return redirect()->route('route_BackEnd_Banner_List');
        } else {
            Session::flash('error', 'Lỗi cập nhật thông tin mã #000' . $objItem->id);
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('banner', $fileName, 'public');
    }

}
