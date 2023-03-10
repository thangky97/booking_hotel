<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingDetailController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.booking_detail.index');
    }

    public function delete() {}

    public function add()
    {
        //thêm
        return view('admin.booking_detail.add');
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
