<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category_new;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryNewController extends Controller
{

    public function index()
    {
        $category = DB::table('category_new')->orderBy('name','desc')->paginate(100);//phan trang , toi da 5 ban ghi
        return view('admin.cate_new.list', compact('category'));
    }

    public function addForm()
    {
        // $gallery = DB::table('gallery')->get();
        return view('admin.cate_new.add');
    }

    public function saveAdd(Request $request)
    {
        //khoi tao doi tuong
        $saveCate = new Category_new();
        $saveCate->name = $request->name;
        $saveCate->status = $request->status;
        $saveCate->save();
        return redirect()->route('route_BackEnd_Category_New_index')
            ->with('success', 'Thêm thành công');
    }
        public function editForm($id)
        {   //lay du lieu theo id
            $editCate = Category_new::find($id);//lay du lieu tu db
            return view('admin.cate_new.edit',compact('editCate','id',));// truyen du lieu de hien thi sang file view de admin nhin thay
        }
        public function saveEdit(Request $request, $id){
            $createEdit =  Category_new::find($id);
            $createEdit->name = $request->name;
            $createEdit->status = $request->status;
            $createEdit->save();
            return redirect()->route('route_BackEnd_Category_New_index')
            ->with('success', 'Sửa thành công');
        }
        public function destroy($id)
        {
            $delete = Category_new::destroy($id);
            if(!$delete){
                return redirect()->back();
            }
            return redirect()->route('route_BackEnd_Category_New_index')
            ->with('success', 'Xóa thành công');
        }
}
