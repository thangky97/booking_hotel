<?php

namespace App\Http\Controllers\Admin;
use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NewsController extends Controller
{

    public function index()
    {
        $news = DB::table('news')->orderBy('name','desc')->paginate(100);//phan trang , toi da 5 ban ghi
        return view('admin.News.index', compact('news'));
    }

    public function addForm()
    {
        $cate_id = DB::table('category_rooms')->get();
        return view('admin.News.add', compact('cate_id'));
    }

    public function saveAdd(Request $request)
    {
        //khoi tao doi tuong
        $saveNews = new News();
        $saveNews->name = $request->name;
        $saveNews->description = $request->description;
        $saveNews->title = $request->title;
        $saveNews->date = $request->date;
        $saveNews->cate_id = $request->cate_id;
        $saveNews->status = $request->status;

        if ($request->hasFile('images')) {
            $newFileName = uniqid() . '-' . $request->images->extension();
            $path = $request->images->storeAs('news', $newFileName,'public');
            $saveNews->images = $path;
        }
        // luu

        $saveNews->save();
        return redirect()->route('route_BackEnd_News_List')
            ->with('success', 'Thêm thành công');
    }
        public function editForm($id)
        {   //lay du lieu theo id
            $editNews = News::find($id);//lay du lieu tu db
            $cate_id = DB::table('category_rooms')->get();
            return view('admin.News.edit',compact('editNews','id','$cate_id'));// truyen du lieu de hien thi sang file view de admin nhin thay
        }
        public function saveEdit(Request $request, $id){
            $createEdit =  News::find($id);
            $createEdit->name = $request->name;
            $createEdit->description = $request->description;
            $createEdit->title = $request->title;
            $createEdit->date = $request->date;
            $createEdit->cate_id = $request->cate_id;
            $createEdit->status = $request->status;
            // $createEdit->gallery_id = $request->gallery_id;
            if ($request->hasFile('images')) {
                $newFileName = uniqid() . '-' . $request->images->extension(); //duoi file anh /- unuqid (ten anh va ko trung)
                $path = $request->images->storeAs('news', $newFileName,'public'); //luu vao thu muc storage public
                $createEdit->images = $path;
            }
            // luu
            $createEdit->save();
            return redirect()->route('route_BackEnd_News_List')
            ->with('success', 'Sửa thành công');
        }
        public function destroy($id)
        {
            $delete = News::destroy($id);
            if(!$delete){
                return redirect()->back();
            }
            return redirect()->route('route_BackEnd_News_List')
            ->with('success', 'Xóa thành công');
        }
}
