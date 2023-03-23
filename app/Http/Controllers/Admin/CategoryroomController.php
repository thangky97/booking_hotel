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
        $category = DB::table('category_rooms')->orderBy('name','desc')->paginate(100);//phan trang , toi da 5 ban ghi
        return view('admin.cate_room.index', compact('category'));
    }

    public function index()
    {
        $this->v['categoryRoom'] = CategoryRooms::where('status', 1)
            ->orderBy('id', 'asc')
            ->with('gallery')
            ->paginate(10);
        $this->v['title'] = ' Danh mục phòng';
        return view('admin.cate_room.index', $this->v);
    }

    public function addForm()
    {
        $this->v['title'] = ' Thêm danh mục phòng';
        /// $gallery = DB::table('gallery')->get();
        return view('admin.cate_room.add', $this->v);
    }

    public function saveAdd(Request $request)
    {

        if($request->hasFile("image")){
            $file=$request->file("image");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("image/"),$imageName);

            $cateRoom =new CategoryRooms([
                "name" =>$request->name,
                "price" =>$request->price,
                "status" =>$request->status,
                "image" =>$imageName,
            ]);
            $cateRoom->save();
        }

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $imgData = new gallery;
                $imgData->images= $imageName;
                $imgData->cate_room_id= $cateRoom->id;

                $file->move(\public_path("/images"),$imageName);
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
            ->with('success', 'Thêm thành công');
    }

    public function editForm($id)
    {
        // $jobs = new Employer();
        // $this->v['list'] = $jobs->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Loại phòng';
        return view("admin/cate_room.index",$this->v);
    }

    public function saveEdit(Request $request, $id)
    {
        // $lbds = new CategoryLands();
        // $this->v['list_lbds'] = $lbds->loadListWithPager();
        $this->v['title'] = '12 Zodiac - Chi tiết loại phòng';
        // $lands = new Lands();
        // $objItem = $lands->loadOne($id);
        // $this->v['objItem'] = $objItem;
        return view('admin/cate_room.detail', $this->v);
    }
}
