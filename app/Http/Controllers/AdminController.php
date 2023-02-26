<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function admin()
    {
        // $jobs = new Employer();
        // $this->v['list'] = $jobs->loadListWithPager();    
        $this->v['title'] = '12 Zodiac - Dashboard';
        return view("admin/dashboard",$this->v);
    }
}
