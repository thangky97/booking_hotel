<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category_new;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryNewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryNewController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }
    public function index()
    {
        $this->v['category_new'] = DB::table('category_new')->orderBy('status', 'asc')->paginate(10);
        $this->v['title'] = 'Danh mục tin tức';
        return view('admin.cate_new.list', $this->v);
    }

    public function addForm()
    {
        $this->v['title'] = 'Thêm danh mục';
        return view('admin.cate_new.add', $this->v);
    }

    public function saveAdd(CategoryNewRequest $request)
    {
        $saveCateNews = new Category_new();
        $saveCateNews->name = $request->name;
        $saveCateNews->status = $request->status;

        $saveCateNews->save();
        return redirect()->route('route_BackEnd_Category_News_List')
            ->with('success', 'Thêm thành công!');
    }

    public function editForm($id)
    {   
        $title = 'Sửa danh mục tin tức';
        $editCateNews = Category_new::find($id);
        return view('admin.cate_new.edit', compact('editCateNews', 'id', 'title'));
    }

    public function saveEdit(CategoryNewRequest $request, $id)
    {
        $createEdit =  Category_new::find($id);
        $createEdit->name = $request->name;
        $createEdit->status = $request->status;

        $createEdit->save();
        return redirect()->route('route_BackEnd_Category_News_List')
            ->with('success', 'Sửa thành công!');
    }
}
