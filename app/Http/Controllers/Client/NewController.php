<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category_new;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{

    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    // public function index()
    // {
    //     $this->v['title'] = '12Zodiac - Bài viết';

    //     $this->v['news'] = News::select('id','name', 'images', 'description', 'title', 'date', 'cate_id', 'status')
    //         ->where('status', '=', 1)
    //         ->get();

    //     return view('templates.pages.new', $this->v);
    // }

    // public function index(Request $request) {
    //     $this->v['title'] = '12Zodiac - Bài viết';
    //     $new = new News();
    //     $this->v['extParams'] = $request->all();
    //     $this->v['news'] = $new->loadList($this->v['extParams']);
    //     dd($this->v['news']);
    //     return view('templates.pages.new', $this->v);
    // }

    public function index(Request $request) {
        $title = '12Zodiac - Bài viết';
        $news = News::with('cate_new')->get();
        return view('templates.pages.new', compact('news', 'title'));
    }

    // public function detail($id, Request $request) {
    //     $detail = new News();
    //     $objItem = $detail->loadOne($id);
    //     $this->v['objItem'] = $objItem;
    //     return view('client.layouts.detail', $this->v);
    // }

    public function detail($id, Request $request)
    {    
        $cateNew = Category_new::where('status', '=', 1)->find($id);
        $new = News::where('status', '=', 1)->find($id);
        
        return view('templates.pages.new_detail', compact('cateNew', 'new'));
    }

}
