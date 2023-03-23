<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
      
        $this->v['title'] = ' Banner';
        return view("admin.banner.index", $this->v);
    }


    public function banner_add(Request $request)
    {
        $this->v['title'] = ' Thêm mới Banner';
        // $cate_rooms = new Rooms();
        // $this->v['cate_rooms'] = $cate_rooms->loadListWithPager();
        $method_route = 'route_BackEnd_Banner_Add';

        if ($request->isMethod('post')) {
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
            } else {
                Session::flash('error', 'Lỗi thêm mới');
                return redirect()->route($method_route);
            }
        }
        return view('admin/banner.add', $this->v);
    }

    public function banner_detail($id)
    {
        // $lbds = new CategoryLands();
        // $this->v['list_lbds'] = $lbds->loadListWithPager();
        $this->v['title'] = ' Chi tiết Banner';
        $banner = new Banner();
        $objItem = $banner->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('admin/banner.detail', $this->v);
    }
    public function banner_update($id,Request $request)
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
        return $file->storeAs('banner', $fileName, 'public');
    }

    
}
