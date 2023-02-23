<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.booking.index');
    }

    public function delete() {}

    public function add()
    {
        //thêm
        return view('admin.booking.add');
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
