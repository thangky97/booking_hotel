<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class EmployeesController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function employees()
    {
         $Employees = new Admin();
         $this->v['listEmployees'] = $Employees->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Nhân viên';
        return view("admin/employees.index",$this->v);
    }
}

