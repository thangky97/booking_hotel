<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        return view('templates.pages.booking_search');
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
