<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function employees()
    {
        // $jobs = new Employer();
        // $this->v['list'] = $jobs->loadListWithPager();    
        $this->v['title'] = '12 Zodiac - Nhân viên';
        return view("admin/employees.index",$this->v);
    }
}

