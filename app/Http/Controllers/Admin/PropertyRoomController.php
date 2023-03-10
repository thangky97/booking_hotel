<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyRoomController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.property_room.index');
    }

    public function delete() {}

    public function add()
    {
        //thêm
        return view('admin.property_room.add');
    }

    public function store()
    {
        //lưu thêm
    }

    public function edit()
    {
        //sửa
    }

    public function update() 
    {
        //lưu sửa
    }
}
