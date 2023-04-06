<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoryRooms;
use App\Models\gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryRoomController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    public function index()
    {
        $this->v['categoryRoom'] = CategoryRooms::where('status', 1)
            ->orderBy('id', 'asc')
            ->with('gallery')
            ->paginate(10);
        $this->v['title'] = 'Danh sách loại phòng';
        return view('admin.cate_room.index', $this->v);
    }

    public function addForm()
    {
        $this->v['title'] = ' Thêm danh mục loại phòng';
        /// $gallery = DB::table('gallery')->get();
        return view('admin.cate_room.add', $this->v);
    }

    public function saveAdd(Request $request)
    {

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("image/"), $imageName);

            $cateRoom = new CategoryRooms([
                "name" => $request->name,
                "price" => $request->price,
                "status" => $request->status,
                "image" => $imageName,
            ]);
            $cateRoom->save();
        }

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $imgData = new gallery;
                $imgData->images = $imageName;
                $imgData->cate_room_id = $cateRoom->id;

                $file->move(\public_path("/images"), $imageName);
                $imgData->save();
            }
        }
        //        //khoi tao doi tuong
        //        $saveCate = new CategoryRooms();
        //        $saveCate->name = $request->name;
        //        $saveCate->price = $request->price;
        //        $saveCate->status = $request->status;
        //        $saveCate->save();
        ////        $saveCate->gallery_id = 1;
        //        foreach ($request->file('imgs') as $img) {
        //
        //            $path = $img->store( 'public/imgs');
        //            $imgData = new gallery;
        //            $imgData->images= $path;
        //            $imgData->cate_room_id= $saveCate->id;
        //            $imgData->save();
        //        };

        return redirect()->route('route_BackEnd_Categoryrooms_List')
            ->with('success', 'Thêm thành công!');
    }

    public function editForm($id)
    {
        $this->v['id'] = $id;
        $this->v['editCate'] = CategoryRooms::with('gallery')->find($id);

        $this->v['title'] = ' Sửa danh mục loại phòng';
        return view('admin.cate_room.detail', $this->v);
    }

    public function saveEdit(Request $request, $id)
    {
        //        $createEdit = CategoryRooms::find($id);
        //        $createEdit->name = $request->name;
        //        $createEdit->price = $request->price;
        //        $createEdit->status = $request->status;
        //
        //        if ($request->hasFile('image')) {
        //            $newFileName = uniqid() . '-' . $request->image->extension(); //duoi file anh /- unuqid (ten anh va ko trung)
        //            $path = $request->image->storeAs('category_rooms', $newFileName, 'public'); //luu vao thu muc storage public
        //            $createEdit->image = $path;
        //        }
        //
        //        // luu
        //        $createEdit->save();
        $createEdit = CategoryRooms::find($id);
        if ($request->hasFile("image")) {
            if (File::exists("image/" . $createEdit->cover)) {
                File::delete("image/" . $createEdit->cover);
            }
            $file = $request->file("image");
            $createEdit->image = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("/image"), $createEdit->image);
            $request['image'] = $createEdit->image;
        }

        $createEdit->update([
            "name" => $request->name,
            "price" => $request->price,
            "status" => $request->status,
            "image" => $createEdit->image,
        ]);
        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $imgData = new gallery;
                $imgData->images = $imageName;
                $imgData->cate_room_id = $id;

                $file->move(\public_path("/images"), $imageName);
                $imgData->save();
            }
        }

        return redirect()->route('route_BackEnd_Categoryrooms_List')
            ->with('success', 'Sửa thành công!');
    }


    public function deleteimages($id)
    {
        $img = gallery::findOrFail($id);

        if (File::exists("images/" . $img->images)) {
            File::delete("images/" . $img->images);
        }

        Gallery::find($id)->delete();
        return back();
    }

    public function deleteimage($id)
    {
        $img = CategoryRooms::findOrFail($id)->image;
        if (File::exists("image/" . $img)) {
            File::delete("image/" . $img);
        }
        return back();
    }
}
