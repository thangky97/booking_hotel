<?php

namespace App\Http\Controllers\Admin;

use App\Models\Properties;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertiesController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Thuộc tính';

        $name = $request->get('name');
        if ($name) {
            $properties = Properties::where('name', 'like', '%' . $name . '%')
                ->paginate(10);
        } else {
            $properties = DB::table('properties')->orderBy('name', 'desc')->paginate(10);
        }
        return view('admin.property.index', compact('properties', 'title', 'name'));
    }

    public function addForm()
    {
        $title = 'Thêm mới thuộc tính';
        return view('admin.property.addForm', compact('title'));
    }

    public function saveAdd(PropertyRequest $request)
    {
        $saveProperties = new Properties();
        $saveProperties->name = $request->name;
        $saveProperties->description = $request->description;
        $saveProperties->status = $request->status;
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->extension();
            $path = $request->image->storeAs('propertise', $newFileName, 'public');
            $saveProperties->image = $path;
        }

        $saveProperties->save();
        return redirect()->route('route_BackEnd_properties_List')
            ->with('success', 'Thêm thành công!');
    }
    public function editForm($id)
    {
        $title = 'Sửa thuộc tính phòng';
        $editProperties = Properties::find($id);
        return view('admin.property.editForm', compact('editProperties', 'id', 'title'));
    }
    public function saveEdit(PropertyRequest $request, $id)
    {
        $createEdit =  Properties::find($id);
        $createEdit->name = $request->name;
        $createEdit->description = $request->description;
        $createEdit->status = $request->status;
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->extension();
            $path = $request->image->storeAs('Properties', $newFileName, 'public');
            $createEdit->image = $path;
        }

        $createEdit->save();
        return redirect()->route('route_BackEnd_properties_List')
            ->with('success', 'Sửa thành công!');
    }
}
