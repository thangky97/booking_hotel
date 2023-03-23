<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function feedbacks()
    {
        // $jobs = new Employer();
        // $this->v['list'] = $jobs->loadListWithPager();    
        $this->v['title'] = ' Đánh giá';
        return view("admin/feedback.index",$this->v);
    }
}
