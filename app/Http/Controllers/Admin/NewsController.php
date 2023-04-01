<?php

namespace App\Http\Controllers\Admin;
use App\Models\News;
use App\Http\Controllers\Controller;
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
        // $this->v['news'] = DB::table('news');
        // ->orderBy('name','asc')->paginate(10);//phan trang , toi da 5 ban ghi
        $this->v['news'] = News::with('cate_new')->paginate(10);
        $this ->v['title'] = 'Danh sach tin tuc';
        // dd($this->v['news']);
        return view('admin.news.index', $this->v);

    }

    public function addForm()
    {
        $this->v['title']= ' Them tin tuc';
        $category_new = DB::table('category_new')->get();
        return view('admin.news.add', $this->v, compact('category_new'));
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
        // public function editForm($id)
        // {   //lay du lieu theo id
        //     $editNews = News::find($id);//lay du lieu tu db
        //     $cate_id = DB::table('category_rooms')->get();
        //     return view('admin.news.edit',compact('editNews','id','$cate_id'));// truyen du lieu de hien thi sang file view de admin nhin thay
        // }
        public function editForm($id)
        {   // lay giu lieu theo id
            $title= ' Sua tin tuc';
            $editNews = News::find($id);
            // $cate_id = News::with('cate_new')->get();
            $cate_id = DB::table('category_new')->get();
            return view('admin.news.edit',compact('editNews','cate_id','id','title'));
        }

        public function saveEdit(Request $request, $id){
            $createEdit =  News::find($id);
            $createEdit->name = $request->name;
            $createEdit->description = $request->description;
            $createEdit->title = $request->title;
            $createEdit->date = $request->date;
            $createEdit->cate_id = $request->cate_id;
            $createEdit->status = $request->status;

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
