<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function rooms()
    {
        // $jobs = new Employer();
        // $this->v['list'] = $jobs->loadListWithPager();    
        $this->v['title'] = '12 Zodiac - Phòng';
        return view("admin/room.index",$this->v);
    }
    public function rooms_add()
    {
        $this->v['title'] = '12 Zodiac - Thêm mới phòng';
        // $lbds = new CategoryLands();
        // $this->v['list_lbds'] = $lbds->loadListWithPager();
        // $method_route = 'route_BackEnd_Lands_Add';
        // if ($request->isMethod('post')) {
        //     $params = [];
        //     $params['cols'] = $request->post();
        //     unset($params['cols']['_token']);
        //     if ($request->hasFile('images_bds') && $request->file('images_bds')->isValid()) {
        //         $params['cols']['images'] = $this->uploadFile($request->file('images_bds'));
        //     }
        //     $modelTest = new Lands();
        //     $res = $modelTest->saveNew($params);
        //     if ($res == null) {
        //         return redirect()->route($method_route);
        //     } elseif ($res > 0) {
        //         Session::flash('success', 'Thêm mới thành công');
        //     } else {
        //         Session::flash('error', 'Lỗi thêm mới');
        //         return redirect()->route($method_route);
        //     }
        // }
        return view('admin/room.add', $this->v);
    }
    public function rooms_detail()
    {
        // $lbds = new CategoryLands();
        // $this->v['list_lbds'] = $lbds->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Chi tiết phòng';
        // $lands = new Lands();
        // $objItem = $lands->loadOne($id);
        // $this->v['objItem'] = $objItem;
        return view('admin/room.detail', $this->v);
    }
}
