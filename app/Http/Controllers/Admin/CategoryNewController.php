<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category_new;
use App\Http\Controllers\Controller;
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
        $this->v['category_new'] = DB::table('category_new')->orderBy('name','asc')->paginate(10);//phan trang , toi da 5 ban ghi
        $this ->v['title'] = 'Danh sach danh muc tin tuc';
        return view('admin.cate_new.list', $this->v);

    }

    public function addForm()
    {
        $this->v['title']= ' Them danh muc tin tuc';
        return view('admin.cate_new.add', $this->v);
    }

    public function saveAdd(Request $request)
    {
        //khoi tao doi tuong
        $saveCateNews = new Category_new();
        $saveCateNews->name = $request->name;
        $saveCateNews->status = $request->status;

        // luu

        $saveCateNews->save();
        return redirect()->route('route_BackEnd_Category_News_List')
            ->with('success', 'Thêm thành công');
    }
        // public function editForm($id)
        // {   //lay du lieu theo id
        //     $editNews = News::find($id);//lay du lieu tu db
        //     $cate_id = DB::table('category_rooms')->get();
        //     return view('admin.News.edit',compact('editNews','id','$cate_id'));// truyen du lieu de hien thi sang file view de admin nhin thay
        // }
        public function editForm($id)
        {   // lay giu lieu theo id
            $title='Sua danh muc tin tuc';
            $editCateNews = Category_new::find($id);
            // dd($editCateNews);
            return view('admin.cate_new.edit',compact('editCateNews','id','title'));
        }

        public function saveEdit(Request $request, $id){
            $createEdit =  Category_new::find($id);
            $createEdit->name = $request->name;
            $createEdit->status = $request->status;

            // luu
            $createEdit->save();
            return redirect()->route('route_BackEnd_Category_News_List')
            ->with('success', 'Sửa thành công');
        }
        public function destroy($id)
        {
            $delete = Category_new::destroy($id);
            if(!$delete){
                return redirect()->back();
            }
            return redirect()->route('route_BackEnd_News_List')
            ->with('success', 'Xóa thành công');
        }
}
