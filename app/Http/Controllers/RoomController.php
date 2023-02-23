<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.room.index');
    }

    public function delete() {}

    public function add()
    {
        //thêm
        return view('admin.room.add');
    }

    public function store()
    {
        //lưu thêm
    }

    public function edit( $user)
    {
        //sửa
    }

    public function update() 
    {
        //lưu sửa
    }
}
