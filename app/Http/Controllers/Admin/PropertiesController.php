<?php

namespace App\Http\Controllers\Admin;
use App\Models\Properties;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertiesController extends Controller
{
    public function index()
    {
        $title = '12 Zodiac - Thuộc tính phòng';
        $properties = DB::table('properties')->orderBy('name', 'desc')->paginate(100);//phan trang , toi da 5 ban ghi
        return view('admin.property.index', compact('properties', 'title'));
    }

    public function addForm()
    {
        $title = '12 Zodiac - Thêm thuộc tính phòng';
        return view('admin.property.addForm', compact('title'));
    }

    public function saveAdd(Request $request)
    {
        //khoi tao doi tuong
        $saveProperties = new Properties();
        $saveProperties->name = $request->name;
        $saveProperties->status = $request->status;
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->extension();
            $path = $request->image->storeAs('propertise', $newFileName,'public');
            $saveProperties->image = $path;
        }
        // luu
        $saveProperties->save();
        return redirect()->route('route_BackEnd_properties_List')
            ->with('success', 'Them thanh cong');
    }
        public function editForm($id)
        {   //lay du lieu theo id
            $title = '12 Zodiac - Sửa thuộc tính phòng';
            $editProperties = Properties::find($id);//lay du lieu tu db
            return view('admin.property.editForm',compact('editProperties','id', 'title'));// truyen du lieu de hien thi sang file view de admin nhin thay
        }
        public function saveEdit(Request $request, $id){
            $createEdit =  Properties::find($id);
            $createEdit->name = $request->name;
            $createEdit->status = $request->status;
            if ($request->hasFile('image')) {
                $newFileName = uniqid() . '-' . $request->image->extension(); //duoi file anh /- unuqid (ten anh va ko trung)
                $path = $request->image->storeAs('Properties', $newFileName,'public'); //luu vao thu muc storage public
                $createEdit->image = $path;
            }
            // luu
            $createEdit->save();
            return redirect()->route('route_BackEnd_properties_List')
            ->with('success', 'sua thanh cong');
        }
}
