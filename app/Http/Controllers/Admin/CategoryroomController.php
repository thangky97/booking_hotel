<?php

namespace App\Http\Controllers\Admin;
use App\Models\CategoryRooms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryRoomController extends Controller
{

    public function index()
    {
        $category = DB::table('category_rooms')->orderBy('name','desc')->paginate(100);//phan trang , toi da 5 ban ghi
        return view('admin.cate_room.index', compact('category'));
    }

    public function addForm()
    {
        // $gallery = DB::table('gallery')->get();
        return view('admin.cate_room.add');
    }

    public function saveAdd(Request $request)
    {
        //khoi tao doi tuong
        $saveCate = new CategoryRooms();
        $saveCate->name = $request->name;
        $saveCate->price = $request->price;
        $saveCate->status = $request->status;
        $saveCate->gallery_id = 1;
        // $saveCate->gallery_id = $request->gallery_id;
        //  var_dump($saveCate);die();
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->extension();
            $path = $request->image->storeAs('category_rooms', $newFileName,'public');
            $saveCate->image = $path;
        }
        // luu

        $saveCate->save();
        return redirect()->route('route_BackEnd_Categoryrooms_List')
            ->with('success', 'Thêm thành công');
    }
        public function editForm($id)
        {   //lay du lieu theo id
            $editCate = CategoryRooms::find($id);//lay du lieu tu db
            // $gallery = DB::table('gallery')->get();
            return view('admin.cate_room.detail',compact('editCate','id',));// truyen du lieu de hien thi sang file view de admin nhin thay
        }
        public function saveEdit(Request $request, $id){
            $createEdit =  CategoryRooms::find($id);
            $createEdit->name = $request->name;
            $createEdit->price = $request->price;
            $createEdit->status = $request->status;
            // $createEdit->gallery_id = $request->gallery_id;
            if ($request->hasFile('image')) {
                $newFileName = uniqid() . '-' . $request->image->extension(); //duoi file anh /- unuqid (ten anh va ko trung)
                $path = $request->image->storeAs('category_rooms', $newFileName,'public'); //luu vao thu muc storage public
                $createEdit->image = $path;
            }
            // luu
            $createEdit->save();
            return redirect()->route('route_BackEnd_Categoryrooms_List')
            ->with('success', 'Sửa thành công');
        }
        public function destroy($id)
        {
            $delete = CategoryRooms::destroy($id);
            if(!$delete){
                return redirect()->back();
            }
            return redirect()->route('route_BackEnd_Categoryrooms_List')
            ->with('success', 'Xóa thành công');
        }
}
