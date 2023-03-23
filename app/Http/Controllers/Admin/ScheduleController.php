<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function schedules()
    {
        // $jobs = new Employer();
        // $this->v['list'] = $jobs->loadListWithPager();    
        $this->v['title'] = ' Lịch trình';
        return view("admin/schedule.index",$this->v);
    }
}
