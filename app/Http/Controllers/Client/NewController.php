<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category_new;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{

    public function index(Request $request) {
        $title = '12Zodiac - Bài viết';
        $news = News::with('cate_new')->where('status', '=', 1)->get();
        return view('templates.pages.new', compact('news', 'title'));
    }

    public function detail($id, Request $request)
    {    
        $cateNew = Category_new::where('status', '=', 1)->find($id);
        $new = News::where('status', '=', 1)->find($id);
        
        return view('templates.pages.new_detail', compact('cateNew', 'new'));
    }

}
