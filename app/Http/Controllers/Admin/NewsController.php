<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewRequest;
use App\Models\Category_new;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    private $v;

    public function __construct()
    {
        $this->v = [];
    }
    public function index()
    {
        $this->v['news'] = News::with('cate_new')->with('admin')->orderBy('status', 'asc')->paginate(10);
        $this->v['title'] = 'Danh sách tin tức';
        return view('admin.news.index', $this->v);
    }

    public function addForm()
    {
        $this->v['title'] = ' Thêm tin tức';
        $admin = DB::table('admin')->get();
        $category_new = DB::table('category_new')->get();
        return view('admin.news.add', $this->v, compact('category_new', 'admin'));
    }

    public function saveAdd(NewRequest $request)
    {
        $saveNews = new News();
        $saveNews->name = $request->name;
        $saveNews->description = $request->description;
        $saveNews->title = $request->title;
        $saveNews->date = $request->date;
        $saveNews->cate_id = $request->cate_id;
        $saveNews->admin_id = $request->admin_id;
        $saveNews->status = $request->status;

        if ($request->hasFile('images')) {
            $newFileName = uniqid() . '-' . $request->images->extension();
            $path = $request->images->storeAs('news', $newFileName, 'public');
            $saveNews->images = $path;
        }

        $saveNews->save();
        return redirect()->route('route_BackEnd_News_List')
            ->with('success', 'Thêm thành công');
    }

    public function editForm($id)
    {
        $title = 'Sửa tin tức';
        $editNews = News::find($id);
        $cate_id = DB::table('category_new')->get();
        $admin_id = DB::table('admin')->get();
        return view('admin.news.edit', compact('editNews', 'cate_id', 'admin_id', 'id', 'title'));
    }

    public function saveEdit(NewRequest $request, $id)
    {
        $createEdit =  News::find($id);
        $createEdit->name = $request->name;
        $createEdit->description = $request->description;
        $createEdit->title = $request->title;
        $createEdit->date = $request->date;
        $createEdit->cate_id = $request->cate_id;
        $createEdit->admin_id = $request->admin_id;
        $createEdit->status = $request->status;

        if ($request->hasFile('images')) {
            $newFileName = uniqid() . '-' . $request->images->extension(); //duoi file anh /- unuqid (ten anh va ko trung)
            $path = $request->images->storeAs('news', $newFileName, 'public');
            $createEdit->images = $path;
        }

        $createEdit->save();
        return redirect()->route('route_BackEnd_News_List')
            ->with('success', 'Sửa thành công');
    }
    
}
