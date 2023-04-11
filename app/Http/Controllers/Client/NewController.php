<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category_new;
use App\Models\News;
use App\Models\Service;
use Illuminate\Http\Request;

class NewController extends Controller
{

    public function index(Request $request) {
        $title = 'Bài viết - Hotel 12Zodiac';
        $news = News::with('cate_new')->with('admin_name')->where('status', '=', 1)->get();

        $services = Service::where('status', '=', 1)
        ->paginate(3);
        return view('templates.pages.new', compact('news', 'title', 'services'));
    }

    public function detail($id, Request $request)
    {    
        $cateNew = Category_new::where('status', '=', 1)->find($id);
        // $adminNew = Admin::where('status', '=', 1)->find($id);
        $new = News::where('status', '=', 1)->find($id);
        $services = Service::where('status', '=', 1)
        ->paginate(4);
        
        return view('templates.pages.new_detail', compact('cateNew', 'new', 'services'));
    }

}
