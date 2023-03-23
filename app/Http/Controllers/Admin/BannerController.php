<?php

namespace App\Http\Controllers\Admin;
use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BannerController extends Controller
{

    public function index()
    {
        $banner = DB::table('banner')->orderBy('desc');//phan trang , toi da 5 ban ghi
        return view('admin.banner.index', compact('banner'));
    }

    public function addForm()
    {
        // $gallery = DB::table('gallery')->get();
        return view('admin.banner.add');
    }

    public function saveAdd(Request $request)
    {
        //khoi tao doi tuong
        $saveBanner = new Banner();
        $saveBanner->status = $request->status;

        if ($request->hasFile('images')) {
            $newFileName = uniqid() . '-' . $request->images->extension();
            $path = $request->images->storeAs('banner', $newFileName,'public');
            $saveBanner->images = $path;
        }
        // luu

        $saveBanner->save();
        return redirect()->route('route_BackEnd_Banner_index')
            ->with('success', 'Thêm thành công');
    }
        public function editForm($id)
        {   //lay du lieu theo id
            $editBanner = Banner::find($id);//lay du lieu tu db
            return view('admin.banner.edit',compact('editBanner','id',));// truyen du lieu de hien thi sang file view de admin nhin thay
        }
        public function saveEdit(Request $request, $id){
            $createEdit =  Banner::find($id);
            $createEdit->status = $request->status;
            if ($request->hasFile('images')) {
                $newFileName = uniqid() . '-' . $request->images->extension(); //duoi file anh /- unuqid (ten anh va ko trung)
                $path = $request->images->storeAs('banner', $newFileName,'public'); //luu vao thu muc storage public
                $createEdit->images = $path;
            }
            // luu
            $createEdit->save();
            return redirect()->route('route_BackEnd_Banner_index')
            ->with('success', 'Sửa thành công');
        }
        public function destroy($id)
        {
            $delete = Banner::destroy($id);
            if(!$delete){
                return redirect()->back();
            }
            return redirect()->route('route_BackEnd_Banner_index')
            ->with('success', 'Xóa thành công');
        }
}
