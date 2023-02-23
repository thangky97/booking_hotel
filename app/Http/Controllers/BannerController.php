<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.banner.index');
    }

    public function delete() {}

    public function add()
    {
        //thêm
        return view('admin.banner.add');
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
