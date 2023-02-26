<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryroomController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function categoryrooms()
    {
        // $jobs = new Employer();
        // $this->v['list'] = $jobs->loadListWithPager();    
        $this->v['title'] = '12 Zodiac - Loại phòng';
        return view("admin/cate_room.index",$this->v);
    }
    public function categoryrooms_detail()
    {
        // $lbds = new CategoryLands();
        // $this->v['list_lbds'] = $lbds->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Chi tiết loại phòng';
        // $lands = new Lands();
        // $objItem = $lands->loadOne($id);
        // $this->v['objItem'] = $objItem;
        return view('admin/cate_room.detail', $this->v);
    }
}
