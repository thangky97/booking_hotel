<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoryRooms;
use App\Models\gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CategoryRoomController extends Controller
{
    public function index()
    {
        $categoryRoom = new CategoryRooms();
        $this->v['categoryRoom'] = $categoryRoom->loadListWithPager();
//
        $this->v['title'] = '12 Zodiac - Danh mục phòng';
        foreach ($this->v['categoryRoom'] as $a){
            $this->v['gallery'] = CategoryRooms::find($a->id)->gallery;
        }

        return view('admin.cate_room.index', $this->v);
    }

    public function addForm()
    {
        $this->v['title'] = '12 Zodiac - Thêm danh mục phòng';
        /// $gallery = DB::table('gallery')->get();
        return view('admin.cate_room.add', $this->v);
    }

    public function saveAdd(Request $request)
    {
        //khoi tao doi tuong
        $saveCate = new CategoryRooms();
        $saveCate->name = $request->name;
        $saveCate->price = $request->price;
        $saveCate->status = $request->status;
        $saveCate->save();
//        $saveCate->gallery_id = 1;
        foreach ($request->file('imgs') as $img) {

            $path = $img->store( 'public/imgs');
            $imgData = new gallery;
            $imgData->images= $path;
            $imgData->cate_room_id= $saveCate->id;
            $imgData->save();
        };

        // $saveCate->gallery_id = $request->gallery_id;
        //  var_dump($saveCate);die();
//        if ($request->hasFile('image')) {
//            $newFileName = uniqid() . '-' . $request->image->extension();
//            $path = $request->image->storeAs('category_rooms', $newFileName, 'public');
//            $saveCate->image = $path;
//        }
        // luu


        return redirect()->route('route_BackEnd_Categoryrooms_List')
            ->with('success', 'Thêm thành công');
    }

    public function editForm($id)
    {   //lay du lieu theo id
        // $gallery = DB::table('gallery')->get();
        $this->v['id'] = $id;
        $this->v['editCate'] = CategoryRooms::find($id); //lay du lieu tu db
        $this->v['title'] = '12 Zodiac - Sửa danh mục phòng';
        return view('admin.cate_room.detail', $this->v); // truyen du lieu de hien thi sang file view de admin nhin thay
    }

    public function saveEdit(Request $request, $id)
    {
        $createEdit = CategoryRooms::find($id);
        $createEdit->name = $request->name;
        $createEdit->price = $request->price;
        $createEdit->status = $request->status;
        // $createEdit->gallery_id = $request->gallery_id;
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->extension(); //duoi file anh /- unuqid (ten anh va ko trung)
            $path = $request->image->storeAs('category_rooms', $newFileName, 'public'); //luu vao thu muc storage public
            $createEdit->image = $path;
        }
        // luu
        $createEdit->save();
        return redirect()->route('route_BackEnd_Categoryrooms_List')
            ->with('success', 'Sửa thành công');
    }
}
